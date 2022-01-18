<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\AttendanceCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    // use HasFactory;

    use SoftDeletes;

    protected $guarded = [
        'present_time_value' => 'datetime:Y-m-d\TH:i'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function attendance_category()
    {
        return $this->belongsTo(AttendanceCategory::class);
    }
}
