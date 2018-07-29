<?php

namespace ChoreWeasel\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use ChoreWeasel\Models\TaskCategory;
use ChoreWeasel\Models\TaskCategoryGroup;

class TaskCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $taskcategorygroups = TaskCategoryGroup::all();

        $data = [
            'taskcategorygroups' => $taskcategorygroups,
        ];

        return view('admin.taskcategories')->with($data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function category_validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'task_category_group_id' => 'required|integer',
                'taskname' => 'required|string|unique:task_categories',
                'taskdescription' => 'required|string|unique:task_categories',
                'taskimage' => 'required|mimes:jpeg,jpg,png'
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
        $category_validator = $this->category_validator($request->all());

        if ($category_validator->fails()) {
            return back()->withErrors($category_validator)->withInput();
        }

        $taskimageextention = $request->file('taskimage')->getClientOriginalExtension();

        $taskimage = 'taskcategory'.'-'.rand().'.'.$taskimageextention;

        $path = public_path().'/images/taskcategory/';

        $publicpath = '/images/taskcategory/'.$taskimage;

        $request->file('taskimage')->move($path, $taskimage);

        // add a new task category to the database
        $taskCategory = new TaskCategory();

        $taskCategory->task_category_group_id = $request->input('task_category_group_id');
        $taskCategory->taskname = $request->input('taskname');
        $taskCategory->taskdescription = $request->input('taskdescription');
        $taskCategory->taskimage = $publicpath;

        $taskCategory->save();

        return back();
    }
}
