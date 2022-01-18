<?php

namespace App\Models;

use App\Models\UnitModel;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function unit_model()
    {
        return $this->belongsTo(UnitModel::class);
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
