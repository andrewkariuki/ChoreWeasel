<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\User;
use Illuminate\Http\Request;
use ChoreWeasel\Models\AssignedTask;
use Illuminate\Support\Facades\Auth;
use ChoreWeasel\Models\FinancialAccount;
use ChoreWeasel\Models\SimulatedPayment;
use ChoreWeasel\Notifications\YouJustGotPaid;


class SimulatedPaymentController extends Controller
{

    /**
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function getUserByUsername($username)
    {
        return User::with('profile')->wherename($username)->firstOrFail();
    }

    /**
     * Pay A user for a Task.
     *
     * @param  $username
     *         $task_category_id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ChoreWeasel\Models\SimulatedPayment  $SimulatedPayment
     * @return \Illuminate\Http\Response
     *
     * @return mixed
     */
    public function payForTask(Request $request, $username,$tasker_id, $assigned_task_id){
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $type = 'payment';

        $tasker = User::with('account')->whereId($tasker_id)->first();

        $clientaccount = User::with('account')->whereId($user->id)->first();

        $task = AssignedTask::whereId($assigned_task_id)->first();
        $clientblance = $clientaccount->account->balance;

        $payableamount = $task->total_payable;

        if($payableamount >=  $clientblance ){
            return back()->with('error', 'Your Account Balance can not allow you to pay for this task. Please apply for a voucher');
        }else{

            $payment = new SimulatedPayment();
            $payment->payer_id = $user->id;
            $payment->paid_id = $tasker_id;
            $payment->type = $type;
            $payment->paid_task_id = $assigned_task_id;
            $payment->amount_paid = $task->total_payable;
            $payment->save();


            $task->paid = true;
            $task->save();

            if($tasker->account == null){
                $account = new FinancialAccount();
                $account->user_id = $tasker_id;
                $account->balance = $task->total_payable;
                $account->save();
            }else{
                $newblance = ($tasker->account->balance + $task->total_payable);
                $tasker->account->balance = $newblance;
                $tasker->account->save();
            }

            $newclientbalance = ($clientaccount->account->balance - $task->total_payable);
            $clientaccount->account->balance =  $newclientbalance;
            $clientaccount->account->save();

            $notifieduser = User::whereId($tasker_id)->first();

            $notifieduser->notify(new YouJustGotPaid());

            return back()->with('success', 'Task payment was successful');

        }

        // $payment = new SimulatedPayment();
        // $payment->payer_id = $user->id;
        // $payment->paid_id = $tasker_id;
        // $payment->type = $type;
        // $payment->paid_task_id = $assigned_task_id;
        // $payment->amount_paid = $task->total_payable;
        // $payment->save();


        // $task->paid = true;
        // $task->save();

        // if($tasker->account == null){
        //     $account = new FinancialAccount();
        //     $account->user_id = $tasker_id;
        //     $account->balance = $task->total_payable;
        //     $account->save();
        // }else{
        //     $newblance = ($tasker->account->balance + $task->total_payable);
        //     $tasker->account->balance = $newblance;
        //     $tasker->account->save();
        // }

        // $newclientbalance = ($clientaccount->account->balance - $task->total_payable);
        // $clientaccount->account->balance =  $newclientbalance;
        // $clientaccount->account->save();

        // $notifieduser = User::whereId($tasker_id)->first();

        // $notifieduser->notify(new YouJustGotPaid());

        // return back()->with('paymentsuccess', 'Task payment was successful');

    }


    public function twallet($username){
        $currentUser = \Auth::user();

        $transactions = SimulatedPayment::with('paidtask', 'paidby')->where('paid_id', '=', $currentUser->id)->get();

        $data = [
            'transactions' => $transactions,
        ];
        return view('taskers.wallet')->with($data);
    }

    public function cwallet($username){
        $currentUser = \Auth::user();

        $transactions = SimulatedPayment::with('paidtask', 'paidto')->where('payer_id', '=', $currentUser->id)->get();

        $data = [
            'transactions' => $transactions,
        ];
        return view('clients.wallet')->with($data);
    }
}
