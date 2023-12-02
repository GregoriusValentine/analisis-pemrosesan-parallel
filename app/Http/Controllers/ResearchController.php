<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Traits\ResearchTrait;
use App\Action\ParallelAction;
use App\Enum\ResearchTypeEnum;
use App\Imports\ProductImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductRequest;
use App\Imports\ProductParallelImport;

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

            $file = $request->file('file');
            $nama_file = rand() . $file->getClientOriginalName();

            $file->move('product_imports_parallel', $nama_file);
            Excel::import(new ProductParallelImport(), public_path('product_imports_parallel/' . $nama_file));

            $endTime = microtime(true);
            $timeDiff = $endTime - $startTime;
            if (File::exists(public_path('product_imports_parallel/' . $nama_file))) File::delete(public_path('product_imports_parallel/' . $nama_file));
            $this->saveResearch(sprintf("%0.3f", $timeDiff), ResearchTypeEnum::PARALLEL->value);

            DB::commit();
            return response()->json([
                'statusCode' => 200,
                'execution_time' => sprintf("%0.2f", $timeDiff),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            if (File::exists(public_path('product_imports_parallel/' . $nama_file))) File::delete(public_path('product_imports_parallel/' . $nama_file));
            return response()->json($e->getMessage());
        }
    }

    public function storeBasic(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $startTime = microtime(true);

            $file = $request->file('file');
            $nama_file = rand() . $file->getClientOriginalName();

            $file->move('product_imports', $nama_file);

            Excel::import(new ProductImport(), public_path('product_imports/' . $nama_file));

            $endTime = microtime(true);
            $timeDiff = $endTime - $startTime;

            if (File::exists(public_path('product_imports/' . $nama_file))) File::delete(public_path('product_imports/' . $nama_file));

            $this->saveResearch(sprintf("%0.3f", $timeDiff), ResearchTypeEnum::BASIC->value);

            DB::commit();

            return response()->json([
                'statusCode' => 200,
                'execution_time' => sprintf("%0.2f", $timeDiff),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            if (File::exists(public_path('product_imports/' . $nama_file))) File::delete(public_path('product_imports/' . $nama_file));
            return response()->json($e->getMessage());
        }
    }
}
