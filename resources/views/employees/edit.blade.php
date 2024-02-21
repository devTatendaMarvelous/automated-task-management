<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Edit Employee </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Employeees</li>
                            <li class="breadcrumb-item active"> Edit Employee </li>
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
                                <h4 class="card-title mb-0">Edit Employee </h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form class="row"  action="{{ route('employees.update',[$employee->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 col-4">
                                        <h6 class="form-label"> Name</h6>
                                        <input class="form-control" name=" name" value="{{$employee->user->name}}" >
                                    </div>
                                    <div class="mb-3 col-4">
                                        <h6 class="form-label">Middle name</h6>
                                        <input class="form-control" name="middle_name" value="{{$employee->middle_name}}">
                                    </div>
                                    <div class="mb-3 col-4">
                                        <h6 class="form-label">Surname</h6>
                                        <input class="form-control" name="surname" value="{{$employee->surname}}">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <h6 class="form-label">Email</h6>
                                        <input class="form-control" name=" email" type="email" value=" {{$employee->user->email}}">
                                    </div><div class="mb-3 col-3">
                                        <h6 class="form-label">Phone</h6>
                                        <input class="form-control" name=" phone" value=" {{$employee->phone}}">
                                    </div><div class="mb-3 col-2">
                                        <h6 class="form-label">Status</h6>
                                        <select name="status" id="" class="form-select">
                                            <option value="{{$employee->user->status}}">{{$employee->user->status}}</option>
                                            <option value="{{$employee->user->status=='Active'?'Deactivated':'Active'}}">{{$employee->user->status=='Active'?'Deactivate':'Activate'}}</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-4">
                                        <h6 class="form-label">Address</h6>
                                        <input class="form-control" name=" address" value="{{$employee->address}}" >
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
</x-dashboard>
