<?php

namespace ChoreWeasel\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class TaskCompletionRates extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
