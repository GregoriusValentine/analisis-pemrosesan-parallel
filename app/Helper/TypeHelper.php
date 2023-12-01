<?php

namespace App\Helper;

use App\Enum\TypeEnum;

class TypeHelper
{
    public static function getProductType($id): string
    {
        $name = match ($id) {
            TypeEnum::CELANA->value => 'CELANA',
            TypeEnum::PAKAIAN->value => 'PAKAIAN',
            TypeEnum::SEPATU->value => 'SEPATU',
            TypeEnum::TAS->value => 'TAS',
            default => 'null'
        };

        return $name;
    }
}
