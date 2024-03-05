<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
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
        $request->validate([
            "name" => "required","surname" => "required",
            "email" => "required|unique:users",
            "phone" => "required",
            "status" => "required",
            "address" => "required",
            ]);
        $employee = $request->all();
        $employee['password'] = Hash::make('password');
        $employee['status'] = 'Active';
        $user = User::create($employee);
        $employee['user_id'] = $user->id;
        $employee['employee_number'] = 'EMP-' . random_int(1000, 9999);
        Employee::create($employee);
        Toastr::success('Employee created successfully', 'success');
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('employees.show')->with('employee',Employee::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('employees.edit')->with('employee',Employee::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee=$employee->first();
        $request->validate(["name" => "required",
            "surname" => "required",
            "email" => "required",
            "phone" => "required",
            "status" => "required",
            "address" => "required",
            ]);
        $employeeData = $request->all();
        $employee->update($employeeData);

       $user= $employee->user()->first();

        $user->name=$employeeData['name'];
        $user->email=$employeeData['email'];
         $user->status=$employeeData['status'];
       $user->save();

        Toastr::success('Employee Updated successfully', 'success');
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        Toastr::success('Employee deleted successfully', 'success');
        return back();
    }
}
