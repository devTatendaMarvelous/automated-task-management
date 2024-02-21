<?php

use App\Models\Employee;
use App\Models\PriorityLevel;

function getPriorities()
{
    return PriorityLevel::all();
}
function getEmployees()
{
    return Employee::all();
}
