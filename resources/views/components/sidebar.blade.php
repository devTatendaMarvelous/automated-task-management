<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="/home"><img class="img-fluid for-light" src="{{ asset('logo.png') }}"
                    alt="" style="max-width: 130px;"></a>
            <div class="back-btn"><i data-feather="grid"></i></div>
            <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle"
                    data-feather="grid"> </i>
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="/home">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
            </a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-list">
                        <h6>Pinned</h6>
                    </li>
                    <hr>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="/home"><i
                                data-feather="home"></i><span class="lan-3">Dashboard</span></a>
                    </li>

                    @if (Auth::user()->role == 'Admin')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i
                                    data-feather="users"></i><span>Employees</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('employees') }}">All Employees</a></li>
                                <li><a href="{{ route('employees.create') }}">Add Employee </a></li>
                            </ul>
                        </li>
                    @endif


                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i
                                data-feather="check-square"></i><span>Tasks</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('tasks') }}">All Tasks</a></li>
                            <li><a href="{{ route('tasks.create') }}">Add Task </a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role == 'Admin')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i
                                    data-feather="dollar-sign"></i><span>Salaries</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('salaries') }}">All Salaries</a></li>
                                <li><a href="{{ route('salaries.generate') }}">Generate Salaries </a></li>
                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'Admin')
                        <li class="sidebar-list"
                        ><a class="sidebar-link sidebar-title" href="{{ route('employees',['analysis']) }}"><i
                                    data-feather="activity"></i><span>Analysis</span></a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
