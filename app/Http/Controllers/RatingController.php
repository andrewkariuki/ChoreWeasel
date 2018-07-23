<?php

namespace ChoreWeasel\Http\Controllers;

use Validator;
use ChoreWeasel\User;
use Illuminate\Http\Request;
use ChoreWeasel\Models\Rating;
use ChoreWeasel\Models\AssignedTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RatingController extends Controller
{
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
    public function index($username, $assigned_to, $assigned_task_id)
    {
        //

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $tasktorate = AssignedTask::with('assignee', 'assigner', 'taskcategory')->find($assigned_task_id);

        // $tasktorate = AssignedTask::with('assignee', 'assigner', 'taskcategory')->whereid($assigned_task_id)->get();

        // return dd($tasktorate);

        $data = [
            'user' => $user,
            'tasktorate' => $tasktorate
            // 'assigned_to' => $tasktorate->assigned_to,
            // 'assigned_task_id' => $tasktorate->id,
        ];

        return view('clients.ratetasker')->with($data);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function rating_validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'rating' => 'required|integer',
                'comment' => 'required|string',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $username, $assigned_to, $assigned_task_id)
    {
        //

        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $assignedtask = AssignedTask::find($assigned_task_id);

        $rating_validator = $this->rating_validator($request->all());

        if ($rating_validator->fails()) {
            return back()->withErrors($rating_validator)->withInput();
        }

        $rating = new Rating();

        $rating->rater_id = $user->id;
        $rating->rated_id = $assigned_to;
        $rating->rated_task_id = $assigned_task_id;
        $rating->rating = $request->input('rating');
        $rating->comment = $request->input('comment');

        $rating->save();

        return redirect('client/' . $user->name . '/summary');
    }


}
