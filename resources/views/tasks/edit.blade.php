<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Create task </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">taskes</li>
                            <li class="breadcrumb-item active"> Add task </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h4 class="card-title mb-0">Add task </h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form class="row"  action="{{ route('tasks.update',[$task->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 col-2">
                                        <h6 class="form-label">Priority Level</h6>
                                        <select name="priority_id" id="" class="form-select">
                                            <option value="{{$task->priority->id}}">{{$task->priority->name}}</option>
                                            @foreach(getPriorities() as $priority)
                                                @if($priority->id==$task->priority_id) @continue @endif
                                                <option value="{{$priority->id}}">{{$priority->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-3">
                                        <h6 class="form-label">Employee</h6>
                                        <select name="employee_id" id="" class="form-select">
                                            <option value="{{$task->employee->id}}">{{$task->employee->employee_number." ". $task->employee->user->name}}</option>
                                            @foreach(getEmployees() as $employee)
                                                @if($employee->id==$task->employee_id) @continue @endif
                                                <option value="{{$employee->id}}">{{$employee->employee_number." ".$employee->user->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="mb-3 col-3">
                                        <h6 class="form-label"> Name</h6>
                                        <input class="form-control" name=" name" value="{{$task->name}}">
                                    </div>
                                    <div class="mb-3 col-4">
                                        <h6 class="form-label">Description</h6>
                                        <input class="form-control" name="description" value="{{$task->description}}">
                                    </div>
                                    <div class="mb-3 col-2">
                                        <h6 class="form-label">Reward</h6>
                                        <input class="form-control" name="reward" type="number" value="{{$task->reward}}" >
                                    </div>
                                    <div class="mb-3 col-3">
                                        <h6 class="form-label">Start Date</h6>
                                        <input class="form-control" name="start_date" type="datetime-local" value="{{$task->start_date}}">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <h6 class="form-label">Due Date</h6>
                                        <input class="form-control" name="due_date" type="datetime-local" value="{{$task->due_date}}">
                                    </div>

                                    <div class="mb-3 col-2 d-flex align-items-center">
                                        <input type="checkbox" id="adjustable" name="is_adjustable" value="1" @checked($task->is_adjustable)>
                                        <label class="form-label" for="adjustable">Is Adjustable</label>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <h6 class="form-label">Status</h6>
                                        <select name="status" id="" class="form-select">
                                            <option value="{{$task->status}}">{{$task->status}}</option>
                                            @if($task->status=='pending')
                                            <option value="active">Activate</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="row card p-3 " id="checklists">
                                        <div class="col-12 d-flex justify-content-between mb-5">
                                            <h4 class="form-label">{{$task->name}} Checklist Items</h4>
                                            <button class="btn btn-outline-primary" id="btn-addChecklist">Add Checklist</button>
                                        </div>
                                        @forelse($task->checklists as $checklist)
                                            <div class=" row">
                                                <div class="mb-3 col-5">
                                                    <h6 class="form-label">Name</h6>
                                                    <input class="form-control" value="{{$checklist->name}}"  readonly>
                                                </div>
                                                <div class="mb-3 col-7">
                                                    <h6 class="form-label">Description</h6>
                                                    <input class="form-control" value="{{$checklist->description}}"  readonly>
                                                </div>
                                            </div>
                                            @empty
                                        @endforelse
                                    </div>


                                    <div class="form-footer d-flex justify-content-center ">
                                        <button class="btn btn-primary btn-block col-4">Update </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <script>
        $('#btn-addChecklist').on('click',function (e){
            e.preventDefault()
            $('#checklists').append(`
            <div class=" row ">
                                <div class="mb-3 col-5">
                                    <h6 class="form-label">Name</h6>
                                    <input class="form-control" name="checklists[]"  required>
                                </div>
                                <div class="mb-3 col-7">
                                    <h6 class="form-label">Description</h6>
                                    <input class="form-control" name="descriptions[]" required>
                                </div>
                            </div>
            `)
        })
    </script>
</x-dashboard>
