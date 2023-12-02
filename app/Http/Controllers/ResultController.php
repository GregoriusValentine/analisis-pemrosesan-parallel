<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Enum\ResearchTypeEnum;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {
        return view('pages.result.index', [
            'title' => 'Result',
            'comparison' => $this->researchDataComparison(),
            'basic' => $this->researchDataBasic(),
            'parallel' => $this->researchDataParallel(),
        ]);
    }

    public function researchDataComparison()
    {
        $data = Research::all();
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

        return array_merge_callback($basic, $parallel, function ($item1, $item2) {
            return $item1['num'] == $item2['num'];
        });
    }

    public function researchDataBasic()
    {
        return Research::query()->where('type', ResearchTypeEnum::BASIC->value)->get();
    }

    public function researchDataParallel()
    {
        return Research::query()->where('type', ResearchTypeEnum::PARALLEL->value)->get();
    }

    public function destroyAllData()
    {
        DB::table('research')->truncate();
        DB::table('products')->truncate();
        return back();
    }
}
