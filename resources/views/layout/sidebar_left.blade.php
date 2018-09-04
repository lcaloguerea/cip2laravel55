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
                @else
                  <p><small>Usuario</small></p>
                @endif
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          @if(Auth::user()->type == 'admin')
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="/admin"><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="treeview">
              <a href="{{URL::to('admin/mailbox')}}"><i class="fa fa-envelope"></i> <span>Mailbox</span></a>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-id-card"></i> <span>Usuarios</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('admin/users-list')}}">Ver lista</a></li>
                <li><a href="{{URL::to('admin/users-cards')}}">Ver fichas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> <span>Huéspedes</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('admin/passengers-list')}}">Ver lista</a></li>
                <li><a href="{{URL::to('admin/passengers-cards')}}">Ver ficha</a></li>
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
                <li><a href="car-detail.html">Administrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{URL::to('admin/reservations-list')}}"><i class="fa fa-book"></i><span>Reservas</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{URL::to('admin/calendar')}}"><i class="fa fa-calendar"></i> <span>Calendario</span></a>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-usd"></i> <span>Pagos</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="payments.html">Registros de pagos</a>
                </li>
                <li><a href="add-payment.html">Agregar modo de pago</a>
                </li>
                <li><a href="{{URL::to('admin/payments/b_invoice')}}">Boleta</a>
                </li>
                <li><a href="invoice2.html">Factura</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
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
            </li>
          </ul>
          @elseif(Auth::user()->type == 'user')
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href={{URL::to('user/index')}}><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="treeview">
              <a href="{{URL::to('user/index')}}"><i class="fa fa-history"></i> <span>Mis reservas</span></a>
            </li>
            <li class="treeview">
              <a href="{{URL::to('admin/mailbox')}}"><i class="fa fa-handshake-o"></i> <span>Mis huéspedes</span></a>
            </li>
          </ul>
          @endif
          <!-- /. sidebar-menu -->
        </section>
    </aside>