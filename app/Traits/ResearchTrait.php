<?php

namespace App\Traits;

use App\Enum\ResearchTypeEnum;
use App\Models\Research;
use App\Models\ResearchCount;

trait ResearchTrait
{
    public function saveResearch($timeDiff, $type): void
    {
        $num = $this->countResearch($type);
        $research = new Research();
        $research->title = 'Percobaan ' . $type . ' ke-' . $num;
        $research->number = $num;
        $research->type = $type;
        $research->execution_time = $timeDiff;

        $research->save();
    }

    public function countResearch($type): int
    {
        $count = [
            'type' => $type,
            'number' => 0
        ];

        $last = null;

        if ($type === ResearchTypeEnum::PARALLEL->value) {
            $count['type'] = ResearchTypeEnum::PARALLEL->value;
            $last = Research::query()->where('type', $count['type'])->latest()->first();
        } elseif ($type === ResearchTypeEnum::BASIC->value) {
            $count['type'] = ResearchTypeEnum::BASIC->value;
            $last = Research::query()->where('type', $count['type'])->latest()->first();
        }

        if (!$last) {
            $count['number'] = 1;
        } else {
            $count['number'] = $last->number + 1;
        }

        return (int) $count['number'];
    }
}
