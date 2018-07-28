<?php

namespace ChoreWeasel\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class TaskersToClientsChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['Taskers', 'Clients']);
        $this->title("Total Taskers");
    }
}
