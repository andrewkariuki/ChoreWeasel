<?php

namespace ChoreWeasel\Http\Controllers;

use Carbon\Carbon;
use ChoreWeasel\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use ChoreWeasel\Models\Profile;
use ChoreWeasel\Models\AssignedTask;
use ChoreWeasel\Models\TaskCategory;
use Illuminate\Support\Facades\Input;
use ChoreWeasel\Models\TaskCategoryGroup;
use ChoreWeasel\Notifications\TaskComplete;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AssignedTaskController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taskcategories = TaskCategory::all();
        $taskcategorygroups = TaskCategoryGroup::with('taskcategories')->get();

        $data = [
            'taskcategories' => $taskcategories,
            'taskcategorygroups' => $taskcategorygroups
        ];

        return view('chores.allchores')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskdescription($taskcategory_id)
    {
        //
        $taskcategory = TaskCategory::find($taskcategory_id);

        $data = [
            'taskcategory' => $taskcategory,
        ];

        return view('clients.taskdescription')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sheduleTaskAndTasker(Request $request, $taskcategory_id)
    {
        $entereddate = $request->input('taskdatetime');

        if(Carbon::parse($entereddate)->format('Y/m/d') < Carbon::tomorrow()->format('Y/m/d')){
            return back()->with('dateerror', 'You can not pick a past date! Please pick a date from tommorrow');
        }
        else{
            $task_category_id = $request->input('task_category_id');
            $taskdatetime = Carbon::parse($entereddate)->format('Y/m/d');
            $task_requirements = $request->input('task_requirements');
            $apt_unit_no = $request->input('apt_unit_no');
            $apartment_unit = $request->input('apartment_unit');
            $locality_street = $request->input('locality_street');
            $city_town = $request->input('city_town');
            $task_size = $request->input('task_size');
            $task_description = $request->input('task_description');

            $taskcategory = TaskCategory::find($task_category_id);

            $taskers = Profile::with('user', 'taskcategory')->where([
            ['task_category_id', $task_category_id], ['city', '=', $city_town]
            ])->get();

            // return dd($taskers);

            // $taskertaskcategory = function ($query)
            // {
            //     $query->where('task_category_id', $task_category_id);
            // };

            // $taskers = User::whereHas('roles', function ($q) {
            //     $q->where('name', 'tasker');
            // })->with('profile')->get();

            $data = [
            'task_category_id' => $task_category_id,
            'taskdatetime' => $taskdatetime,
            'task_description' => $task_description,
            'task_requirements' => $task_requirements,
            'apt_unit_no' => $apt_unit_no,
            'apartment_unit' => $apartment_unit,
            'locality_street' => $locality_street,
            'city_town' => $city_town,
            'task_size' => $task_size,
            'taskcategory' => $taskcategory,
            'taskers' => $taskers,
        ];

            return view('clients.taskertimesheduling')->with($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignTask(Request $request, $task_category_id, $assigned_to)
    {
        //
        $user = User::find($assigned_to);

        $input = Input::only(
            'assigned_by',
            'assigned_to',
            'task_category_id',
            'city_town',
            'locality_street',
            'apartment_unit',
            'apt_unit_no',
            'task_size',
            'task_requirements',
            'task_description',
            'task_date_time',
            'completed',
            'rates',
            'paid'
        );

        $assignedTask = new AssignedTask();
        $assignedTask->fill($input)->save();

        return redirect('client/' . $user->name . '/summary');
    }

    /**
     * start a task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function startTask(Request $request, $username, $assigned_task_id){
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $assignedtask = AssignedTask::find($task_category_id);

        if( $assignedtask){
            $task_date_time = $assignedtask->task_date_time;

             // incase the task is a future task
             if ($task_date_time > Carbon::today()){
                return back()->with('cantstarttask', "You can't start future, only today tasks allowed.");
            }


            $startedate = Carbon::now();
            $assignedtask->started_at = $startedate;
            $assignedtask->started = true;
            $assignedtask->save();


            return back()->with('taskstarted', 'You have started a task.');
        }
     }

    /**
     * complete a task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function completeATask(Request $request, $username, $assigned_task_id){

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $assignedtask = AssignedTask::find($assigned_task_id);

        // if the task is found
        if ($assignedtask){

            $task_date_time = $assignedtask->task_date_time;
            $ratesperhour = $assignedtask->rates;



            // incase the task is a future task
            if ($task_date_time >= Carbon::now()){
                return back()->with('futuretask', "You can't complete future, wait and execute it first.");
            }

            $completedAt = Carbon::now();
            $hoursWorked = $completedAt->diffInHours($task_date_time);

            if($hoursWorked < 1){
                $total_payable = $ratesperhour;
            }
            else{
                $total_payable = $ratesperhour * $hoursWorked;
            }

            $assignedtask->completed = 1;
            $assignedtask->completed_at = $completedAt;
            $assignedtask->hours_worked = $hoursWorked;
            $assignedtask->total_payable = $total_payable;
            $assignedtask->save();



            $invoicedtask = AssignedTask::with('assignee', 'assigner', 'taskcategory')->whereId($assigned_task_id)->first();
            $data = [
                'invoicedtask' => $invoicedtask,
                'user' => $user
            ];

            $pdf = PDF::loadView('invoice.invoice', $data);

            $pdf->save(public_path().'_filename.pdf');

            return $pdf->download('invoice.pdf');

            $client = $assignedtask->assigner()->first();



            $client->notify(new TaskComplete());

            return back()->with('taskcompleted', 'Task Successfuly completed, And is now pending payment and review.');
        }
        else{
            return back()->with('notask', 'Sorry no such task exists please contact our help center.');
        }



    }

}
