<?php

namespace App\Helper;

use App\Enum\CategoryEnum;

class CategoryeHelper
{
    public static function getProductCategory($id): string
    {
        $name = match ($id) {
            CategoryEnum::DAMAGED->value => 'RUSAK',
            CategoryEnum::SECOND->value => 'BEKAS',
            CategoryEnum::NEW->value => 'BARU',
            default => 'null'
        };

        return $name;
    }
}
