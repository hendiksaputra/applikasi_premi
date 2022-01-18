<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\WarningCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warning extends Model
{
    // use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function warning_category()
    {
        return $this->belongsTo(WarningCategory::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
