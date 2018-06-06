    <aside class="sidebar-left"> 
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('img/dimebag.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
              <p>Leo</p>
               <p>Caloguerea</p>
              <p><small>Developer</small>
              </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview active"><a href="/admin"><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="treeview"><a href="{{URL::to('admin/mailbox')}}"><i class="fa fa-envelope"></i> <span>Mailbox</span></a>
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
                <li><a href="clients.html">Ver lista</a></li>
                <li><a href="client-profile.html">Ver ficha</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-bed"></i><span>Habitaciones</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="cars.html">Ver lista</a></li>
                <li><a href="add-car.html">Ver ficha</a></li>
                <li><a href="car-detail.html">Administrar</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendario</span></a>
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
                <li><a href="invoice.html">Boleta</a>
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
          <!-- /. sidebar-menu -->
        </section>
    </aside>