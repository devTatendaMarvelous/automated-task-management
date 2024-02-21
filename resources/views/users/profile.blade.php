<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Edit User</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active"> Edit User</li>
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
                                <h4 class="card-title mb-0">Edit User</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#"
                                        data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                            class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form class="row" action="{{ route('users.updateProfile', [$user->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 col-6">
                                        <h6 class="form-label">Name</h6>
                                        <input class="form-control" name="name" value="{{ $user->name }}"required>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label f-w-500">Email-Address</label>
                                        <input class="form-control" name="email" value="{{ $user->email }}" required>
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label class="form-label f-w-500">Password</label>
                                        <input class="form-control" name="password" type="password">
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label f-w-500">Photo</label>
                                        <input class="form-control mb-3" type="file" name="photo">
                                        @if ($user->photo)
                                            <center>
                                                <h5>Current Photo</h5>
                                                <img src="{{ asset('storage/' . $user->photo) }}" alt=""
                                                    width="50">
                                            </center>
                                        @else
                                            <h5>No Photo Uploaded</h5>
                                        @endif
                                    </div>
                                    {{-- -------------Instructor----------------- --}}
                                    @if ($user->role == 'Instructor')
                                        <center>
                                            <h3 class="m-t-5">Instructor Profile</h3>
                                        </center>
                                        <div class="mb-3 col-4">
                                            <h6 class="form-label">Licence Number</h6>
                                            <input class="form-control" name="licence_number"
                                                value="{{ $instructor->licence_number }}" required>
                                        </div>
                                        <div class="mb-3 col-4">
                                            <h6 class="form-label">Licence </h6>
                                            <input class="form-control" type="file" name="licence">
                                        </div>
                                        <div class="mb-3 col-4">
                                            <h6 class="form-label">Defensive Number</h6>
                                            <input class="form-control" name="defensive_number"
                                                value="{{ $instructor->defensive_number }}" required>
                                        </div>
                                        <div class="mb-3 col-4">
                                            <label class="form-label f-w-500">Defensive</label>
                                            <input class="form-control" type="file" name="defensive">
                                        </div>
                                        <div class="mb-3 col-4">
                                            <label class="form-label f-w-500">Phone</label>
                                            <input class="form-control" type="text"
                                                name="phone"value="{{ $instructor->phone }}" required>
                                        </div>

                                        <div class="mb-3 col-4">
                                            <label class="form-label f-w-500">Branch</label>
                                            <select class="form-control" name="branch_id">
                                                <option value="{{ $instructor->branch_id }}">
                                                    {{ $instructor->branch_name }}</option>
                                                @forelse($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>

                                        </div>
                                        @php $icourses=explode(',',$instructor->courses) @endphp

                                        <div class="mb-3 col-6">
                                            <textarea name="address" id="" cols="30" rows="4" class="form-control" placeholder="Address"
                                                required>{{ $instructor->address }}</textarea>
                                        </div>
                                        <div class="mb-3 col-6 row">
                                            @forelse($courses as $course)
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label col-form-label "
                                                        for="permission{{ $course->id }}">
                                                        {{ $course->name }}</label>
                                                    <input type="checkbox" id="permission{{ $course->id }}"
                                                        @checked(in_array($course->id, $icourses)) name="courses[]"
                                                        value="{{ $course->id }}">
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    @endif
                                    <center>

                                        <div class="form-footer ">
                                            <button class="btn btn-primary btn-block col-4">Update User</button>
                                        </div>
                                    </center>
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
