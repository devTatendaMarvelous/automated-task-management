<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable=[
        "priority_id" ,
        "employee_id" ,
        "name" ,
        "description",
        "reward",
        "start_date" ,
        "due_date" ,
        "status" ,'reference_number',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function priority()
    {
        return $this->belongsTo(PriorityLevel::class);
    }
    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}
