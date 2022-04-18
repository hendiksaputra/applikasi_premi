<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdParameter extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'project_id',
        'parameter_date',
        'plan_fuel_factor',
        'cum_prod_ob',
        'cum_prod_coal',
        'cum_fuel',
        'join_survey',
    ];
    protected $with = ['project'];


    public function project()
    {
        return $this->belongsTo(Project::class);
       
    }
}
