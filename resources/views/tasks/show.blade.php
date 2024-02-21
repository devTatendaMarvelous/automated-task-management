
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
                                                <div class="project-box "><span class="badge badge-primary">{{$task->status}}</span>
                                                    <h3>{{$task->name}}</h3>
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <p class="mb-0"> <h5>Assigned to: </h5> {{$task->employee->employee_number." ". $task->employee->user->name}}</p>
                                                        </div>
                                                    </div>
                                                    <p>{{$task->description}}</p>
                                                    <div class="row details">
                                                        @forelse($task->checklists as $checklist)
                                                        <div class="col-4"><span>{{$checklist->name}} </span></div>
                                                        <div class="col-6 font-primary">{{$checklist->is_copmlete?'Done':'Pending'}}</div>
                                                        @empty
                                                        @endforelse
                                                    </div>

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
