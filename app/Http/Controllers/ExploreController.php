<?php

namespace ChoreWeasel\Http\Controllers;

use Illuminate\Http\Request;
use ChoreWeasel\Models\TaskCategory;
use ChoreWeasel\Models\TaskCategoryGroup;

class ExploreController extends Controller
{
    //
    public function index()
    {
        //
        $taskcategories = TaskCategory::all();

        $taskcategorygroups = TaskCategoryGroup::with('taskcategories')->get();

        $data = [
            'taskcategories' => $taskcategories,
            'taskcategorygroups' => $taskcategorygroups
        ];

        return view('clients.explore')->with($data);
    }
}
