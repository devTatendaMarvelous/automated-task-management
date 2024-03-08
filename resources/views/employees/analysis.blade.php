<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Employees Analysis</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">employees</li>
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

                        <div class="card-body">
                            <div class="dt -ext table-responsive theme-scroll bar">
                                <table class="table table-striped" id="export- button">
                                    <thead>
                                        <tr>
                                            <th scope="col"> Number</th>
                                            <th scope="col">Name</th>
                                            <th scope="col"> Assigned</th>
                                            <th scope="col"> Completed</th>
                                            <th scope="col">Deadlines Met</th>
                                            <th scope="col">Deadlines Missed</th>
                                            <th id="rating" scope="col">Performance</th>
                                            <th id="rating" scope="col">Rating</th>
                                            <th id="rating" scope="col">Comment</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employees as $employee)
                                            <tr>

                                                <td>{{ $employee->employee_number }}</td>
                                                <td>{{ $employee->user->name }} {{ $employee->surname }}</td>
                                                <td>{{$employee->tasks->count()}}</td>
                                                <td>{{ $employee->tasks->where('status','complete')->count()}}</td>
                                                <td>{{$employee->tasks->where('deadline_met',1)->count()}}</td>
                                                <td>{{$employee->tasks->where('deadline_met',0)->count()}}</td>
                                                <td>@if($employee->tasks->where('status','complete')->count()>0)
                                                        {{ round(($employee->tasks->where('status','complete')->count()/$employee->tasks->count())*100, )}} %
                                                    @else
                                                        No Tasks Assigned
                                                    @endif</td>
                                                <td>{{ $employee->rating }} of 10</td>
                                                <td>{{$employee->comment?$employee->comment->comment:'N/A'}}</td>
                                                @if(Auth::user()->role=='Admin' || Auth::user()->role=='Branch_Admin' )
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a  href="{{ route('employees.show', [$employee->id]) }}" class="text-primary ">
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
                {{-- ========================================================== --}}
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <script>
        $('#rating').click()
    </script>

</x-dashboard>
