<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        return view('pages.result.index', [
            'title' => 'Result',
            'data' => Research::all()
        ]);
    }

    public function researchData()
    {
        $data = Research::all();

        return response()->json(json_encode($data));
    }
}
