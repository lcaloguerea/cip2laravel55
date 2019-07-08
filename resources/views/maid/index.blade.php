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
  <body class="skin-yellow sidebar-mini">
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
            <div class="col-md-4">
              <div class="info-box">
                <div class="info-box-content">
                  <i class="fa fa-wrench text-blue"></i>
                  <div class="text-center value">Mantenimiento</div>
                  <br>
                  <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                                <td>Estado</td>
                                @if($cont2 > 0)
                                <td><span class="badge bg-red">Expirado(s)</span></td>
                                @else
                                <td><span class="badge bg-green">OK</span></td>
                                @endif
                            </tr>
                        </table>
                  </div>
                  <br>
                <div class="text-center action-profile">
                    <a href="#" class="btn btn-block btn-success">Ver detalles</a>
                </div>
                  </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="info-box">
                <div class="info-box-content">
                  <i class="fa fa-shopping-cart text-black"></i>
                  <div class="text-center value">Insumos</div>
                  <br>
                  <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <td>Estado</td>
                                @if($cont > 0)
                                <td><span class="badge bg-red">Falta stock</span></td>
                                @else
                                <td><span class="badge bg-green">OK</span></td>
                                @endif
                            </tr>
                        </table>
                  </div>
                  <br>
                <div class="text-center action-profile">
                    <a href="{{URL::to('maid/supplies')}}" class="btn btn-block btn-success">Ver detalles</a>
                </div>
                </div>
              </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-4">
              <div class="info-box">
                <div class="info-box-content">
                  <i class="fa fa-shopping-cart text-black"></i>
                  <div class="text-center value">Pan</div>
                  <br>
                  <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <td>Estado</td>
                                @if($bread->stock == "yes")
                                <td><span class="badge bg-green">OK</span></td>
                                @else
                                <td><span class="badge bg-red">X</span></td>
                                @endif
                            </tr>
                        </table>
                  </div>
                  <br>
                <div class="text-center action-profile">
                    <a href="{{URL::to('maid/supplies')}}" class="btn btn-block btn-success">Ver detalles</a>
                </div>
                </div>
              </div>
            </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Huéspedes por habitación</h3>
                                </div>
                                <div class="box-body">
                                    <table id="payments" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                                <th>Huésped(es)</th>
                                                <th>Limpieza</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rooms as $item)
                                            <tr>
                                                <td><a href="/{{Auth::user()->type}}/room-detail/{{$item->id_room}}">{{$item->id_room}}</a></td>
                                                @if($item->type == 'shared')
                                                  <td>Single compartida</td>
                                                  @else
                                                  <td>{{trans('attributes.'.$item->type)}}</td>
                                                @endif
                                                @if($item->status == 'free')
                                                  <td>Libre</td>
                                                  @else
                                                  <td>Ocupada</td>
                                                @endif
                                                @if($item->status == 'occupied')
                                                    <td>
                                                    @foreach($pGroups as $pg)
                                                        @if($pg->reservation_id == $item->active_reservation_id)
                                                            <li>{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</li>
                                                        @endif
                                                    @endforeach
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                                @if($item->sanitization == 'done')
                                                <td><span class="badge bg-green">Al día</span></td>
                                                @else
                                                <td><span class="badge bg-orange">Pendiente</span></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
    <script src="{{asset('js/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/app2.js')}}"></script>
    <!-- Slimscroll is required when using the fixed layout. -->
  </body>
</html>