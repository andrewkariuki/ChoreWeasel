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

        $chart->dataset('highcharts', 'doughnut',  [$totaltaskers, 65, 84, 45, 90])->backgroundColor(
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
        );


        return view('charts.firsttest', ['chart' => $chart]);
    }
}
