<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_support',
        'parameter_date',
        'project',
        'plan_fuel_factor',
        'cum_prod_ob',
        'cum_prod_coal',
        'cum_fuel',
        'join_survey',
        'nik',
        'name_employee',
        'job_type',
        'shift',
        'no_unit_1',
        'no_unit_2',
        'unit_no',
        'dump_distance',
        'capacity',
        'unit_no_2',
        'premi',
        'working_hours',
        'insiden',
        'off_to_work',
        'ffact',
        'achff',
        'ffpr',
        'premi_op_support',
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
