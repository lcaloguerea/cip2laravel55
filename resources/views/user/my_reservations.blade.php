@include('layout.header')

        <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('responsive-tables/responsivetables.css')}}">
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
                        Lista de mis reservas
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Reservas</li>
                        <li class="active">Lista</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    @if($reservs)
                                    <table id="payments" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Usuario</th>
                                                <th>Huésped(es)</th>
                                                <th>Confirmación</th>
                                                <th>Estado</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Tipo de pago</th>
                                                <th>Habitación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reservs as $item)
                                            <tr>
                                                <td><a href="#">{{$item->id_res}}</a></td>
                                                <td><a href="/user/my-profile">{{$item->userR->name}} {{$item->userR->lName}}</a></td>
                                                <td>
                                                @foreach($pGroups as $pg)
                                                    @if($pg->reservation_id == $item->id_res)
                                                        <li><a href="/user/my-passengers/passenger-profile/{{$pg->passengersR[0]->id_passenger}}">{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</a></li>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td>{{trans('attributes.'.$item->confirmed)}}</td>
                                                <td>
                                                    @if($item->status == "started")
                                                        <span class="badge bg-green">Iniciada</span>
                                                    @elseif($item->status == "cancelled")
                                                        <span class="badge bg-red">Cancelada</span>
                                                    @elseif($item->status == "waiting")
                                                        <span class="badge bg-yellow">En espera</span>
                                                    @elseif($item->status == "finished")
                                                        <span class="badge bg-blue">Finalizada</span>
                                                    @endif
                                                </td>
                                                <td>{{date('d-m-Y', strtotime($item->check_in))}}</td>
                                                <td>{{date('d-m-Y', strtotime($item->check_out))}}</td>
                                                <td>{{$item->payment_m}}</td>
                                                <td>{{$item->room_id}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        <div class="alert alert-warning fade in">Usted no posee reservas registradas</div>
                                    @endif
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
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('responsive-tables/responsivetables.js')}}"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
        <script>
            $(function () {
                $("#payments").DataTable();
                $(".dataTables_filter input").addClass("dataTable_search");
            });
        </script>
    </body>
</html>