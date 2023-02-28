<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
    ];


    function user()
    {
        return $this->hasMany(User::class);
    }
    function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
