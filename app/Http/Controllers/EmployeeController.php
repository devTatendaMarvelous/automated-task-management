<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employees.index')->with('employees', Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $request->validate(["name" => "required","surname" => "required", "email" => "required|unique:users", "phone" => "required", "status" => "required", "address" => "required",]);
        $employee = $request->all();
        $employee['password'] = Hash::make('password');

        $user = User::create($employee);
        $employee['user_id'] = $user->id;
        $employee['employee_number'] = 'EMP-' . random_int(1000, 9999);
        Employee::create($employee);
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit')->with('employee',$employee->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee=$employee->first();
        $request->validate(["name" => "required","surname" => "required", "email" => "required", "phone" => "required", "status" => "required", "address" => "required",]);
        $employeeData = $request->all();
        $employee->update($employeeData);

        $employee->user()->update([
            'name'=>$employeeData['name'],
            'email'=>$employeeData['email'],
        ]);
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
