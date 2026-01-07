<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'department_id', // Lưu ý: Phải khớp tên cột trong Database (thường là department_id)
        'position',
        'salary'
    ];
    public function department()
    {
        return $this->belongsTo(department::class, 'department_id');
    }
}