<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Salary;
use App\Models\SalaryTask;
use App\Models\Task;
use App\Models\TaskPayment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ProcessSalaries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salaries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
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

            info('Done processing ');

        }catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
