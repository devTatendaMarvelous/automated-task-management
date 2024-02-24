<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryTask extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded=[];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
