<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $fillable = [
            'date_production',
            'parameter_date',
            'project',
            'plan_fuel_factor',
            'cum_prod_ob',
            'cum_prod_coal',
            'cum_fuel',
            'join_survey',
            'ffact',
            'nik' ,
            'name_employee' ,
            'job_type' ,
            'unit_satu_id' ,
            'unit_dua_id' ,
            'insiden' ,
            'achindiv' ,
            'unit_no' ,
            'dump_distance' ,
            'capacity' ,
            'unit_no2' ,
            'premi' ,
            'daily_production' ,
            'hours_production' ,
            'hours_total' ,
            'off_to_work' ,
            'shift' ,
            'prodakt' ,
            'achff' ,
            'ffpr' ,
            'fpi' ,
            'fpremi' ,
            'pakt' ,
            'premiopr' ,
            'sumpremi' ,
    ];

    protected $with = ['project', 'employee','unit','plant_unit','prod_parameter'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);

    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function plant_unit()
    {
        return $this->belongsTo(PlantUnit::class);
    }

    public function prod_parameter()
    {
        return $this->belongsTo(ProdParameter::class);
    }
}

