<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\DataLengkap;
use App\Models\MasterCaleg;

class Summary
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 

    public function build()
    {

        return $this->chart->pieChart()
            ->setTitle('Summary Perolehan Suara By Caleg')
            ->addData(DataLengkap::selectRaw('SUM(data_lengkaps.perolehan_suara) AS perolehan_suara')->groupByRaw('caleg_id')->pluck('perolehan_suara')->toArray())
            ->setLabels(MasterCaleg::select('name')->pluck('name')->toArray());
    }
}