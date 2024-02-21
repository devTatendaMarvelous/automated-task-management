<div class="page-header">
        <div class="header-wrapper row m-0">

          <div class="nav-right col-12 pull-rig ht right-head er p-0">
            <ul class="nav-menus row">

                <li class="onhover-dropdown col-3" >
                    <div class="notification-box" ><i data-feather="bell" ></i>
                    </div>
                    <div id="notify-bell"></div>
                </li>
              <li class="profile-nav onhover-dropdown col-6" style="width: 200px;">
                <div class="account-user"> <h6>{{Auth::user()->name}}</h6>
                    <p> * {{Auth::user()->role}}</p>
{{--                    <i data-feather="user"></i>--}}
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="{{route('users.profile',[Auth::user()->id])}}"><i data-feather="settings"></i><span>Settings</span></a></li>
                  <li>
                     <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     <button type="submit"><i data-feather="log-in"></i><span>Log Out</span></button>
                    </form>
                    </li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">Tait</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
