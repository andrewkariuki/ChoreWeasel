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

class RegisterAdminController extends Controller
{
    //
    //
    /*
    |--------------------------------------------------------------------------
    | Admin Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins as well as their
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
    protected $redirectTo = '/home';

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
     * Show the registration form for client account
     *
     */

    public function adminRegistrationForm(){
        return view('auth.adminregister');
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
        $user = User::create([
            'firstname' => $data['firstname'],
            'secondname' => $data['secondname'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verified' => true,
        ]);

        $role = Role::where('name', '=', 'Admin')->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        return $user;
    }
}
