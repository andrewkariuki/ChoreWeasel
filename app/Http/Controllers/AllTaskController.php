<?php

namespace ChoreWeasel\Http\Controllers;

use Carbon\Carbon;
use ChoreWeasel\User;
use ChoreWeasel\Models\AssignedTask;
use ChoreWeasel\Models\FinancialAccount;

class AllTaskController extends Controller
{
    //
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

        //collection of all tasks assigned to this tasker
        $assignedtasks = AssignedTask::with('assignee', 'assigner', 'taskcategory')->where('assigned_to', '=', $user->id)->get();
        //total tasks assigned to this tasker
        $totaltaskstome = AssignedTask::with('assignee')->where('assigned_to', '=', $user->id)->count();
        $completedtaks = AssignedTask::with('assignee')->where(
            [
                ['assigned_to', '=', $user->id],
                ['completed', '<>', true],
            ]
        )->count();
        $futuretasks = AssignedTask::with('assignee')->where(
            [
                ['assigned_by', '=', $user->id],
                ['created_at', '>', Carbon::now()],
            ]
        )->count();

        $accountbalance = FinancialAccount::where('user_id', '=', $user->id)->first();

        $data = [
            'user' => $user,
            'assignedtasks' => $assignedtasks,
            'totaltaskstome' => $totaltaskstome,
            'completedtaks' => $completedtaks,
            'futuretasks' => $futuretasks,
            'accountbalance' => $accountbalance,
            // 'taskcategory' =>
            // 'currentTheme' => $currentTheme,
        ];

        return view('taskers.summary')->with($data);
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

        //collection of all tasks assigned to this tasker
        $assignedtasks = AssignedTask::with('assignee', 'assigner', 'taskcategory')->where('assigned_to', '=', $user->id)->get();
        //total tasks assigned to this tasker
        $totaltaskstome = AssignedTask::with('assignee')->where('assigned_to', '=', $user->id)->count();
        $completedtaks = AssignedTask::with('assignee')->where(
            [
                ['assigned_by', '=', $user->id],
                ['completed', '=', true],
            ]
        )->count();

        $futuretasks = AssignedTask::with('assignee')->where(
            [
                ['assigned_by', '=', $user->id],
                ['created_at', '>', Carbon::now()],
            ]
        )->count();


        $data = [
            'user' => $user,
            'assignedtasks' => $assignedtasks,
            'totaltaskstome' => $totaltaskstome,
            'completedtaks' => $completedtaks,
            'futuretasks' => $futuretasks
            // 'taskcategory' =>
            // 'currentTheme' => $currentTheme,
        ];

        return view('taskers.activity')->with($data);
    }




    /**
     *
     * Show the dashboard that client land on after login
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

        // get all the tasks that this user or client has ever assigned
        $assignedbyme = AssignedTask::with('assignee', 'assigner', 'taskcategory', 'rating')->where('assigned_by', '=', $user->id)->get();

        //get the count of all the task this user or client has assigned
        $totaltasksbyme = AssignedTask::with('assigner')->where('assigned_by', '=', $user->id)->count();

        $completedtaks = AssignedTask::with('assignee')->where(
            [
                ['assigned_by', '=', $user->id],
                ['completed', '=', true],
            ]
        )->count();

        $futuretasks = AssignedTask::with('assigner')->where(
            [
                ['assigned_by', '=', $user->id],
                ['created_at', '>', Carbon::now()],
            ]
        )->count();

        //get the tasker assigned the task
        // $tasker = User::with('profile')->whereId($assignedbyme->assignee->id);

        // get all future tasks

        //get all completed tasks
        $totalcompletedtasks = AssignedTask::with('assignee', 'assigner', 'taskcategory')->where('assigned_by', '=', $user->id)->get();

        $accountbalance = FinancialAccount::where('user_id', '=', $user->id)->first();

        $data = [
            // 'tasker' => $tasker,
            'user' => $user,
            'totaltasksbyme' => $totaltasksbyme,
            'assignedbyme' => $assignedbyme,
            'completedtaks' => $completedtaks,
            'futuretasks' =>$futuretasks,
            'accountbalance' => $accountbalance
        ];

        return view('clients.summary')->with($data);
    }





    /**
     *
     * Show the dashboard that client land on after login
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

        // get all the tasks that this user or client has ever assigned
        $assignedbyme = AssignedTask::with('assignee', 'assigner', 'taskcategory')->where('assigned_by', '=', $user->id)->get();

        //get the count of all the task this user or client has assigned
        $totaltasksbyme = AssignedTask::with('assigner')->where('assigned_by', '=', $user->id)->count();

        //get the tasker assigned the task
        // $tasker = User::with('profile')->whereId($assignedbyme->assignee->id);

        // get all future tasks

        //get all completed tasks
        $totalcompletedtasks = AssignedTask::with('assignee', 'assigner', 'taskcategory')->where('assigned_by', '=', $user->id)->get();

        $data = [
            // 'tasker' => $tasker,
            'user' => $user,
            'totaltasksbyme' => $totaltasksbyme,
            'assignedbyme' => $assignedbyme,
        ];

        return view('clients.activity')->with($data);
    }
}
