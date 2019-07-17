      <header class="top-menu-header">
        <!-- Logo -->
        <a href="/{{Auth::user()->type}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img style="width: 40px; height: 40px;" src="{{asset('img/icons/hostel_white-128.png')}}" class="img-circle" alt="Logo Mini"/></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
          @if(Auth::user()->type == 'admin')
            <b>CIP </b>Admin</span>
          @elseif(Auth::user()->type == 'maid')
            <b>CIP </b>Maid</span>
          @elseif(Auth::user()->type == 'user')
            <b>CIP </b>User</span>
          @endif
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a class="sidebar-toggle fa-icon" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-top-menu">
            <ul class="nav navbar-nav">
              <!-- Navbar Search -->
            <!--  <li>
                <a data-toggle="collapse" data-target="#top-menu-navbar-search" aria-expanded="false">
                <i class="fa fa-search"></i>
                </a>
              </li>-->
              <!-- /. Navbar Search -->
              <!--Fullscreen-->
              <li>          
                <a id="fullscreen-page" role="button"><i class="fa fa-arrows-alt"></i></a>
              </li>
              <!-- /. FulllScreen -->   

              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" data-toggle="dropdown" aria-expanded="false">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{Auth::user()->name}} {{Auth::user()->lName}}<i class="fa fa-angle-down pull-right"></i></span>
                  <!-- The user image in the navbar-->
                  <img src="{{Auth::user()->uAvatar}}" class="user-image" alt="User Image">
                </a>
                <ul class="dropdown-menu user-menu animated flipInY">
                  <li><a href="/{{Auth::user()->type}}/my-profile"><i class="ti-user"></i> Perfil</a></li>
                  <li class="divider"></li>
                  <li>
                    <form method="POST" action="{{route('logout')}}">
                    {{ csrf_field() }}
                      <button type="btn" class="btn btn-block btn-xs btn-success"><i class="ti-power-off"></i> Salir</button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- Form Navbar Search -->
            <div class="collapse top-menu-navbar-search" id="top-menu-navbar-search">
              <form>
                <div class="form-group">
                  <div class="input-search">
                    <div class="input-group">
                      <input type="text" id="navbar-search" name="search" class="form-control" placeholder="Search">
                      <span class="input-group-addon">
                      <a data-target="#top-menu-navbar-search" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="fa fa-times"></i></a>
                      </span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /. Form Navar Search -->
          </div>
        </nav>
      </header>