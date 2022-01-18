<?php

namespace App\Imports;

use App\Models\Unit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Unit([
            'id' => $row[0],
            'unit_no' => $row[1],
            'unit_desc' => $row[2],
            'unit_model_id' => $row[3],
            'project_id' => $row[4]
        ]);
    }
}
