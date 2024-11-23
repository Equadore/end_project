<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'division_id',
        'position',
        'join_date',
        'status',
        'address'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}