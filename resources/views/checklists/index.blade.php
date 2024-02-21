<x-dashboard>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>All checklists</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">checklists</li>
                            <li class="breadcrumb-item active">All checklists</li>
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
                            <h4>All checklists</h4>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="display" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($checklists as $checklist)
                                            <tr>
                                                <td>{{ $checklist->name }}</td>
                                                <td>{{ $checklist->is_active? 'Activated':'Deactivated' }}</td>

                                                <td>
                                                    <ul class="action">
                                                        @if ($checklist->is_active)
                                                            <li><a href="{{ route('checklists.deactivate', [$checklist->id]) }}"
                                                                   class="btn btn-warning text-white px-5"><small>Deactivate</small></a>
                                                            </li>

                                                        @else
                                                            <li><a href="{{ route('checklists.activate', [$checklist->id]) }}"
                                                                   class="btn btn-success text-white px-5"><small>Activate</small></a></li>
                                                        @endif
                                                        <li class="edit"> <a
                                                                href="{{ route('checklists.edit', [$checklist->id]) }}"class="btn btn-primary text-white px -2 mr"><small><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="15" height="15"
                                                                        viewBox="0 0 24 24">
                                                                        <g id="feEdit0" fill="none"
                                                                            fill-rule="evenodd" stroke="none"
                                                                            stroke-width="1">
                                                                            <g id="feEdit1" fill="currentColor">
                                                                                <path id="feEdit2"
                                                                                    d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Zm-1-5L14 5l3 3L7 18H4v-3ZM15 4l2-2l3 3l-2.001 2.001L15 4Z" />
                                                                            </g>
                                                                        </g>
                                                                    </svg></small></a></li>
                                                        <li class="delete"><a
                                                                href="{{ route('checklists.delete', [$checklist->id]) }}"class="btn btn-danger text-white px- 2"><small><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="15" height="15"
                                                                        viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                            d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z" />
                                                                    </svg></small></a></li>
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
