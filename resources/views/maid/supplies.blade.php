@include('layout.header')
        <link rel="stylesheet" href="{{asset('select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/datepicker/datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('js/daterangepicker/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('js/pickadate/themes/default.css')}}">
        <link rel="stylesheet" href="{{asset('js/pickadate/themes/default-date.css')}}">
        <link rel="stylesheet" href="{{asset('js/pickadate/themes/default-time.css')}}">
        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}">
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
                        Administración de suministros
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Suministros</li>
                    </ol>
                </section>


                <section class="content">

          <div class="row">
            <div class="col-sm-6 col-lg-6">
              <div class="info-box">
                <div class="info-box-content">
                  <div class="text-center value">Suministros generales</div>
                  <br>
                  <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <td>Lista completa</td>
                                <td><a href="#" class="btn btn-block btn-success">Abastecer</a></td>
                            </tr>
                            <tr>
                                <td>Solo sin stock</td>
                                <td><a href="#" class="btn btn-block btn-success">Abastecer</a></td>
                            </tr>
                        </table>
                  </div>
                </div>
              </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-6">
              <div class="info-box">
                <div class="info-box-content">
                  <div class="text-center value">Pan</div>
                  <br>
                  <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <td>Lista completa</td>
                                <td><a href="#" class="btn btn-block btn-success">Abastecer</a></td>
                            </tr>
                            <tr>
                                <td>Solo sin stock</td>
                                <td><a href="#" class="btn btn-block btn-success">Abastecer</a></td>
                            </tr>
                        </table>
                  </div>
                  </div>
              </div>
            </div>

            <!--/.col-->
          </div>

                                                <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Lista de suministros generales</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Artículo</th>
                                            <th style="width: 200px">Stock</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Ampolleta Led vela 5.5W, luz fria (baño)</td>
                                            <td>
                                                <select class="form-control">
                                                    <option class="badge bg-green" value="stock">Ok</option>
                                                    <option value="noStock">Sin stock</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Ampolleta BC 14W (pasillo)</td>
                                            <td>
                                                <select class="form-control">
                                                    <option class="badge bg-green" value="stock">Ok</option>
                                                    <option value="noStock">Sin stock</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Azúcar kilo</td>
                                            <td>
                                                <select class="form-control">
                                                    <option class="badge bg-green" value="stock">Ok</option>
                                                    <option value="noStock">Sin stock</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Azúcar sachet 100 unds</td>
                                            <td>
                                                <select class="form-control">
                                                    <option class="badge bg-green" value="stock">Ok</option>
                                                    <option value="noStock">Sin stock</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Bidones agua purificada 20 Litros</td>
                                            <td>
                                                <select class="form-control">
                                                    <option class="badge bg-green" value="stock">Ok</option>
                                                    <option value="noStock">Sin stock</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>Bolsa basura 80x120</td>
                                            <td>
                                                <select class="form-control">
                                                    <option class="badge bg-green" value="stock">Ok</option>
                                                    <option value="noStock">Sin stock</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                                    <div class="text-center action-profile">
                    <a href="#" class="btn btn-success">Confirmar</a>
                </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>

                    <!-- /.row -->
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
        <script src="{{asset('js/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('select2/select2.min.js')}}"></script>
        <script src="{{asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('js/pickadate/picker.js')}}"></script>
        <script src="{{asset('js/pickadate/picker-date.js')}}"></script>
        <script src="{{asset('js/pickadate/picker-time.js')}}"></script>
        <script src="{{asset('js/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>