<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use ChoreWeasel\Models\Dispute;
use ChoreWeasel\Models\Profile;
use ChoreWeasel\Models\AssignedTask;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use ChoreWeasel\Charts\TaskCompletionRates;
use ChoreWeasel\Charts\TaskersToClientsChart;
use ChoreWeasel\Notifications\RegisteredAsAdmin;

class AdminController extends Controller
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
        $this->middleware(['auth' => 'role:admin']);
    }

    /**
     * Show the admin dashboard
     *
     * @return void
     */
    public function index()
    {

        $totaltaskers = User::whereHas('roles', function ($q) {
            $q->where('name', 'tasker');
        })->count();

        $totaladmins = User::whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->count();

        $totalclients = User::whereHas('roles', function ($q) {
            $q->where('name', 'client');
        })->count();

        $tatolaclientsignup = User::whereDate('created_at', Carbon::today())->whereHas('roles', function ($q) {
            $q->where('name', 'client');
        })->count();

        $tatolataskersignup = User::whereDate('created_at', Carbon::today())->whereHas('roles', function ($q) {
            $q->where('name', 'tasker');
        })->count();

        $tasksAssignedToday = AssignedTask::whereDate('created_at', Carbon::today())->count();

        $totalactivetasks = AssignedTask::whereDate('task_date_time', '>', Carbon::now())->count();

        $alltimetasks = AssignedTask::all()->count();

        $januarytasks = AssignedTask::whereMonth('created_at', '=', 01)->count();
        $januarycompletedtasks = AssignedTask::where([
            ['created_at', '=', 01],
            ['completed', true]
        ])->count();

        $julytasks = AssignedTask::whereMonth('created_at', '=', 07)->count();
        $julycompletedtasks = AssignedTask::where([
            ['created_at', '=', 07],
            ['completed', true]
        ])->count();



        $ratiochart = new TaskersToClientsChart();
        $ratiochart->dataset('highcharts', 'doughnut',
        [$totaltaskers, $totalclients])
        ->backgroundColor(
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)'
        );

        $taskcompletionrates = new TaskCompletionRates();
        $taskcompletionrates->dataset('highcharts', 'bar', [0,0,0,0,0,0,0,0,0,0,0,0])->color('#00ff00');
//         $taskcompletionrates->dataset('Sample Test', 'line', [1,4,3])->color('#ff0000');



        $data = [
            'totaltaskers' => $totaltaskers,
            'totaladmins ' => $totaladmins,
            'totalclients' => $totalclients,
            'tatolaclientsignup' => $tatolaclientsignup,
            'tasksAssignedToday' => $tasksAssignedToday,
            'tatolataskersignup' => $tatolataskersignup,
            'alltimetasks' => $alltimetasks,
            'totalactivetasks' => $totalactivetasks,
            'ratiochart' => $ratiochart,
            'taskcompletionrates' => $taskcompletionrates
        ];
        return view('admin.index')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * A list of all available admins
     *
     * @return \Illuminate\Http\Response
     */
    public function currentAdmins()
    {
        //
        return view('admin.admins');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addadmins');
    }

    /**
     * Store a newly created resource in storage.
     *
     * Store a new admin into the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $profile = new Profile();

        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string|max:120|alpha',
                'secondname' => 'required|string|max:120|alpha',
                'name' => 'required|string|max:120|unique:users|regex:/^[a-zA-Z0-9]*$/',
                'email' => 'required|string|email|max:255|unique:users',
                // 'nationalid' => 'required|string|min:8|max:8|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'firstname' => $request['firstname'],
            'secondname' => $request['secondname'],
            'name' => $request['name'],
            'email' => $request['email'],
            'verified' => true,
            'password' => Hash::make($request['password']),
        ]);

        $role = Role::where('name', '=', 'Admin')->first(); //choose the default role upon user creation.
        $user->attachRole($role);
        // $user->profile()->save($profile);
        $user->save();

        $user->notify(new RegisteredAsAdmin());

        return redirect('admin/admins');
    }


    /**
     * Show the all the tasks that have ever been done.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllTasks(){
        $alltasks = AssignedTask::with('assigner', 'assignee', 'taskcategory', 'dispute', 'profile')->get();

        $data = [
            'alltasks' => $alltasks
        ];

        return view('admin.assignedtasks')->with($data);
    }

    /**
     * Show the all the disputes that have ever been done.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllDisputes(){

        $disputes = Dispute::with('disputer', 'taskdisputed')->get();

        $data =[
            'disputes' => $disputes
        ];

        return view('admin.disputes')->with($data);

    }

    public function viewDispute($id){

        $dispute = Dispute::whereId($id)->first();

        $data = [
            'dispute' => $dispute
        ];

        return view('admin.dispute')->with($data);

    }

    public function markAsSolved($id){
        $dispute = Dispute::whereId($id)->first();

        $dispute->solved = true;
        $dispute->save();


        return back()->with('solved', 'The dispute has been fully solved');
    }
}
