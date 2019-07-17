@include('layout.header')
    <link rel="stylesheet" href="{{asset('morris/morris.css')}}">
    <!-- Icons -->
    <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
    <!--animate css-->
    <link rel="stylesheet" href="{{asset('animate.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
  <body class="skin-yellow sidebar-mini fixed">
    <div class="page-loader-wrapper" >
      <div class="spinner"></div>
    </div>
    <div class="wrapper">
      <!-- Main Header -->

        @include('layout.top_menu_header')

      <!-- Left side column. contains the logo and sidebar -->

        @include('layout.sidebar_left')

      <!-- Content Wrapper -->
      <div class="content-wrapper">
        <section class="content-title">
          <h1>
            Bienvenido al portal administrativo
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Inicio </a></li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <div class="info-box-content">
                  <i class="fa fa-user-plus text-yellow"></i>
                  <div class="text-center value">{{$users}}</div>
                  <div class="text-muted text-uppercase text-center">Usuarios</div>
                </div>
              </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <div class="info-box-content">
                  <i class="fa fa-suitcase text-black"></i>
                  <div class="text-center value">{{$passengers}}</div>
                  <div class="text-muted text-uppercase text-center">Huéspedes</div>
                </div>
              </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <div class="info-box-content">
                  <i class="fa fa-check text-purple"></i>
                  <div class="text-center value">{{$pActive}}</div>
                  <div class="text-muted text-uppercase text-center">Huéspedes activos</div>
                </div>
              </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <div class="info-box-content">
                  <i class="fa fa-usd text-green"></i>
                  <div class="text-center value">${{number_format($income)}}</div>
                  <div class="text-muted text-uppercase text-center">Ingresos/Mes</div>
                </div>
              </div>
            </div>
            <!--/.col-->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Encuesta de satisfacción</h3>
              <div class="box-tools pull-right">
                <a href="#" class=" btn-box-tool">Ir a testimonios</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="area_chart" class="graph"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="row">
            <div class="col-sm-12 col-lg-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Ingresos Single
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="stats-report">
                    <div class="stat-item">
                      <h6>General</h6>
                      <b>45.00%</b>
                    </div>
                    <div class="stat-item">
                      <h6>Mes actual</h6>
                      <b>30.40%</b>
                    </div>
                  </div>
                  <div id="sparkline1" class="sparkline">
                    <canvas style="display: inline-block; width: 482px; height: 150px; vertical-align: top;" width="482" height="150"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!--/.col-->
            <div class="col-sm-12 col-lg-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Ingresos Matrimonial
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="stats-report">
                    <div class="stat-item">
                      <h6>General</h6>
                      <b>27.00%</b>
                    </div>
                    <div class="stat-item">
                      <h6>Este mes</h6>
                      <b>14.20%</b>
                    </div>
                  </div>
                  <div id="sparkline2" class="sparkline">
                    <canvas style="display: inline-block; width: 482px; height: 150px; vertical-align: top;" width="482" height="150"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!--/.col-->
            <div class="col-sm-12 col-lg-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Ingresos Single compartida
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="stats-report">
                    <div class="stat-item">
                      <h6>General</h6>
                      <b>50.10%</b>
                    </div>
                    <div class="stat-item">
                      <h6>Mes actual</h6>
                      <b>45.00%</b>
                    </div>
                  </div>
                  <div id="sparkline3" class="sparkline">
                    <canvas style="display: inline-block; width: 482px; height: 150px; vertical-align: top;" width="482" height="150"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!--/.col-->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Últimos usuarios registrados</h3>
              <div class="box-tools pull-right">
                <a href="#" class=" btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></a>
                <a href="#" class=" btn-box-tool">View all</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="payments" class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Usuario</th>
                      <th>Departamento</th>
                      <th>Fecha de registro</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lUsers as $l)
                    <tr>
                      <td><a href="/{{Auth::user()->type}}/users/user-profile/{{$l->id}}">{{$l->id}}</a></td>
                      <td>{{$l->name}} {{$l->lName}}</td>
                      <td>{{$l->department}}</td>
                      <td>{{$l->created_at->format('d/m/Y')}}</td>
                      @if($l->confirmed == 'yes')
                      <td><span class="label bg-green">Verificado</span></td>
                      @else
                      <td><span class="label bg-orange">Por confirmar</span></td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="row elements-overlay">
            <div class="col-md-4 col-xs-12 col-sm-6">
              <div class="box">
                <div class="element-overlay">
                  <img class="img-responsive" alt="user" src="{{asset('img/rooms/HAB_8(1).JPG')}}">
                  <div class="element-overlay-info">
                    <ul class="element-detail">
                      <li><a class="btn btn-outline" href="{{URL::to('admin/rooms-list')}}"><i class="fa fa-search"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="box-body body-car">
                  <h4 class="car-title text-center">Simple</h4>
                  <div class="car-information text-center">
                    <div class="row">
                      <div class="col-xs-6 col-md-6"><strong>Características:</strong></div>
                      <div class="col-xs-12 col-md-12">
                        <ul style="list-style-type: disc; padding-left: 2em; text-align: left;">
                          <li>Cama de 1 plaza.</li>
                          <li>Aire acondicionado.</li>
                          <li>TV Satelital.</li>
                          <li>WiFi.</li>
                          <li>Frigobar.</li>
                        </ul>
                      </div>
                      <div class="price-car text-center"><strong>$ 30.000 CLP /Day</strong></div>
                    </div>
                  </div>
                  <a href="{{URL::to('admin/rooms-cards')}}" class="btn btn-block">ver más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-6">
              <div class="box">
                <div class="element-overlay">
                  <img class="img-responsive" alt="user" src="{{asset('img/rooms/HAB_3(1).JPG')}}">
                  <div class="element-overlay-info">
                    <ul class="element-detail">
                      <li><a class="btn btn-outline" href="{{URL::to('admin/rooms-list')}}"><i class="fa fa-search"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="box-body body-car">
                  <h4 class="car-title text-center">Single compartida</h4>
                  <div class="car-information text-center">
                    <div class="row">
                      <div class="col-xs-6 col-md-6"><strong>Características:</strong></div>
                      <div class="col-xs-12 col-md-12">
                        <ul style="list-style-type: disc; padding-left: 2em; text-align: left;">
                          <li>Dos camas de 1 plaza.</li>
                          <li>Aire acondicionado.</li>
                          <li>TV Satelital.</li>
                          <li>WiFi.</li>
                          <li>Frigobar.</li>
                        </ul>
                      </div>
                      <div class="price-car text-center"><strong>$ 35.000 CLP /Day</strong></div>
                    </div>
                  </div>
                  <a href="{{URL::to('admin/rooms-cards')}}" class="btn btn-block">ver más</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-6">
              <div class="box">
                <div class="element-overlay">
                  <img class="img-responsive" alt="user" src="{{asset('img/rooms/HAB_1.JPG')}}">
                  <div class="element-overlay-info">
                    <ul class="element-detail">
                      <li><a class="btn btn-outline" href="{{URL::to('admin/rooms-list')}}"><i class="fa fa-search"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="box-body body-car">
                  <h4 class="car-title text-center">Matrimonial</h4>
                  <div class="car-information text-center">
                    <div class="row">
                      <div class="col-xs-6 col-md-6"><strong>Características:</strong></div>
                      <div class="col-xs-12 col-md-12">
                        <ul style="list-style-type: disc; padding-left: 2em; text-align: left;">
                          <li>Cama de matrimonial.</li>
                          <li>Aire acondicionado.</li>
                          <li>TV Satelital.</li>
                          <li>WiFi.</li>
                          <li>Frigobar.</li>
                        </ul>
                      </div>
                      <div class="price-car text-center"><strong>$ 40.000 CLP /Day</strong></div>
                    </div>
                  </div>
                  <a href="{{URL::to('admin/rooms-cards')}}" class="btn btn-block">ver más</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- /. main content -->
        <span class="return-up"><i class="fa fa-chevron-up"></i></span>
      </div>
      <!-- /. content-wrapper -->

      <!-- Main Footer -->
      @include('layout.footer')


    </div>
    <!-- /. wrapper content-->
    <!-- JS scripts -->



  <script src="{{asset('jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>

    <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('raphael/raphael.min.js')}}"></script>
    <script src="{{asset('morris/morris.min.js')}}"></script>
    <script src="{{asset('js/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
    <script src="{{asset('js/app2.js')}}"></script>
    <!-- Slimscroll is required when using the fixed layout. -->
  </body>
</html>