<?php

namespace App\Http\Controllers;

use App\Enum\ResearchTypeEnum;
use App\Models\Research;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function scoreBoxStatistic()
    {
        $research = Research::all();
        $score = collect([
            'total_research' => 0,
            'total_research_parallel' => 0,
            'total_research_basic' => 0,
        ]);

        if (!is_null($research)) {
            $score = collect([
                'total_research' => (string) number_format(count($research), 0, ',', '.'),
                'total_research_parallel' => (string) number_format($research->where('type', ResearchTypeEnum::PARALLEL->value)->count(), 0, ',', '.'),
                'total_research_basic' => (string) number_format($research->where('type', ResearchTypeEnum::BASIC->value)->count(), 0, ',', '.'),
            ]);
        }

        return response()->json(json_encode($score));
    }
}
