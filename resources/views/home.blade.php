<x-dashboard>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{config('app.name')}}</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">{{config('app.name')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-2">
            <div class="row">
                <div class="col-xl- col-md-12 ">
                    <div class="row">
                        @if(Auth::user()->role=='Admin' || Auth::user()->role=='Branch_Admin' )
                            <div class="col-lg-3 col-md-6 box-col-3">
                                <div class="card profit-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="f-w-600 header-text-primary">Employees</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-primary icon-bg-primary"></div>
                                                <h6 class="header-text-primary">{{$employees}}</h6>

                                            </div>
                                        </div>
                                        <div class="right-side icon-right-primary">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 box-col-3">
                                <div class="card visitor-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="f-w-600 header-text-info">Completed Tasks</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-info icon-bg-info"></div>
                                                <h6 class="header-text-info">{{$completedTasks}}</h6>
                                            </div>
                                        </div>
                                        <div class="right-side icon-right-info">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 box-col-3">
                                <div class="card sell-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="f-w-600 header-text-primary">Active Tasks</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-primary icon-bg-primary"></div>
                                                <h6 class="header-text-primary">{{$activeTasks}}</h6>

                                            </div>
                                        </div>
                                        <div class="right-side icon-right-primary">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-primary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 box-col-3">
                                <div class="card sell-card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <p class="f-w-600 header-text-success">Total Payouts</p>
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="profit-wrapper header-text-success icon-bg-success"></div>
                                                <h6 class="header-text-success">${{$payouts}}</h6>

                                            </div>
                                        </div>
                                        <div class="right-side icon-right-success">
                                            <div class="shap-block">
                                                <div class="rounded-shap animate-bg-secondary"><i></i><i></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-12 card p-4">
                    <h5 class="text-center ">Recent Active Tasks </h5>
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
                        @forelse ($tasks as $task)
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
        <!-- Container-fluid Ends-->
    </div>

</x-dashboard>
