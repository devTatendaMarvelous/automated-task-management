<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>User Cards</h3>
                    </div>
                    <div class="col-sm-6">
                        <a href="/tabulate" class="btn btn-primary">Tabulate</a>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">User Cards</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid user-card">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-lg-4 col-md-6 box-col-33">
                        <div class="card custom-card">
                            <div class="card-header"><img class="img-fluid"
                                    src="{{ asset('assets/images/user-card/1.jpg') }}" alt=""></div>
                            <div class="card-profile"><img class="rounded-circle"
                                    src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('noimage.png') }}"
                                    alt=""></div>
                            <div class="text-center profile-details">
                                <h4>{{ $user->name }}</h4>

                                <h6>{{ $user->role }}</h6>
                            </div>
                            <ul class="card-social">
                                @if ($user->role == 'Instructor' && $user->instructor)
                                    <li><a href="storage/{{ $user->instructor->licence }}"
                                            class="btn btn-primary text-white px-2 " target="_blank"><small><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg> </small></a>
                                    </li>
                                @endif
                                @if ($user->id != 1)
                                    @if ($user->status != 'Active')
                                        <li><a href="{{ route('users.activate', [$user->id]) }}"
                                                class="btn btn-success text-white px-5"><small>Activate</small></a></li>
                                    @else
                                        <li><a href="{{ route('users.deactivate', [$user->id]) }}"
                                                class="btn btn-warning text-white px-5"><small>Deactivate</small></a>
                                        </li>
                                    @endif

                                    <li><a href="{{ route('users.edit', [$user->id]) }}"
                                            class="btn btn-primary text-white px-2 "><small><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24">
                                                    <g id="feEdit0" fill="none" fill-rule="evenodd" stroke="none"
                                                        stroke-width="1">
                                                        <g id="feEdit1" fill="currentColor">
                                                            <path id="feEdit2"
                                                                d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Zm-1-5L14 5l3 3L7 18H4v-3ZM15 4l2-2l3 3l-2.001 2.001L15 4Z" />
                                                        </g>
                                                    </g>
                                                </svg></small></a>
                                    </li>

                                    <li><a href="{{ route('users.delete', [$user->id]) }}"
                                            class="btn btn-danger text-white px-2"><small><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z" />
                                                </svg></small></a></li>
                                @endif
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-dashboard>
