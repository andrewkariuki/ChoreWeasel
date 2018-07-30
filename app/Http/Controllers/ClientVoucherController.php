<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\User;
use Illuminate\Http\Request;
use ChoreWeasel\ClientVoucher;
use ChoreWeasel\Models\FinancialAccount;

class ClientVoucherController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getVoucher(Request $request, $username)
    {
        $currentUser = \Auth::user();
        $amount = $request->input('amount');

        $client = User::with('account')->whereId($currentUser->id)->first();

        $clientvoucher = new ClientVoucher();
        $clientvoucher->user_id = $currentUser->id;
        $clientvoucher->amount = $amount;
        $clientvoucher->save();


        if($client->account == null){
            $account = new FinancialAccount();
            $account->user_id = $currentUser->id;
            $account->balance = $amount;
            $account->save();
        }else{
            $newblance = ($client->account->balance + $amount);
            $client->account->balance = $newblance;
            $client->account->save();
        }

        return back()->with('success', 'Voucher Application was successful');
    }

}
