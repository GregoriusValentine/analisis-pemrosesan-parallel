<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        $response = [
            'import_status' => true,
            'import_message' => 'Berhasil Mengimport Seluruh Data',
        ];
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
                ]);
            }
        }

        session(['import_status' => $response['import_status']]);
        session(['import_message' => $response['import_message']]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
