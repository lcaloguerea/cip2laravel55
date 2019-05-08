@include('layout.header')
        <link rel="stylesheet" href="{{asset('pickadate/themes/default.css')}}">
        <link rel="stylesheet" href="{{asset('pickadate/themes/default-date.css')}}">
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('node_modules/dropify/dist/css/dropify.min.css')}}">
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
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-blue">

                                    <h3 class="widget-user-username">{{$passenger->name_1}} {{$passenger->lName_1}} {{$passenger->lName_2}}</h3>
                                        <h5 class="widget-user-desc">Huésped</h5>
                                    
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle" src="{{$passenger->pAvatar}}" alt="User Avatar">
                                </div>
                                <div class="box-footer">
                                    <div class="socials-networks" style="padding-top: 16px;">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                            <div class="box collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Información</h3>
                                    <a href="#" class=" btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-plus"></i></a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <strong>Nombre</strong><p>{{$passenger->name_1}} {{$passenger->lName_1}} {{$passenger->lName_2}}</p>
                                    <strong>Nacionalidad</strong>
                                    <p><img style="height: 20px; width: 30px" src="/img/icons/flag-cl.icon"></p>
                                    <strong>Origen</strong>
                                    <p><img style="height: 20px; width: 30px" src="/img/icons/flag-cl.icon"></p>
                                    <strong>Residencia</strong>
                                    <p><img style="height: 20px; width: 30px" src="/img/icons/flag-cl.icon"></p>
                                    <strong>Universidad</strong>
                                    <p>{{$passenger->university}}</p>
                                </div>
                                <div class="box-footer">
                                    <strong>Email</strong>
                                    <address>{{$passenger->email}}</address>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Historial de reservas</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Actualizar</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <ul class="timeline">
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                                <span class="">
                                                    22 Jan. 2017
                                                </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-arrow-right bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                                    <h3 class="timeline-header">Check In</h3>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            <li class="time-label">
                                                <span class="">
                                                    24 Jan. 2017
                                                </span>
                                            </li>

                                            <li>
                                                <i class="fa fa-arrow-left bg-blue"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 13:00</span>
                                                    <h3 class="timeline-header">Check Out</h3>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->

                                            <li class="time-label">
                                                <span class="">
                                                    25 Jan. 2017
                                                </span>
                                            </li>

                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-bookmark bg-teal"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                                                    <h3 class="timeline-header"><a href="#">{{$passenger->name_1}} {{$passenger->lName_1}} {{$passenger->lName_2}}</a> ha realizado un testimonio sobre su estadia.</h3>
                                                    <div class="timeline-body">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#!" class="btn btn-warning btn-flat btn-xs">ir a la página de testimonios</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline time label -->
                                        </ul>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <div class="box box-form no-shadow">
                                            <div class="box-header">
                                                <h3 class="box-title">Información del usuario</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="col-md-12">
                                                    <form enctype="multipart/form-data" action="/user/passenger/avatar" method="POST">
                                                        <label>Imagen de perfil</label>
                                                        <input id="updAvatar" name="updAvatar" class="dropify" type="file" required >
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $passenger->id_passenger }}">
                                                        <input type="submit" value="Actualizar imagen de perfil" class="btn btn-sm btn-primary">
                                                    </form>
                                                    <div class='row'>
                                                        <div class='col-md-4'>
                                                            <div class='form-group'>
                                                                <label>Nombre</label>
                                                                <input class="form-control" id="first-name" name="first-name" type="text" value="{{$passenger->name_1}}" />
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <div class='form-group'>
                                                                <label>Apellido Paterno</label>
                                                                <input class="form-control" id="last-name" name="last-name" type="text" value="{{$passenger->lName_1}}"/>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <div class='form-group'>
                                                                <label>Apellido Materno</label>
                                                                <input class="form-control" id="last-name" name="last-name" type="text" value="{{$passenger->lName_2}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-4'>
                                                            <div class='form-group'>
                                                                <label>Nacionalidad</label>
                                                                <br>
                                                                <img style="height: 20px; width: 30px" src="/img/icons/flag-cl.icon">
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <div class="form-group">
                                                                <label>Origen:</label>
                                                                <br>
                                                                <img style="height: 20px; width: 30px" src="/img/icons/flag-cl.icon">
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <div class='form-group'>
                                                                <label>Residencia</label>
                                                                <br>
                                                                <img style="height: 20px; width: 30px" src="/img/icons/flag-cl.icon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-6'>
                                                            <div class='form-group'>
                                                                <label>Email</label>
                                                                <input class="form-control" id="email" name="email" type="text" value="{{$passenger->email}}"/>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6'>
                                                            <div class='form-group'>
                                                                <label>Universidad</label>
                                                                <input class="form-control" id="department" name="department" type="text" value="{{$passenger->university}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <div class='form-group'>
                                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
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
        <script src="{{asset('pickadate/picker.js')}}"></script>
        <script src="{{asset('pickadate/picker-date.js')}}"></script>
        <script src="{{asset('js/pages/jquery-pickadate.js')}}"></script>
        <script src="{{asset('node_modules/dropify/dist/js/dropify.min.js')}}"></script>
        <script src="{{asset('material-buttons/ripple-effects.js')}}"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>
<script type="text/javascript">
        $(function(){
     


    $('.dropify').dropify();

});
</script>