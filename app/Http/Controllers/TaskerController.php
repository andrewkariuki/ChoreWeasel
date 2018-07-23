<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\Models\AssignedTask;
use ChoreWeasel\User;

class TaskerController extends Controller
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
    public function taskerSummaryDashboard($username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        // $assignedtasks = User::with('assigned')->whereid($user->id)->get();

        // $assignedtasks = AssignedTask::with('assignee')->where();
        $assignedtasks = AssignedTask::with('assignee', 'assigner', 'taskcategory')->where('assigned_to', '=', $user->id)->get();
        $assignedbyme = AssignedTask::with('assignee', 'assigner', 'taskcategory')->where('assigned_to', '=', $user->id)->get();

        $totaltaskstome = AssignedTask::with('assignee')->where('assigned_to', '=', $user->id)->count();
        $totaltasksbyme = AssignedTask::with('assigner')->where('assigned_by', '=', $user->id)->count();

        // $taskcategory = TaskCategory::find($assignedtasks->assigned->task_category_id);

        // $assignedby = User::find($assignedtasks->assigned->assigned_by);

        // $currentTheme = Theme::find($user->profile->theme_id);

        $data = [
            'user' => $user,
            'assignedtasks' => $assignedtasks,
            'totaltasksbyme' => $totaltasksbyme,
            'totaltaskstome' => $totaltaskstome,
            // 'taskcategory' =>
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
    public function taskerActivityDashboard($username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        // $currentTheme = Theme::find($user->profile->theme_id);

        $data = [
            'user' => $user,
            // 'currentTheme' => $currentTheme,
        ];

        return view('users.summary')->with($data);
    }
}
