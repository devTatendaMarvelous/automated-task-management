<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>All employees</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">employees</li>
                            <li class="breadcrumb-item active">All employees</li>
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
                            <h4>All employees</h4>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="display" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>Employee Number</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->employee_number }}</td>
                                                <td>{{ $employee->user->name." ".$employee->middle_name }}</td>
                                                <td>{{ $employee->surname }}</td>
                                                <td>{{ $employee->user->email }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>{{ $employee->user->status }}</td>
                                                @if(Auth::user()->role=='Admin' || Auth::user()->role=='Branch_Admin' )
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a  href="{{ route('employees.show', [$employee->id]) }}"class="text-primary ">
                                                                <i data-feather="eye"></i>
                                                            </a>
                                                        </li>
                                                        <li class="edit">
                                                            <a  href="{{ route('employees.edit', [$employee->id]) }}"class="text-primary ">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="delete"><a
                                                                href="{{ route('employees.delete', [$employee->id]) }}"class="text-danger text-sm"><i data-feather="trash-2"></i></a></li>
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
