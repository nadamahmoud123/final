<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'department_id'];
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
