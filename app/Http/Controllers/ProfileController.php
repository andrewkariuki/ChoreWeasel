<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\Models\Profile;
use ChoreWeasel\User;
use Faker\Provider\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class ProfileController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * Display the current user's account settings
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserAccount($username)
    {
        //

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

        return view('users.account')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * Display the current user's profile settings
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserProfile($username)
    {
        //

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

        return view('users.profile')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTaskerProfilePage($username)
    {
        //

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'user' => $user,
            // 'currentTheme' => $currentTheme,
        ];

        return view('taskers.createprofile')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClientProfilePage($username)
    {
        //

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'user' => $user,
            // 'currentTheme' => $currentTheme,
        ];

        return view('clients.createprofile')->with($data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function profile_validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'pitch' => 'string',
                'county' => 'string',
                'city' => 'string',
                'locality' => 'string',
                'postaladdress' => 'numeric|digits:5',
                'postalcode' => 'numeric|digits:5',
                'phonenumber' => 'unique:profiles',
                'phonenumber_confirmation' => 'same:phonenumber',
                'nationalid' => 'unique:profiles|numeric|digits_between:1,10|digits:8',
                'avatar' => '',
                'avatar_status' => '',
            ],
            [
                'same' => 'Your :attribute must match',
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $username
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ChoreWeasel\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     *
     * @return mixed
     */
    public function update(Request $request, $username)
    {
        //

        $user = $this->getUserByUsername($username);

        $input = Input::only(
            'nationalid',
            'county',
            'city',
            'locality',
            'postaladdress',
            'postalcode',
            'phonenumber',
            'avatar_status'
        );

        $profile_validator = $this->profile_validator($request->all());

        if ($profile_validator->fails()) {
            return back()->withErrors($profile_validator)->withInput();
        }

        if ($user->profile == null) {
            $profile = new Profile();
            $profile->fill($input);
            $user->profile()->save($profile);
        } else {
            $user->profile->fill($input)->save();
        }

        return redirect('tasker/' . $user->name . '/profile/addcategory');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $username
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ChoreWeasel\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     *
     * @return mixed
     */
    public function updateTaskCategory(Request $request, $username)
    {
        //

        $user = $this->getUserByUsername($username);

        $input = Input::only('task_category_id', 'pitch', 'rates');

        $profile_validator = $this->profile_validator($request->all());

        if ($profile_validator->fails()) {
            return back()->withErrors($profile_validator)->withInput();
        }

        if ($user->profile == null) {
            $profile = new Profile();
            $profile->fill($input);
            $user->profile()->save($profile);
        } else {
            $user->profile->fill($input)->save();
        }

        return redirect('tasker/' . $user->name . '/summary');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $username
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ChoreWeasel\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     *
     * @return mixed
     */
    public function updateClientProfile(Request $request, $username)
    {
        //

        $user = $this->getUserByUsername($username);

        $input = Input::only(
            'nationalid',
            'county',
            'city',
            'locality',
            'postaladdress',
            'postalcode',
            'phonenumber',
            'avatar_status'
        );

        $profile_validator = $this->profile_validator($request->all());

        if ($profile_validator->fails()) {
            return back()->withErrors($profile_validator)->withInput();
        }

        if ($user->profile == null) {
            $profile = new Profile();
            $profile->fill($input);
            $user->profile()->save($profile);
        } else {
            $user->profile->fill($input)->save();
        }

        return redirect('client/' . $user->name . '/summary');
    }

    /**
     *
     * show a list of all the available task categories
     *
     * @param  $username
     * @return \Illuminate\Http\Response
     */
    public function showAvailableTaskCategories($username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $tasks = TaskCategory::get()->first();

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];

        return view('taskers.choosecategory')->with($data);
    }

    /**
     * Upload and Update user avatar.
     *
     * @param $file
     *
     * @return mixed
     */
    public function upload()
    {
        if (Input::hasFile('file')) {
            $currentUser = \Auth::user();
            $avatar = Input::file('file');
            $filename = 'avatar.' . $avatar->getClientOriginalExtension();
            $save_path = storage_path() . '/users/id/' . $currentUser->id . '/uploads/images/avatar/';
            $path = $save_path . $filename;
            $public_path = '/images/profile/' . $currentUser->id . '/avatar/' . $filename;

            // Make the user a folder and set permissions
            File::makeDirectory($save_path, $mode = 0755, true, true);

            // Save the file to the server
            Image::make($avatar)->resize(300, 300)->save($save_path . $filename);

            // Save the public image path
            $currentUser->profile->avatar = $public_path;
            $currentUser->profile->save();

            return response()->json(['path' => $path], 200);
        } else {
            return response()->json(false, 200);
        }
    }

    /**
     *
     * show a list of all the available task categories
     *
     * @param  $username
     * @return \Illuminate\Http\Response
     */

    public function uploadAvatar()
    {
        return view('users.avatar');
    }

    /**
     * Show user avatar.
     *
     * @param $id
     * @param $image
     *
     * @return string
     */
    public function userProfileAvatar($id, $image)
    {
        return Image::make(storage_path() . '/users/id/' . $id . '/uploads/images/avatar/' . $image)->response();
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \ChoreWeasel\Models\Profile  $profile
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Profile $profile)
    // {
    //     //
    // }

    public function deleteUserAccount(Request $request, $id)
    {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);

        if ($user->id != $currentUser->id) {
            return redirect('client/' . $user->name . '/account')->with('error', 'Profile not yours you can perform this action');
        }

        // Soft Delete User
        $user->delete();

        // Clear out the session
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/login')->with('success', 'Account has been permanetly deleted');
    }

}
