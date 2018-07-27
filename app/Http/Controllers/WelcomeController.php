<?php

namespace ChoreWeasel\Http\Controllers;

use Illuminate\Http\Request;
use ChoreWeasel\Models\TaskCategory;

class WelcomeController extends Controller
{
    public function index(){
        $topcategories = TaskCategory::all()->take(3);

        $data = [
            'topcategories' => $topcategories,
        ];

        return view('welcome')->with($data);
    }
}
