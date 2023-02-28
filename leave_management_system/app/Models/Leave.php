<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'status',
        'department'
    ];

    
    function user()
    {
        return $this->belongsTo(User::class);
    }
    
    function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    function position()
    {
        return $this->belongsTo(Position::class);
    }

}

