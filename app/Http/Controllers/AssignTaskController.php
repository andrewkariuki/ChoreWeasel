<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\Models\TaskCategoryGroup;
use ChoreWeasel\User;

class AssignTaskController extends Controller
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
        return User::with('profile')->wherename($username)->firstOrFail();
    }

    public function explore($username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $assignabletasks = TaskCategoryGroup::with('taskcategories')->get();

        $data = [
            'user' => $user,
            'assignabletasks' => $assignabletasks,
        ];
        return view('clients.explore')->with($data);
    }
}
