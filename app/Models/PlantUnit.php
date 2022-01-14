<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\LoadCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlantUnit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function load_category()
    {
        return $this->belongsTo(LoadCategory::class);
    }
    
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
