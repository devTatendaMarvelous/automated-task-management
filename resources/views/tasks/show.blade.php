<x-dashboard>
    <div class="page-body">
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row project-cards">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="project-box row">
                                                    <h3 class="text-center mb-5">{{$task->name}} </h3>
                                                    <div class="col-md-6 card p-4">
                                                        <h5 class="text-center ">Task Details </h5>
                                                    <p class="mb-0"> <strong>Current Status: </strong> {{$task->status}}</p>
                                                    <p class="mb-0"> <strong>Assigned To: </strong> {{ $task->employee->user->name}}</p>
                                                    <p class="mb-0"> <strong>Employee Number: </strong> {{$task->employee->employee_number}}</p>
                                                    <p class="mb-0"> <strong>Task Description </strong></p>
                                                    <p class="mb-0">  {{$task->description}}</p>
                                                    <div class="project-status mt-4">
                                                        <div class="d-flex mb-0">
                                                            <p>{{round($progress, 2)}}% </p>
                                                            <div class="flex-grow-1 text-end"><span>Done</span></div>
                                                        </div>
                                                        <div class="progress" style="height: 15px">
                                                            <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{$progress}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6 card p-4">
                                                        <h5 class="text-center ">Task Checklist Items </h5>
                                                    <div class=" d-inline ">
                                                        <form action="{{route('checklists.update',[$task->id])}}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                        @forelse($task->checklists as $checklist)
                                                            <div class="col-6">
                                                                <input type="checkbox" name="checklists[]" id="{{$checklist->id}}" @checked($checklist->is_complete) value="{{$checklist->id}}">

                                                                <label for="{{$checklist->id}}">{{$checklist->name}}</label>
                                                                <p>{{$checklist->description}}</p>
                                                            </div>
                                                        @empty
                                                        @endforelse
                                                            </div>
                                                            @if(auth()->user()->id==$task->employee->user_id or auth()->user()->role=="Admin")
                                                                @if($task->status=='active')
                                                                <div class="d-flex justify-content-center align-items-end">
                                                                    <button type="submit" class="btn btn-primary">Update Progress</button>
                                                                </div>
                                                                @endif
                                                            @endif

                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>

</x-dashboard>
