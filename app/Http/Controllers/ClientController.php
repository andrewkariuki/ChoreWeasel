<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\User;
use Illuminate\Http\Request;


class ClientController extends Controller
{
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
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function getUserByUsername($username)
    {
        return User::wherename($username)->firstOrFail();
    }

    /**
     *
     * Show the dashboard that taskers land on after login
     *
     * @param $username
     *
     */
    public function clientSummaryDashboard($username){

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        // $currentTheme = Theme::find($user->profile->theme_id);

        $data = [
            'user'         => $user,
            // 'currentTheme' => $currentTheme,
        ];

        return view('users.summary')->with($data);

    }

    /**
     *
     * Show the dashboard that taskers land on after login
     *
     * @param $username
     *
     */
    public function clientActivityDashboard($username){

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        // $currentTheme = Theme::find($user->profile->theme_id);

        $data = [
            'user'         => $user,
            // 'currentTheme' => $currentTheme,
        ];

        return view('users.summary')->with($data);

    }



}
