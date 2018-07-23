<?php

namespace ChoreWeasel\Http\Controllers;

use Auth;
use ChoreWeasel\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');

        $user = Auth::user();

        // $user = $this->getUserByUsername($username);

        if ($user->isAdmin()) {
            return redirect('/admin');
        }
        elseif($user->isClient()){
            // return redirect('/admin');
            // return view('clients.index');
            return redirect('client/'.$user->name.'/summary');
        }
        else{
            // return redirect('/admin');
            return redirect('tasker/'.$user->name.'/summary');
        }
    }
}
