<?php

namespace App\Imports;

use App\Models\Project;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProjectImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Project([
            'id' => $row[0],
            'code' => $row[1],
            'name' => $row[2]
        ]);
    }
}
