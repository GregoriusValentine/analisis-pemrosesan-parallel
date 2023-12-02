<?php

namespace App\Imports;

use App\Models\Product;
use App\Enum\ResearchTypeEnum;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductBasicImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $item) {
            if ($item->filter()->isNotEmpty()) {
                Product::create([
                    'name' => $item['name'],
                    'merk' => $item['merk'],
                    'manufacture' => $item['manufacture'],
                    'category' => $item['category'],
                    'type' => $item['type'],
                    'selling_price' => $item['selling_price'],
                    'description' => $item['description'],
                    'type_research' => ResearchTypeEnum::BASIC->value
                ]);
            }
        }
    }
}
