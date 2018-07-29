<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\Models\Dispute;
use Illuminate\Http\Request;


class DisputeController extends Controller
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

    public function disputeform($id){
        return view('users.dispute');
    }

    public function raiseDispute(Request $request, $id){
        $dispute = new Dispute();

        $currentUser = \Auth::User();

        $disputedtask = AssignedTask::with('assignee', 'assigner', 'taskcategory')->whereId($id)->first();

        $disputer = $currentUser->id;

        $complaint = $request['complaint'];


    }
}
