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
                        Lista de habitaciones
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/{{Auth::user()->type}}"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Habitaciones</li>
                        <li class="active">Lista</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <button class="btn btn-default pull-right" onclick="window.print();" style="margin-right: 5px;"><i class="fa fa-print"></i> Imprimir</button>
                                </div>
                                <div class="box-body">
                                    <table id="payments" class="table responsive datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo</th>
                                                <th>Precio</th>
                                                <th>Estado</th>
                                                <th>Reserva activa</th>
                                                <th>Huésped(es)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rooms as $item)
                                            <tr>
                                                <td><a href="/{{Auth::user()->type}}/room-detail/{{$item->id_room}}">{{$item->id_room}}</a></td>
                                                  <td>{{trans('attributes.'.$item->type)}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>
                                                    @if($item->status == "free")
                                                    <p><span class="badge bg-green">{{trans('attributes.'.$item->status)}}</span></p>
                                                    @elseif($item->status == "occupied")
                                                        <p><span class="badge bg-blue">{{trans('attributes.'.$item->status)}}</span></p>
                                                    @else
                                                        <p><span class="badge bg-red">{{trans('attributes.'.$item->status)}}</span></p>
                                                    @endif
                                                </td>
                                                <td>{{$item->active_reservation_id}}</td>
                                                @if($item->status == 'occupied')
                                                    <td>
                                                    @foreach($pGroups as $pg)
                                                        @if($pg->reservation_id == $item->active_reservation_id)
                                                            @if(Auth::user()->type != "maid")
                                                            <li><a href="/admin/passengers/passenger-profile/{{$pg->passengersR[0]->id_passenger}}">{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</a></li>
                                                            @else
                                                            <li>{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</li>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    </td>
                                                @else
                                                    <td></td>
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
                $("#payments").DataTable({
                    "oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
                    "lengthChange": false,
                });
            });
        </script>
    </body>
</html>