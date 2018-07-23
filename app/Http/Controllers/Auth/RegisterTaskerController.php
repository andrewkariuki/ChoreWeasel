<?php

namespace ChoreWeasel\Http\Controllers\Auth;

use ChoreWeasel\User;
use Auth;
use ChoreWeasel\Models\Profile;
use ChoreWeasel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterTaskerController extends Controller
{
    //
    /*
    |--------------------------------------------------------------------------
    | Tasker Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new taskers as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo(){
        $user = Auth::user();

        return ('/tasker/'.$user->name.'/createprofile');
    }

    // protected $redirectTo = '/tasker/createprofile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the registration form for tasker account
     *
     */

    public function taskerRegistrationForm(){
        return view('auth.taskerregister');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:100',
            'secondname' => 'required|string|max:100',
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \ChoreWeasel\User
     */
    protected function create(array $data)
    {

        $profile = new Profile();

        $user = User::create([
            'firstname' => $data['firstname'],
            'secondname' => $data['secondname'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->profile()->save($profile);
        $role = Role::where('name', '=', 'Tasker')->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        return $user;
    }
}
