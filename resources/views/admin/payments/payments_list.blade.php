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
                        Repositorio de comprobantes
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/{{Auth::user()->type}}"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Comprobantes</li>
                        <li class="active">Lista</li>
                    </ol>
                </section>
                <section class="content">
                    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table id="payments" class="table responsive datatable">
                                        <thead>
                                            <tr>
                                                <th># Link</th>
                                                <th>Tipo</th>
                                                <th>Total</th>
                                                <th>Habitación</th>
                                                <th>Creada</th>
                                                <th>Modificada</th>
                                                <th>Reserva</th>
                                                <th>Usuario</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $item)
                                            <tr>
                                                <td><a href="/admin/payments/invoice-detail/{{$item->id}}">{{str_replace('.pdf', '', substr($item->pdf, 9))}}</a></td>
                                                <td>{{trans('attributes.'.$item->type)}}</td>
                                                <td>{{$item->total}}</td>
                                                <td>{{trans('attributes.'.$item->r_type)}}</td>
                                                <td>{{$item->created_at->format('d-m-Y h:m:s')}}</td>
                                                <td>{{$item->updated_at->format('d-m-Y h:m:s')}}</td>
                                                <td><a href="/admin/reservations/reservation-detail/{{$item->rsrv_id}}">{{$item->rsrv_id}}</a></td>
                                                <td>{{$item->rsrv_id}}</td>
                                                @if($item->status == "payed")
                                                <td><span class="label label-success">{{trans('attributes.'.$item->status)}}</span></td>
                                                @elseif($item->status == "pending")
                                                <td><span class="label label-danger">{{trans('attributes.'.$item->status)}}</span></td>
                                                @elseif($item->status == "other")
                                                <td></td>
                                                @endif
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