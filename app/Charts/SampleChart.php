<?php

namespace ChoreWeasel\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class SampleChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    $this->labels(['One', 'Two', 'Three', 'Four', 'Five']);
    $this->title("Total Taskers");
    }
}
