<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    function employee()
    {
        return $this->hasMany(Employee::class);
    }
    function leave()
    {
        return $this->hasMany(Leave::class);
    }
}
