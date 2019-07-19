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
                        Lista de huéspedes
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Huéspedes</li>
                        <li class="active">Lista</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                	<div class="alert alert-info fade in">Nota: Para modificar haga click en el numero id del huésped.</div>
                                </div>
                                <div class="box-body">
                                    <table id="passengers" class="table table-bordered table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Nacionalidad</th>
                                                <th>Email</th>
                                                <th>Origen</th>
                                                <th>Residencia</th>
                                                <th>Universidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($passengers as $item)
                                            <tr>
                                                <td><a href="my-passengers/passenger-profile/{{$item->id_passenger}}">{{$item->id_passenger}}</a></td>
                                                <td>{{$item->name_1}}</td>
                                                <td>{{$item->lName_1}}</td>
                                                <td>{{$item->nationality}}</td>
                                                <td>{{$item->email}}</td>
                                                <td title="{{$item->countryo->name}}">{{CountryFlag::get($item->countryo->iso)}}</td>
                                                <td title="{{$item->countryr->name}}">{{CountryFlag::get($item->countryr->iso)}}</td>
                                                <td>{{$item->university}}</td>
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

            $.fn.DataTable.ext.pager.numbers_length = 3;
                
            $('.datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "scrollX": true
            });
            });
        </script>
    </body>
</html>