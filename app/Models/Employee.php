<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['user_id', 'employee_number', 'middle_name', 'surname', 'phone', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function tasks()
{
    return $this->hasMany(Task::class);

}

}
