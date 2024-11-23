<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // tambahkan kolom lain yang bisa diisi
    ];

    // Relasi dengan Employee
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
    
    public function other()
    {
        return $this->hasMany(Employee::class);
    }
}