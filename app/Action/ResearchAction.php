<?php

namespace App\Action;

use Illuminate\Http\Request;
use App\Imports\ProductBasicImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductParallelImport;

class ResearchAction
{
    public function basicExecute(Request $request): string
    {
        $file = $request->file('file');
        $filename = rand() . $file->getClientOriginalName();
        $file->move('parallel_import', $filename);
        Excel::import(new ProductBasicImport(), public_path('parallel_import/' . $filename));
        $path = public_path('parallel_import/' . $filename);
        if (File::exists($path)) File::delete($path);
        return $path;
    }

    public function parallelExecute(Request $request): string
    {
        $file = $request->file('file');
        $filename = rand() . $file->getClientOriginalName();
        $file->move('basic_import', $filename);
        Excel::import(new ProductParallelImport(), public_path('basic_import/' . $filename));
        $path = public_path('basic_import/' . $filename);
        if (File::exists($path)) File::delete($path);
        return $path;
    }
}
