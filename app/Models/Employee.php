<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Warning;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    // use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function warning()
    {
        return $this->hasMany(Warning::class);
    }
    
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
