<?php

namespace ChoreWeasel\Http\Controllers;

use ChoreWeasel\User;
use Illuminate\Http\Request;
use ChoreWeasel\Charts\SampleChart;
use ChoreWeasel\Http\Controllers\Charts;

class Charts extends Controller
{
    //
    public function charts(){
        $chart = new SampleChart;
        // $chart = Charts::new('line', 'highcharts')
        // ->setTitle('My Site Users')
        // ->setValues([100, 50, 20])
        // ->setElementLabel('Total Users');

        $totaltaskers = User::whereHas('roles', function ($q) {
            $q->where('name', 'tasker');
        })->count();

        $chart->dataset('Sample', 'pie', [$totaltaskers, 65, 84, 45, 90])
        ->color('#ff0000')
        ->labels(['total taskers', 'that', 'those', 'these', 'that']);

        return view('charts.firsttest', ['chart' => $chart]);
    }
}
