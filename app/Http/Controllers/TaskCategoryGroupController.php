<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\Models\TaskCategoryGroup;
use Validator;
use Illuminate\Http\Request;

class TaskCategoryGroupController extends Controller
{
/**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function group_validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'groupname' => 'required|string|unique:task_category_groups',
                'groupdescription' => 'required|string|unique:task_category_groups',
                'groupimage' => 'required|mimes:jpeg,jpg,png'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //

        // $input = Input::only('groupname', 'groupdescription');

        $group_validator = $this->group_validator($request->all());

        if ($group_validator->fails()) {
            return back()->withErrors($group_validator)->withInput();
        }

        // $groupimagename = $request->file('groupimage')->getClientOriginalName();
        $groupimageextention = $request->file('groupimage')->getClientOriginalExtension();

        $groupimagename = 'taskcategorygroup'.'-'.rand().'.'.$groupimageextention;

        $path = public_path().'/images/taskcategorygroup/';

        // $request->file('groupimage')->move($path, $groupimagename);

        $request->file('groupimage')->move($path, $groupimagename);

        $taskCategorygroup = new TaskCategoryGroup();
        $taskCategorygroup->groupname = $request->input('groupname');
        $taskCategorygroup->goupimage = $groupimagename;
        $taskCategorygroup ->groupdescription = $request->input('groupdescription');


        // $taskCategorygroup->fill($input);

        $taskCategorygroup->save();

        return back();
    }
}
