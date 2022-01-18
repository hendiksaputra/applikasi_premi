<?php

namespace App\Models;

use App\Models\Warning;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WarningCategory extends Model
{
    use HasFactory;

    public function warning()
    {
        return $this->hasMany(Warning::class);
    }
}
