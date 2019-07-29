@include('layout.header')

        <link rel="stylesheet" href="{{asset('pickadate/themes/default.css')}}">
        <link rel="stylesheet" href="{{asset('pickadate/themes/default-date.css')}}">
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('select2/select2.min.css')}}">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">


        <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/dropify.css')}}">




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
        <div class="page-loader-wrapper">
            <div class="spinner"></div>
        </div>
        <div class="wrapper">
            <!-- Main Header -->
            @include('layout.top_menu_header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('layout.sidebar_left')
            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                <div class="tab-content">
                                        <div class="box box-form no-shadow">
                                            <div class="box-header">
                                                <h3 class="box-title">Subir documento</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                    <form enctype="multipart/form-data" action="/admin/payments/invoice-upload" method="POST">
                                                <div class="col-md-12">
                                                        <label>Reemplazar comprobante</label>
                                                        <input id="invoice" name="invoice" class="dropify" type="file" required accept="application/pdf">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <br>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <div class="form-group">
                                                                <label>Tipo de documento</label>
                                                                <select id="type" name="type" class="form-control select2">
                                                                    <option selected="selected" value="Boleta">Boleta externa</option>
                                                                    <option value="Factura">Factura</option>
                                                                    <option value="CR">CR</option>
                                                                    <option value="other">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <div class="form-group">
                                                                <label>Asociado a reserva</label>
                                                                <select id="rsrv" name="rsrv" class="form-control select2" required>
                                                                    <option></option>
                                                                    @foreach($rsrvs as $r)
                                                                    <option value="{{$r->id_res}}">{{$r->id_res}}: {{$r->userR->name}} {{$r->userR->lName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <div class='form-group'>
                                                                <button type="submit" class="btn btn-primary">Subir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </form>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                </div>
                                <!-- /.tab-content -->
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
        <script src="{{asset('select2/select2.min.js')}}"></script>


        <script src="{{asset('js/user-profile.js')}}"></script>


        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<style type="text/css">
    
</style>

<script type="text/javascript">
    
    $(function(){
     


    $('.dropify').dropify();

    $('.select2').select2({
                minimumResultsForSearch: 5,
                placeholder: "Buscar reserva",
                allowClear: false,
            });

});

</script>