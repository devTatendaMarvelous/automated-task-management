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
                                                    <h3 class="text-center mb-5">{{$employee->name}} </h3>

                                                    <div class="d-flex justify-content-between">


                                                        <div class="col-md-6 card p-4">
                                                            <h5 class="text-center ">Employee Details </h5>
                                                            <p class="mb-0"> <strong>Current Status: </strong> {{$employee->user->status}}</p>
                                                            <p class="mb-0"> <strong>Assigned To: </strong> {{ $employee->user->name}}</p>
                                                            <p class="mb-0"> <strong>Employee Number: </strong> {{$employee->employee_number}}</p>
                                                            <p class="mb-0"> <strong>Comment: </strong></p>
                                                            <p class="mb-0">  {{$employee->comment->comment}}</p>
                                                        </div>
                                                        <div class="col-md-6 card p-4">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="text-center ">Employee Performance </h5>
                                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Comment</button>
                                                            </div>

                                                            <p class="mb-0"> <strong>Tasks Assigned: </strong> {{$employee->tasks->count()}}</p>
                                                            <p class="mb-0"> <strong>Completed Tasks: </strong> {{ $employee->tasks->where('status','complete')->count()}}</p>
                                                            <p class="mb-0"> <strong>Pending Tasks: </strong> {{$employee->tasks->where('status','active')->count()}}</p>
                                                            <p class="mb-0"> <strong> Tasks With Missed Deadlines: </strong> {{$employee->tasks->where('deadline_met',0)->count()}}</p>
                                                            <p class="mb-0"> <strong> Overall Employee Performance: </strong>
                                                                @if($employee->tasks->where('status','complete')->count()>0)
                                                                    {{ round(($employee->tasks->where('status','complete')->count()/$employee->tasks->count())*100, 1)}} %
                                                                @else
                                                                    No Tasks Assigned
                                                                @endif
                                                            </p>
                                                            <p class="mb-0"> <strong> Overall Employee Rating: </strong>
                                                                @if($employee->tasks->where('status','complete')->count()>0)
                                                                    {{ round(($employee->tasks->where('deadline_met',1)->count()/$employee->tasks->where('status','complete')->count())*10, 1)}} of 10
                                                                @else
                                                                    Unrated
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 card p-4">
                                                        <h5 class="text-center ">{{$employee->user->name}} Tasks </h5>
                                                        <table class="display" id="export-button">
                                                            <thead>
                                                            <tr>

                                                                <th>Reference</th>
                                                                <th>Name</th>
                                                                <th>Start Date</th>
                                                                <th>Due Date</th>
                                                                <th>Reward</th>
                                                                <th>Priority</th>
                                                                <th>Adjustable</th>
                                                                <th>Status</th>
                                                                <th>Action</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @forelse ($employee->tasks as $task)
                                                                <tr>
                                                                    <td>{{ $task->reference_number }}</td>
                                                                    <td>{{ $task->name}}</td>
                                                                    <td>{{ $task->start_date }}</td>
                                                                    <td>{{ $task->due_date }}</td>
                                                                    <td>{{ $task->reward }}</td>
                                                                    <td>{{ $task->priority->name }}</td>
                                                                    <td>{{ $task->is_adjustable?'Yes':'No' }}</td>
                                                                    <td>{{ $task->status }}</td>
                                                                    @if(Auth::user()->role=='Admin' || Auth::user()->role=='Branch_Admin' )
                                                                        <td>
                                                                            <ul class="action">
                                                                                <li class="edit">
                                                                                    <a href="{{ route('tasks.show', [$task->id]) }}"class=" text-primary px-2 mr d-flex justify-content-center align-items-center">
                                                                                        <i data-feather="eye"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @empty
                                                            @endforelse
                                                            {{-- ================================================================== --}}
                                                            </tbody>
                                                        </table>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('employees.comment',[$employee->id])}}">
                        @csrf
                        <textarea class="form-control mb-3" placeholder="Comment here.." name="comment"></textarea>
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-secondary" type="submit">Save Comment</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</x-dashboard>
