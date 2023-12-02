<?php

namespace App\Http\Controllers;

use App\Action\ResearchAction;
use App\Traits\ResearchTrait;
use App\Enum\ResearchTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ResearchController extends Controller
{
    use ResearchTrait;

    public function index()
    {
        return view('pages.research.index', [
            'title' => 'Research'
        ]);
    }

    public function storeParallel(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $startTime = microtime(true);
            $path = (new ResearchAction())->parallelExecute($request);
            $endTime = microtime(true);
            $timeDiff = $endTime - $startTime;
            $this->saveResearch(sprintf("%0.3f", $timeDiff), ResearchTypeEnum::PARALLEL->value);
            DB::commit();
            return response()->json([
                'statusCode' => 200,
                'execution_time' => sprintf("%0.3f", $timeDiff),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            if (File::exists($path)) File::delete($path);
            return response()->json($e->getMessage());
        }
    }

    public function storeBasic(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $startTime = microtime(true);
            $path = (new ResearchAction())->basicExecute($request);
            $endTime = microtime(true);
            $timeDiff = $endTime - $startTime;
            $this->saveResearch(sprintf("%0.3f", $timeDiff), ResearchTypeEnum::BASIC->value);
            DB::commit();
            return response()->json([
                'statusCode' => 200,
                'execution_time' => sprintf("%0.3f", $timeDiff),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            if (File::exists($path)) File::delete($path);
            return response()->json($e->getMessage());
        }
    }
}
