<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>All tasks</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">tasks</li>
                            <li class="breadcrumb-item active">All tasks</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                {{-- ================================================================= --}}
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4>All tasks</h4>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="display" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>Reference</th>
                                            <th>Name</th>
                                            <th>Employee Assigned</th>
                                            <th>Start Date</th>
                                            <th>Due Date</th>
                                            <th>Reward</th>
                                            <th>Priority</th>
                                            <th>Adjustable</th>
                                            <th>Deadline Met</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tasks as $task)
                                            <tr>
                                                <td>{{ $task->reference_number }}</td>
                                                <td>{{ $task->name}}</td>
                                                <td><a href="{{route('employees.show',[$task->employee->id])}}">{{ $task->employee->employee_number }}</a> </td>
                                                <td>{{ $task->start_date }}</td>
                                                <td>{{ $task->due_date }}</td>
                                                <td>{{ $task->reward }}</td>
                                                <td>{{ $task->priority->name }}</td>
                                                <td>{{ $task->is_adjustable?'Yes':'No' }}</td>
                                                <td>{{ $task->deadline_met?'Yes':'No' }}</td>
                                                <td>{{ $task->status }}</td>

                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="{{ route('tasks.show', [$task->id]) }}"class=" text-primary px-2 mr d-flex justify-content-center align-items-center">
                                                                <i data-feather="eye"></i>
                                                            </a>
                                                        </li>
                                                        @if(Auth::user()->role=='Admin' || Auth::user()->role=='Branch_Admin' )
                                                        <li class="edit">
                                                            <a href="{{ route('tasks.edit', [$task->id]) }}"class=" text-primary px-2 mr d-flex justify-content-center align-items-center">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="{{ route('tasks.delete', [$task->id]) }}"class=" text-danger px- 2  d-flex justify-content-center align-items-center">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </td>

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
                {{-- ========================================================== --}}
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

</x-dashboard>
