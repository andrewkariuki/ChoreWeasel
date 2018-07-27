<?php

namespace ChoreWeasel\Http\Controllers;

use File;
use Image;
use Validator;
use ChoreWeasel\User;
use Illuminate\Http\Request;
use ChoreWeasel\Models\Profile;
use ChoreWeasel\Models\TaskCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use ChoreWeasel\Notifications\ClientAccountCreated;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
     * Display the current user's account settings
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminAccount($username)
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

        return view('admin.account')->with($data);
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
                // 'pitch' => 'string|required',
                // 'county' => 'string|required',
                // 'city' => 'string|required',
                // 'locality' => 'string|required',
                // 'postaladdress' => 'numeric|digits:5',
                // 'postalcode' => 'numeric|digits:5',
                // 'dateofbirth' => '',
                // 'phonenumber' => 'unique:profiles',
                // 'phonenumber_confirmation' => 'same:phonenumber',
                // 'nationalid' => 'unique:profiles|numeric|digits_between:1,10|digits:8',
                // 'rates' => 'required|numeric',
                // 'avatar' => 'required|mimes:jpeg,jpg,png',
                // 'avatar_status' => '',
            ],
            [
                // 'phonenumber_confirmation.same' => 'Your phone numbers must match',

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

        // return redirect('tasker/' . $user->name . '/profile/addcategory');

        return redirect('tasker/' . $user->name . '/profile/uploadprofileimage');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $username
     *         $task_category_id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ChoreWeasel\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     *
     * @return mixed
     */
    public function updateTaskCategory(Request $request, $username, $task_category_id)
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

        $user->notify(new ClientAccountCreated());

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

        $tasks = TaskCategory::all();

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];

        return view('taskers.choosecategory')->with($data);

        // return view('taskers.addcategory')->with($data);
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
            $filename = 'avatar' .'-'.rand().'.'.$avatar->getClientOriginalExtension();
            $save_path = storage_path() . '/users/id/' . $currentUser->id . '/uploads/images/avatar/';
            $path = $save_path . $filename;
            $public_path = '/images/profile/' . $currentUser->id . '/avatar/' . $filename;

            // Make the user a folder and set permissions
            File::makeDirectory($save_path, $mode = 0755, true, true);

            // Save the file to the server
            Image::make($avatar)->resize(300, 300)->save($save_path . $filename);

            // Save the public image path
            $currentUser->profile->avatar = $public_path;
            $currentUser->profile->avatar_status = true;
            $currentUser->profile->save();

            return response()->json(['path' => $path], 200);
        } else {
            return response()->json(false, 200);
        }
    }

    /**
     *
     * show the form for uploading the profile image
     *
     * @param  $username
     * @return \Illuminate\Http\Response
     */

    public function taskeruploadprofileimageform($username)
    {

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'user' => $user,
            // 'currentTheme' => $currentTheme,
        ];

        return view('taskers.uploadprofileimage')->with($data);

    }

    public function taskerprofileimage(Request $request, $username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $profile_validator = $this->profile_validator($request->all());

        if ($profile_validator->fails()) {
            return back()->withErrors($profile_validator)->withInput();
        }

        if (Input::hasFile('avatar')) {
            $currentUser = \Auth::user();

            $avatar = Input::file('avatar');

            $filename = 'avatar' .'-'.rand().'.'. $avatar->getClientOriginalExtension();

            $save_path = storage_path() . '/users/id/' . $currentUser->id . '/uploads/images/avatar/';

            $path = $save_path . $filename;

            $public_path = '/images/profile/' . $currentUser->id . '/avatar/' . $filename;

            // Make the user a folder and set permissions
            File::makeDirectory($save_path, $mode = 0755, true, true);

            // Save the file to the server
            Image::make($avatar)->resize(300, 300)->save($save_path . $filename);

            // Save the public image path
            $currentUser->profile->avatar = $public_path;
            $currentUser->profile->avatar_status = true;
            $currentUser->profile->save();

            return redirect('tasker/' . $user->name . '/profile/addcategory');

        } else {

            return back()->with('profileuploaderror', 'Your profile picture could not be uploaded please try again');

        }

    }

    /**
     *
     * show the form for uploading the profile image
     *
     * @param  $username
     * @return \Illuminate\Http\Response
     */

    public function clientuploadprofileimageform($username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $profile_validator = $this->profile_validator($request->all());

        if ($profile_validator->fails()) {
            return back()->withErrors($profile_validator)->withInput();
        }

        if (Input::hasFile('avatar')) {
            $currentUser = \Auth::user();

            $avatar = Input::file('avatar');

            $filename = 'avatar' .'-'.rand().'.'. $avatar->getClientOriginalExtension();

            $save_path = storage_path() . '/users/id/' . $currentUser->id . '/uploads/images/avatar/';

            $path = $save_path . $filename;

            $public_path = '/images/profile/' . $currentUser->id . '/avatar/' . $filename;

            // Make the user a folder and set permissions
            File::makeDirectory($save_path, $mode = 0755, true, true);

            // Save the file to the server
            Image::make($avatar)->resize(200, 200)->save($save_path . $filename);

            // Save the public image path
            $currentUser->profile->avatar = $public_path;
            $currentUser->profile->avatar_status = true;
            $currentUser->profile->save();

            $currentUser->notify(new ClientAccountCreated($currentUser));

            return redirect('client/' . $user->name . '/summary');
        } else {
            return back()->with('profileuploaderror', 'Your profile picture could not be uploaded please try again');
        }
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserPassword(Request $request, $username, $id)
    {
        $currentUser = \Auth::user();
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(),
            [
                'currentpassword' => 'required',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|same:password',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //if the password matches the current password in the database
        if (Hash::check($request->input('currentpassword'), $user->password) && $request->input('password') != null) {

            $user->password = Hash::make($request->input('password'));

            $user->save();

            return back()->with('password-change', 'You have successfully changed your password!');
        }

        //if the password does not match the current password in the database
        else {
            return back()->with('password-change-warning', 'Invalid Credentials please try agian or contact our Help Center!');
        }

    }

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
