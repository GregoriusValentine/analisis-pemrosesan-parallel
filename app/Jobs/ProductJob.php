<?php

namespace App\Jobs;

use App\Enum\ResearchTypeEnum;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function handle(): void
    {
        foreach ($this->collection as $key => $item) {
            if ($item->filter()->isNotEmpty()) {
                Product::create([
                    'name' => $item['name'],
                    'merk' => $item['merk'],
                    'manufacture' => $item['manufacture'],
                    'category' => $item['category'],
                    'type' => $item['type'],
                    'selling_price' => $item['selling_price'],
                    'description' => $item['description'],
                    'type_research' => ResearchTypeEnum::PARALLEL->value,
                ]);
            }
        }
    }
}
