<?php

use App\Models\Employee;
use App\Models\PriorityLevel;
use App\Models\SalaryTask;

function getPriorities()
{
    return PriorityLevel::all();
}
function getEmployees()
{
    return Employee::all();
}
function generateSalaryTasks($task){
    $bonus=0;
    $deduction=0;
    if($task->is_adjustable){

        if($task->deadline_met){
            $bonus=$task->reward*($task->priority->bonus/100);
        }else{
            $deduction=$task->reward*($task->priority->deduction/100);
        }
    }
    SalaryTask::create([
        'task_id'=>$task->id,
        'bonus'=>$bonus,
        'deduction'=>$deduction,
        'reward'=>$task->reward
    ]);
}

function updateRating($employee)
{
    if($employee->tasks->where('status','complete')->count()>0){
        $employee->rating=(float) ($employee->tasks->where('deadline_met',1)->count()/$employee->tasks->where('status','complete')->count())*10;
        $employee->save();
    }
}
