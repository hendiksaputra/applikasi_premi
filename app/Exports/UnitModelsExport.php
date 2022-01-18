<?php

namespace App\Exports;

use App\Models\UnitModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UnitModelsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UnitModel::select('model_no')->get();
    }
}
