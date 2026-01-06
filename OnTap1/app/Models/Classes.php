<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Thêm dòng này
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory; // Thêm dòng này để sử dụng được hàm factory()

    protected $fillable = [
        'class_code',
        'class_name',
        'semester',
        'academic_year',
        'advisor'
    ];
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}