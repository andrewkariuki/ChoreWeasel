<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\Models\Dispute;
use Illuminate\Http\Request;


class DisputeController extends Controller
{
    public function raiseDispute(Request $request){
        $dispute = new Dispute();
    }
}
