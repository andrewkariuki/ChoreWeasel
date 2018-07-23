<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\Models\Profile;
use ChoreWeasel\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use Illuminate\Support\Carbon;
use ChoreWeasel\Models\AssignedTask;
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



        $data = [
            'totaltaskers' => $totaltaskers,
            'totaladmins ' => $totaladmins,
            'totalclients' => $totalclients,
            'tatolaclientsignup' => $tatolaclientsignup,
            'tasksAssignedToday' => $tasksAssignedToday,
            'tatolataskersignup' => $tatolataskersignup,
            'alltimetasks' => $alltimetasks,
            'totalactivetasks' => $totalactivetasks,
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
                'firstname' => 'required|string|max:120',
                'secondname' => 'required|string|max:120',
                'name' => 'required|string|max:120|unique:users',
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
            // 'nationalid' => $request['nationalid'],
            // 'verified' => true,
            'password' => Hash::make($request['password']),
        ]);

        $role = Role::where('name', '=', 'Admin')->first(); //choose the default role upon user creation.
        $user->attachRole($role);
        $user->profile()->save($profile);
        $user->save();

        return redirect('admin/admins');
    }
}
