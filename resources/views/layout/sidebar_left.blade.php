    <aside class="sidebar-left"> 
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{Auth::user()->uAvatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
              <p>{{Auth::user()->name}}</p>
               <p>{{Auth::user()->lName}}</p>
                @if(Auth::user()->type == 'admin')
                  <p><small>Admin</small></p>
                @elseif(Auth::user()->type == 'maid')
                  <p><small>Maid</small></p>
                @elseif(Auth::user()->type == 'user')
                  <p><small>User</small></p>
                @endif
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          @if(Auth::user()->type == 'admin')
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ request()->is('admin') ? 'active' : '' }}">
              <a href="/admin"><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
         <!--  <li class="treeview">
              <a href="{{URL::to('admin/mailbox')}}"><i class="fa fa-envelope"></i> <span>Mailbox</span></a>
            </li>-->
            <li class="treeview {{ request()->is('admin/users/*') ? 'active' : '' }}">
              <a href="#"><i class="fa fa-id-card"></i> <span>Usuarios</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ request()->is('admin/users/list') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/users/list')}}">Ver lista</a></li>
                <li class="{{ request()->is('admin/users/cards') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/users/cards')}}">Ver fichas</a></li>
              </ul>
            </li>
            <li class="treeview {{ request()->is('admin/passengers/*') ? 'active' : '' }}">
              <a href="#"><i class="fa fa-user"></i> <span>Huéspedes</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ request()->is('admin/passengers/list') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/passengers/list')}}">Ver lista</a></li>
                <li class="{{ request()->is('admin/passengers/cards') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/passengers/cards')}}">Ver ficha</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bed"></i><span>Habitaciones</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('admin/rooms-list')}}">Ver lista</a></li>
                <li><a href="{{URL::to('admin/rooms-cards')}}">Ver ficha</a></li>
              </ul>
            </li>
            <li class="treeview {{ request()->is('admin/reservations-list') ? 'active' : '' }}">
              <a href="{{URL::to('admin/reservations-list')}}"><i class="fa fa-book"></i><span>Reservas</span>
              </a>
            </li>
            <li class="treeview {{ request()->is('admin/payments/*') ? 'active' : '' }}">
              <a href="#"><i class="fa fa-usd"></i> <span>Pagos</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ request()->is('admin/invoices-list') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/invoices-list')}}">Registros de pagos</a>
                </li>
                <li class="{{ request()->is('admin/payments/b_invoice') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/payments/b_invoice')}}">Ejemplo comprobante</a>
                </li>
              </ul>
            </li>
            <li class="treeview {{ request()->is('maid/supplies') ? 'active' : '' }}">
              <a href="{{URL::to('maid/supplies')}}"><i class="fa fa-history"></i> <span>Insumos</span></a>
            </li>
            <li class="treeview {{ request()->is('maid/maintenance') ? 'active' : '' }}">
              <a href="{{URL::to('maid/maintenance')}}"><i class="fa fa-wrench"></i> <span>Mantenimiento</span></a>
            </li>
         <!--    <li class="treeview">
              <a href="#"><i class="fa fa-area-chart"></i> <span>Reportes</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="income-reports.html">Reporte de ingresos</a>
                </li>
                <li><a href="sales-reports.html">Reporte de gastos</a>
                </li>
              </ul>
            </li> -->
          </ul>
          @elseif(Auth::user()->type == 'maid')
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ request()->is('maid') ? 'active' : '' }}">
              <a href={{URL::to('maid')}}><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="treeview {{ request()->is('maid/supplies') ? 'active' : '' }}">
              <a href="{{URL::to('maid/supplies')}}"><i class="fa fa-history"></i> <span>Insumos</span></a>
            </li>
            <li class="treeview {{ request()->is('maid/maintenance') ? 'active' : '' }}">
              <a href="{{URL::to('maid/maintenance')}}"><i class="fa fa-wrench"></i> <span>Mantenimiento</span></a>
            </li>
            <li class="treeview {{ request()->is('maid/reservations-list') ? 'active' : '' }}">
              <a href="{{URL::to('maid/reservations-list')}}"><i class="fa fa-book"></i><span>Reservas</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bed"></i><span>Habitaciones</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('maid/rooms-list')}}">Ver lista</a></li>
                <li><a href="{{URL::to('maid/rooms-cards')}}">Ver ficha</a></li>
              </ul>
            </li>
          </ul>
          @elseif(Auth::user()->type == 'user')
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ request()->is('user') ? 'active' : '' }}">
              <a href="{{URL::to('user')}}"><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="treeview {{ request()->is('user/my-reservations/*') ? 'active' : '' }}">
              <a href="{{URL::to('user/my-reservations/list')}}"><i class="fa fa-history"></i> <span>Mis reservas</span></a>
            </li>
            <li class="treeview {{ request()->is('user/my-passengers/*') ? 'active' : '' }}">
              <a href="{{URL::to('user/my-passengers')}}"><i class="fa fa-handshake-o"></i> <span>Huéspedes</span></a>
            </li>
            <li class="treeview">
              <a href="{{URL::to('my-profile')}}"><i class="fa fa-id-badge"></i> <span>Mi perfil</span></a>
            </li>
          </ul>
          @endif
          <!-- /. sidebar-menu -->
        </section>
    </aside>