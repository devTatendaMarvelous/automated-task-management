<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Create checklist </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">checklists</li>
                            <li class="breadcrumb-item active"> Add checklist </li>
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
                                <h4 class="card-title mb-0">Add checklist </h4>
                                <div class="card-options"><a class="card-options-collapse" href="#"
                                        data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                            class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form class="row" action="{{ route('checklists.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 col-8">
                                        <h6 class="form-label">checklist Name</h6>
                                        <input class="form-control" name=" name">
                                    </div>


                                        <div class="mb-3 col-4">
                                            <h6></h6>
                                            <button class="btn btn-primary btn-block col-4">Create </button>
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
