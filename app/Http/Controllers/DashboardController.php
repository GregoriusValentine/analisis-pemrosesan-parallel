<?php

namespace App\Http\Controllers;

use App\Enum\ResearchTypeEnum;
use App\Models\Product;
use App\Models\Research;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function scoreBoxStatistic(): JsonResponse
    {
        $research = Research::all();
        $score = collect([
            'total_research' => 0,
            'total_research_parallel' => 0,
            'total_research_basic' => 0,
            'avg_basic_speed' => 0,
            'avg_parallel_speed' => 0,
            'total_data_import' => 0
        ]);

        if (!is_null($research)) {
            $score = collect([
                'total_research' => (string) number_format(count($research), 0, ',', '.'),
                'total_research_parallel' => (string) number_format($research->where('type', ResearchTypeEnum::PARALLEL->value)->count(), 0, ',', '.'),
                'total_research_basic' => (string) number_format($research->where('type', ResearchTypeEnum::BASIC->value)->count(), 0, ',', '.'),
                'total_data_import' => (string) number_format(Product::count(), 0, ',', '.'),
                'avg_basic_speed' => (string) number_format($research->where('type', ResearchTypeEnum::BASIC->value)->avg('execution_time'), 3, ',', '.') . ' s',
                'avg_parallel_speed' => (string) number_format($research->where('type', ResearchTypeEnum::PARALLEL->value)->avg('execution_time'), 3, ',', '.') . ' s',
            ]);
        }

        return response()->json(json_encode($score));
    }

    public function chartStat()
    {
        $data = Research::all();
        $product = Product::select('id', 'type_research')->get();

        $dataChartLine = [
            'labels' => [],
            'datasets' => [
                'parallel' => [
                    'label' => 'Parallel',
                    'data' => []
                ],
                'basic' => [
                    'label' => 'Basic',
                    'data' => []
                ]
            ]
        ];

        $dataChartPie = [
            'dataPar' => number_format($product->where('type_research', ResearchTypeEnum::PARALLEL->value)->count(), 0, ',', '.'),
            'dataBas' => number_format($product->where('type_research', ResearchTypeEnum::BASIC->value)->count(), 0, ',', '.'),
        ];

        $parallel = [];

        $basic = [];

        foreach ($data as $key => $item) {
            if ($item->type === ResearchTypeEnum::BASIC->value) {
                array_push($basic, [
                    'num' => $item->number,
                    'b_exec_time' => $item->execution_time
                ]);
            } elseif ($item->type === ResearchTypeEnum::PARALLEL->value) {
                array_push($parallel, [
                    'num' => $item->number,
                    'p_exec_time' => $item->execution_time
                ]);
            }
        }

        function array_merge_callback($array1, $array2, $predicate)
        {
            $result = array();
            foreach ($array1 as $item1) {
                foreach ($array2 as $item2) {
                    if ($predicate($item1, $item2)) {
                        $result[] = array_merge($item1, $item2);
                    }
                }
            }
            return $result;
        }

        $result =  array_merge_callback($basic, $parallel, function ($item1, $item2) {
            return $item1['num'] == $item2['num'];
        });

        foreach ($result as $res) {
            array_push($dataChartLine['labels'], 'P-' . $res['num']);
            array_push($dataChartLine['datasets']['parallel']['data'], (float)$res['p_exec_time']);
            array_push($dataChartLine['datasets']['basic']['data'], (float)$res['b_exec_time']);
        }

        return response()->json(json_encode([
            'line' => $dataChartLine,
            'pie' => $dataChartPie
        ]));
    }
}
