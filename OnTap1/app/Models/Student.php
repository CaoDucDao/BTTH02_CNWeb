<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'student_code',
        'name',
        'email',
        'phone',
        'date_of_birth',
        'address',
        'gender',
        'status'
    ];
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}