<?php

namespace ChoreWeasel\Http\Controllers;

use View;
use ChoreWeasel\User;
use Illuminate\Http\Request;
use ChoreWeasel\Models\TaskCategory;

class UserManagmentController extends Controller
{
    // use Datatables;

    //
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
     * show all availabele taskers
     *
     * @return \Illuminate\Http\Response
     */
    public function taskers()
    {
        $taskers = User::whereHas('roles', function ($q) {
            $q->where('name', 'tasker');
        })->with('profile')->get();

        $data = [
            'taskers' => $taskers,
        ];

        return view('admin.taskers')->with($data);
    }

    /**
     * show all availabele clients
     *
     * @return \Illuminate\Http\Response
     */
    public function clients()
    {
        $clients = User::whereHas('roles', function ($q) {
            $q->where('name', 'client');
        })->with('profile')->get();

        $data = [
            'clients' => $clients,
        ];

        return view('admin.clients')->with($data);
    }

    /**
     * show all availabele admins
     *
     * @return \Illuminate\Http\Response
     */
    public function admins()
    {
        $admins = User::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->get();

        $data = [
            'admins' => $admins,
        ];

        return view('admin.admins')->with($data);
    }

    public function taskerView($username)
    {
        $user = User::with('profile')->wherename($username)->firstOrFail();

        $usertask = TaskCategory::find($user->profile->task_category_id);

        $data = [
            'user' => $user,
            'usertask' => $usertask,
        ];

        return view('admin.taskerview')->with($data);
    }

    public function cleintView($username)
    {
        $user = User::with('profile')->wherename($username)->firstOrFail();

        $usertask = TaskCategory::find($user->profile->task_category_id);

        $data = [
            'user' => $user,
            'usertask' => $usertask,
        ];

        return view('admin.clientview')->with($data);
    }

    public function banUser(Request $request, $username, $id)
    {
        $user = User::find($id);

        $user->banned = true;
        $user->save();

        return back()->with('user-banned', 'The banning process was successful');
    }

    public function liftbanUser(Request $request, $username, $id)
    {
        $user = User::find($id);

        $user->banned = false;
        $user->save();

        return back()->with('user-ban-lifted', 'The ban lifting process was successful');
    }

    public function verifyUser(Request $request, $username, $id)
    {
        $user = User::find($id);

        $user->verified = true;
        $user->save();

        return back()->with('user-verified', 'The verification process was successful');
    }
}
