<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    public function employee()
    {
        return $this->hasMany(employee::class, 'department_id');
    }
}