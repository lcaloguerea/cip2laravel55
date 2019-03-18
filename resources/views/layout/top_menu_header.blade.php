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
              <li>
                <a data-toggle="collapse" data-target="#top-menu-navbar-search" aria-expanded="false">
                <i class="fa fa-search"></i>
                </a>
              </li>
              <!-- /. Navbar Search -->
              <!--Fullscreen-->
              <li>          
                <a id="fullscreen-page" role="button"><i class="fa fa-arrows-alt"></i></a>
              </li>
              <!-- /. FulllScreen -->   
              <!-- Messages-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label bg-black">1</span>
                </a>
                <ul class="dropdown-menu animated flipInX">
                  <li class="header">1 message pending</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li>
                        <!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="{{asset('img/dimebag.jpg')}}" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Steven Johnsson
                            <small><i class="fa fa-clock-o"></i> 10 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Can you check the CPU?</p>
                        </a>
                      </li>
                      <!-- /. message -->
                    </ul>
                    <!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- /.messages-menu -->
              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label bg-black">4</span>
                </a>
                <ul class="dropdown-menu animated flipInY">
                  <li class="header">4 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li>
                        <!-- start notification -->
                        <a href="#">
                        <i class="fa fa-users text-green"></i> Your profile has been updated
                        </a>
                      </li>
                      <!-- /. notification -->
                      <li>
                        <a href="#">
                        <i class="fa fa-user text-green"></i> Settings updated
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Problem with the CPU
                        </a>
                      </li>
                      <li>
                        <a href="#">
                        <i class="fa fa-users text-red"></i> The meeting has been canceled
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
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