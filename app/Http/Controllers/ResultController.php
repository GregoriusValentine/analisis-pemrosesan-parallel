<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use App\Enum\ResearchTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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

    public function destroyAllData(Request $request)
    {
        if ($request->has('confirm_key')) {
            if (is_null($request->confirm_key)) {
                return response()->json([
                    'message' => 'Kode reset tidak boleh kosong!'
                ], 400);
            }

            if ($request->confirm_key !== env('RESET_DATA_KEY')) {
                return response()->json([
                    'message' => 'Kode reset salah!'
                ], 400);
            }

            DB::table('research')->truncate(); # hapus data research
            DB::table('products')->truncate(); # hapus data products

            if (File::exists('product_imports')) File::deleteDirectory('product_imports');
            if (File::exists('product_imports_parallel')) File::deleteDirectory('product_imports_parallel');

            return response()->json([
                'message' => 'Berhasil reset semua data!'
            ]);
        } else {
            if (is_null($request->confirm_key)) {
                return response()->json([
                    'message' => 'Kode reset diperlukan!'
                ], 400);
            }
        }
    }
}
