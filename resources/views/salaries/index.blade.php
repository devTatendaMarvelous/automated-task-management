<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>All Salaries</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Salaries</li>
                            <li class="breadcrumb-item active">All Salaries</li>
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
                            <h4>All Salaries</h4>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="display" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>Employee Number</th>
                                            <th>Employee</th>
                                            <th>Month</th>
                                            <th>Gross Salary</th>
                                            <th>Deductions</th>
                                            <th>Bonus</th>
                                            <th>Net Salary</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($salaries as $salary)
                                            <tr>

                                                <td><a href="{{route('employees.show',[$salary->employee->id])}}">{{ $salary->employee->employee_number }}</a> </td>
                                                <td>{{ $salary->employee->user->name.' '.$salary->employee->surname }} </td>
                                                <td>{{ $salary->month }}</td>
                                                <td>${{ $salary->gross_salary }}</td>
                                                <td>${{ $salary->deductions }}</td>
                                                <td>${{ $salary->bonuses }}</td>
                                                <td>${{ $salary->net_salary }}</td>
                                                @if(Auth::user()->role=='Admin' || Auth::user()->role=='Branch_Admin' )
                                                        <td>
                                                            <ul class="action">
                                                                <li class="edit">
                                                                    <a href="{{ route('salaries.show', [$salary->id]) }}"class=" text-primary px-2 mr d-flex justify-content-center align-items-center">
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

</x-dashboard>
