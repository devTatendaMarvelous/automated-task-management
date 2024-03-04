<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Artisan;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('salaries.index')->with('salaries',Salary::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalaryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('salaries.show')->with('salary',Salary::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function generate()
    {
        Artisan::call('salaries' );
        Toastr::success('Salaries Generated successfully', 'success');
        return redirect('salaries');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
