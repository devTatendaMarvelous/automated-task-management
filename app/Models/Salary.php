<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded=[];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function tasks()
    {
        return $this->belongsToMany(SalaryTask::class, 'task_payments');
    }
}
