<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\DataLengkap;
use App\Models\MasterCaleg;
use App\Models\SuaraGroup;

class Summary
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 

    public function build()
    {
        $suara1 = intval(SuaraGroup::selectRaw('
            SUM(suara1) AS suara1
        ')
        ->where('partai_id', 1)
        ->value('suara1'));
        
        $suara2 = intval(SuaraGroup::selectRaw('
            SUM(suara2) AS suara2
        ')
        ->where('partai_id', 1)
        ->value('suara2'));

        $suara3 = intval(SuaraGroup::selectRaw('
            SUM(suara3) AS suara3
        ')
        ->where('partai_id', 1)
        ->value('suara3'));

        $suara4 = intval(SuaraGroup::selectRaw('
            SUM(suara4) AS suara4
        ')
        ->where('partai_id', 1)
        ->value('suara4'));

        $suara5 = intval(SuaraGroup::selectRaw('
            SUM(suara5) AS suara5
        ')
        ->where('partai_id', 1)
        ->value('suara5'));

        $suara6 = intval(SuaraGroup::selectRaw('
            SUM(suara6) AS suara6
        ')
        ->where('partai_id', 1)
        ->value('suara6'));

        $suara7 = intval(SuaraGroup::selectRaw('
            SUM(suara7) AS suara7
        ')
        ->where('partai_id', 1)
        ->value('suara7'));

        $suara8 = intval(SuaraGroup::selectRaw('
            SUM(suara8) AS suara8
        ')
        ->where('partai_id', 1)
        ->value('suara8'));

        $suara9 = intval(SuaraGroup::selectRaw('
            SUM(suara9) AS suara9
        ')
        ->where('partai_id', 1)
        ->value('suara9'));

        $suara10 = intval(SuaraGroup::selectRaw('
            SUM(suara10) AS suara10
        ')
        ->where('partai_id', 1)
        ->value('suara10'));

        return $this->chart->donutChart()
            ->setTitle('Summary Perolehan Suara By Caleg')
            ->addData([$suara1, $suara2, $suara3, $suara4, $suara5, $suara6, $suara7, $suara8, $suara9, $suara10])
            ->setLabels(MasterCaleg::select('name')->where('partai_id', 1)->pluck('name')->toArray());
    }
}