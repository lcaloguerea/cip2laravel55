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
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">
        <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('node_modules/filepond/dist/filepond.css')}}">
        <link rel="stylesheet" href="{{asset('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css')}}">
        <link rel="stylesheet" href="{{asset('node_modules/dropify/dist/css/dropify.min.css')}}">


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

									<div class="box-body">
                                    <img class="img-responsive pad" src="{{asset('img/single.png')}}" alt="Photo">
                            		</div>

                            </div>
                            <!-- /.widget-user -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Información</h3>
                                    <a href="#" class=" btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-plus"></i></a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <strong>Tipo</strong><p>{{$room->type}}</p>
                                    <strong>Estado</strong><p>{{$room->status}}</p>
                                </div>
                                <div class="box-footer">
                                    <strong>Limpieza</strong>
                                    <address>
                                        @if($room->sanitization == "done")
                                            <span class="badge bg-green">Al día</span>
                                        @else
                                        <button id="sanitization" type="button" class="btn btn-danger btn-block">
                                            Pendiente
                                        </button>
                                        @endif
                                    </address>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Actividad</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Historial</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <ul class="timeline">
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                                <span class="">
                                                    12 Jan. 2019
                                                </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-arrow-left bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                                    <h3 class="timeline-header">check in validado por<a style="color: blue" href="#"> Staff</a></h3>
                                                    <h3 class="timeline-header"><a href="#">Berry Cosmo</a> ha comenzado su estadía.</h3>
                                                </div>
                                            </li>

                                                                                        <li class="time-label">
                                                <span class="">
                                                    14 Jan. 2019
                                                </span>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-arrow-right bg-red"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 13:00</span>
                                                    <h3 class="timeline-header">check outvalidado por<a style="color: blue" href="#"> Staff</a></h3></h3>
                                                    <h3 class="timeline-header"><a href="#">Berry Cosmo</a> ha terminado su estadía.</h3>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-paint-brush bg-blue"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 17:00</span>
                                                    <h3 class="timeline-header">Limpieza realizada por <a style="color: blue" href="#"> Staff</a></h3></h3>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            
                                            <!-- /. timeline item -->
                                            <!-- timeline time label -->
                                        </ul>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <div class="box box-form no-shadow">
                                            <!-- /.box-header -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table id="payments" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Usuario</th>
                                                <th>Huésped(es)</th>
                                                <th>Estado</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Rsrvs as $item)
                                            <tr class="disabled">
                                                <td><a href="#">{{$item->id_res}}</a></td>
                                                <td><a href="user-profile/{{$item->userR->id}}">{{$item->userR->name}} {{$item->userR->lName}}</a></td>
                                                <td>
                                                @foreach($pGroups as $pg)
                                                    @if($pg->reservation_id == $item->id_res)
                                                        <li><a href="passenger-profile/{{$pg->passengersR[0]->id_passenger}}">{{$pg->passengersR[0]->name_1}} {{$pg->passengersR[0]->lName_1}}</a></li>
                                                    @endif
                                                @endforeach
                                                </td>
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
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
        <script src="{{asset('node_modules/filepond/dist/filepond.min.js')}}"></script>
        <script src="{{asset('node_modules/jquery-filepond/filepond.jquery.js')}}"></script>
        <script src="{{asset('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js')}}"></script>
        <script src="{{asset('node_modules/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js')}}"></script>
        <script src="{{asset('node_modules/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js')}}"></script>
        <script src="{{asset('node_modules/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js')}}"></script>
        <script src="{{asset('node_modules/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.min.js')}}"></script>
        <script src="{{asset('node_modules/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js')}}"></script>
        <script src="{{asset('node_modules/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.min.js')}}"></script>
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <script src="{{asset('pickadate/picker.js')}}"></script>
        <script src="{{asset('pickadate/picker-date.js')}}"></script>
        <script src="{{asset('js/pages/jquery-pickadate.js')}}"></script>
        <script src="{{asset('material-buttons/ripple-effects.js')}}"></script>

        <script src="{{asset('node_modules/dropify/dist/js/dropify.min.js')}}"></script>


        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<style type="text/css">
    
</style>

<script type="text/javascript">
    
    $(function(){
     


    $('.dropify').dropify();


        $('#sanitization').on('click',function(e){

        e.preventDefault();

        var id = {{$room->id_room}};

        swal({
            title:"Esta seguro(a)?",
            text: "Esta apunto de validar la limpieza de esta habitación, esto se registrará vinculandolo(a) a esta acción",
            type: "warning",
            html: true,
            showCancelButton: true,
            CancelButtonText: "cancelar",
        }, function () {

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{id:id, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/admin/room-sanitization' , //this is different because it can change user type
                success:function(data){
                        swal({
                            title:"Actualizado!!",
                            text: "<strong>"+data.message+"</strong>",
                            type: "success",
                            html: true,
                        },function () {
                            window.location.reload(true);
                        });
                }
            }); 
        });
    });

});

</script>