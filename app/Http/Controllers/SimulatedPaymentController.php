<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\User;
use Illuminate\Http\Request;
use ChoreWeasel\Models\AssignedTask;
use ChoreWeasel\Models\SimulatedPayment;
use ChoreWeasel\Models\FinancialAccount;


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

        $tasker = User::with('account')->whereId($tasker_id)->first();

        $task = AssignedTask::whereId($assigned_task_id)->first();

        $payment = new SimulatedPayment();
        $payment->payer_id = $user->id;
        $payment->paid_id = $assigned_task_id;
        $payment->paid_task_id = $tasker_id;
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

        return back()->with('paymentsuccess', 'Task payment was successful');

    }
}
