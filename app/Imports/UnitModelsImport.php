<?php

namespace App\Imports;

use App\Models\UnitModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitModelsImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new UnitModel([
            'model_no' => $row[0]
        ]);
    }
}
