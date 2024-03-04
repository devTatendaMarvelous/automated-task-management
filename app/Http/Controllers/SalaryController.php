<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Models\TaskPayment;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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
        try {
            info('processing salaries...');
            $employees = Employee::whereHas('user', function ($query) {
                $query->where('status', 'active');
            })->get();

            $employees->each(function ($employee){
                DB::beginTransaction();
                $unpaidSalaryTasks = $employee->tasks->map(function ($task) {
                    return $task->salaryTask()->where('is_paid', 0)->first();
                })->filter();
                $bonus=0;
                $deductions=0;
                $grosssalary=0;
                $taskIds=[];
                foreach($unpaidSalaryTasks as $task){
                    $bonus+=$bonus;
                    $deductions+=$deductions;
                    $grosssalary+=($task->reward-$task->deductions+$task->bonus);
                    $task->update(['is_paid'=>1]);
                    $taskIds[]=$task->id;
                }
                if(count($unpaidSalaryTasks)){
                    $salary=Salary::create([
                        'employee_id'=>$employee->id,
                        'month'=>Carbon::parse(now())->format('M'),
                        'gross_salary'=>$grosssalary,
                        'deductions'=>$deductions,
                        'bonuses'=>$bonus,
                        'net_salary'=>($grosssalary-$deductions+$bonus)
                    ]);
                    foreach ($taskIds as $taskId){
                        TaskPayment::create([
                            'salary_id'=>$salary->id,
                            'salary_task_id'=>$taskId
                        ]);
                    }
                }

                DB::commit();
            });

            Toastr::success('Salaries Generated successfully', 'success');
            return redirect('salaries');
        }catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }

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
