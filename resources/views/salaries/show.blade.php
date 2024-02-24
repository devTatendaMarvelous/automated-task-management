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

                                                    <div class="col-md-6 card p-4">
                                                        <h5 class="text-center ">salary Details </h5>
                                                    <p class="mb-0 d-flex justify-content-between"> <strong>Employee Number: </strong> {{$salary->employee->employee_number}}</p>
                                                    <p class="mb-0 d-flex justify-content-between"> <strong>Employee Name: </strong> {{ $salary->employee->user->name.' '.$salary->employee->surname}}</p>
                                                        <p class="mb-0 d-flex justify-content-between"> <strong>Gross Salary : </strong> ${{$salary->gross_salary}}</p>
                                                        <p class="mb-0 d-flex justify-content-between"> <strong>Salary Deductions: </strong> ${{$salary->deductions}}</p>
                                                        <p class="mb-0 d-flex justify-content-between"> <strong>Salary Bonuses: </strong> ${{$salary->bonuses}}</p>
                                                        <p class="mb-0 d-flex justify-content-between"> <strong>Net Salary : </strong> ${{$salary->net_salary}}</p>



                                                    </div>
                                                    <div class="col-12 card p-4">
                                                        <h5 class="text-center ">Salary Summary </h5>
                                                        <table class="display" id="export-button">
                                                            <thead>
                                                            <tr>

                                                                <th>Task Reference</th>
                                                                <th>Reward</th>
                                                                <th>Deduction</th>
                                                                <th>Bonus</th>
                                                                <th>Action</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @forelse ($salary->tasks as $task)
                                                                <tr>
                                                                    <td><a  href="{{ route('tasks.show', [$task->task->id]) }}" >{{ $task->task->reference_number }}</a></td>
                                                                    <td>${{ $task->reward}}</td>
                                                                    <td>${{ $task->deduction }}</td>
                                                                    <td>${{ $task->bonus }}</td>
                                                                        <td>
                                                                            <ul class="action">
                                                                                <li class="edit">
                                                                                    <a href="{{ route('tasks.show', [$task->task->id]) }}"class=" text-primary px-2 mr d-flex justify-content-center align-items-center">
                                                                                        <i data-feather="eye"></i>
                                                                                    </a>
                                                                                </li>

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
