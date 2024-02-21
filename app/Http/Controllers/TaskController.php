<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.index')->with('tasks',Task::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                "priority_id" => "required",
                "employee_id" => "required",
                "name" => "required",
                "description" =>"required",
                "reward" =>"required",
                "start_date" => "required",
                "due_date" => "required",
                "status" => "required",
            ]);
            $task=new Task();
            $task->reference_number='TSK-'.random_int(100,99999);
            $task->priority_id=$request->priority_id;
            $task->employee_id=$request->employee_id;
            $task->name=$request->name;
            $task->description=$request->description;
            $task->reward=$request->reward;
            $task->start_date=$request->start_date;
            $task->due_date=$request->due_date;
            $task->status=$request->status;
            if ($request->has('is_adjustable')){
                $task->is_adjustable=$request->is_adjustable;
            }
            $task->save();
            $data=$request->all();
            $checklists=$data['checklists'];
            $descriptions=$data['descriptions'];
            for($i=0;$i<sizeof($checklists);$i++){
                $checklist=new Checklist();
                $checklist->task_id=$task->id;
                $checklist->name=$checklists[$i];
                $checklist->description=$descriptions[$i];
                $checklist->save();
            }
            DB::commit();
            return redirect('tasks');
        }catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
    }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);
        $count=$task->checklists->count();
        $completed=0;
        foreach ($task->checklists as $checklist){
            if ($checklist->is_complete){
                $completed++;
            }
        }
        $progress=($completed/$count)*100;

        return view('tasks.show')->with('task',$task)->with('progress',$progress);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('tasks.edit')->with('task',Task::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                "priority_id" => "required",
                "employee_id" => "required",
                "name" => "required",
                "description" =>"required",
                "reward" =>"required",
                "start_date" => "required",
                "due_date" => "required",
                "status" => "required",
            ]);
            $task=Task::find($id);
            $task->reference_number='TSK-'.random_int(100,99999);
            $task->priority_id=$request->priority_id;
            $task->employee_id=$request->employee_id;
            $task->name=$request->name;
            $task->description=$request->description;
            $task->reward=$request->reward;
            $task->start_date=$request->start_date;
            $task->due_date=$request->due_date;
            $task->status=$request->status;
            if ($request->has('is_adjustable')){
                $task->is_adjustable=$request->is_adjustable;
            }
            $task->save();
            $data=$request->all();
            $checklists=$data['checklists'];
            $descriptions=$data['descriptions'];
            for($i=0;$i<sizeof($checklists);$i++){
                $checklist=new Checklist();
                $checklist->task_id=$id;
                $checklist->name=$checklists[$i];
                $checklist->description=$descriptions[$i];
                $checklist->save();
            }
            DB::commit();
            return redirect('tasks');
        }catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
