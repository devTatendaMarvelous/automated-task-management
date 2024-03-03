<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use App\Models\Task;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Branch;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role!='Admin'){
            return redirect('tasks');
        }else{
            $employees=Employee::all()->count();
            $completedTasks=Task::where('status','complete')->count();
            $activeTasks=Task::where('status','active')->latest()->get();
            $payouts=Salary::sum('net_salary');


            return view('home')
                ->with('employees',$employees)
                ->with('completedTasks',$completedTasks)
                ->with('activeTasks',$activeTasks->count())
                ->with('tasks',$activeTasks->take(6))
            ->with('payouts',$payouts);
        }

    }
}
