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

        <link rel="stylesheet" href="{{asset('node_modules/filepond/dist/filepond.css')}}">
        <link rel="stylesheet" href="{{asset('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css')}}">
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

                                @if($user->confirmed == 'yes')
                                <div class="widget-user-header bg-blue">
                                @else
                                <div class="widget-user-header bg-orange">
                                @endif

                                    <h3 class="widget-user-username">{{$user->name}} {{$user->lName}}</h3>
                                    @if($user->type == 'admin')
                                        <h5 class="widget-user-desc">Administrador</h5>
                                    @elseif($user->type == 'user')
                                        <h5 class="widget-user-desc">Usuario</h5>
                                    @elseif($user->type == 'maid')
                                        <h5 class="widget-user-desc">Maid</h5>
                                    @endif

                                    
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle" src="{{$user->uAvatar}}" alt="User Avatar">
                                </div>
                                <div class="box-footer">
                                    <div class="socials-networks" style="padding-top: 16px;">
                                        
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
                                    <strong>Nombre</strong><p>{{$user->name}} {{$user->lName}}</p>
                                    <strong>Rut</strong>
                                    <p>{{$user->rut}}</p>
                                    <strong>Departamento</strong>
                                    <p>{{$user->department}}</p>                                    
                                    <strong>Confirmación</strong>
                                    @if($user->confirmed == 'yes')
                                        <p>
                                            <span class="label bg-green">Verificado</span>
                                        </p>
                                    @else
                                        <p>
                                            <span class="label bg-yellow">Pendiente</span>
                                        </p>
                                    @endif
                                    <strong>Teléfono</strong>
                                    <p>{{$user->phone}}</p>
                                </div>
                                <div class="box-footer">
                                    <strong>Email</strong>
                                    <address>{{$user->email}}</address>
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
                                                <i class="fa fa-clock-o bg-orange"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                                    <h3 class="timeline-header">Ingreso de reserva</h3>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-clock-o bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 13:00</span>
                                                    <h3 class="timeline-header">Validación de reserva</h3>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-clock-o bg-blue"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 17:00</span>
                                                    <h3 class="timeline-header">Pago realizado</h3>
                                                </div>
                                            </li>
                                            <!-- /. timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-bookmark bg-teal"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                                                    <h3 class="timeline-header"><a href="#">Berry Cosmo</a> ha realizado un testimonio sobre su estadia.</h3>
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
                                                    <form enctype="multipart/form-data" action="/admin/avatar" method="POST">
                                                        <label>Imagen de perfil</label>
                                                        <input id="updAvatar" name="updAvatar" class="dropify" type="file" required >
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <input type="submit" value="Actualizar imagen de perfil" class="btn btn-sm btn-primary">
                                                    </form>
                                                    <br>
                                                    <div class='row'>
                                                        <div class='col-md-6'>
                                                            <div class='form-group'>
                                                                <label>Nombre</label>
                                                                <input class="form-control" id="name" name="name" type="text" value="{{$user->name}}" />
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6'>
                                                            <div class='form-group'>
                                                                <label>Apellido</label>
                                                                <input class="form-control" id="lName" name="lName" type="text" value="{{$user->lName}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-4'>
                                                            <div class='form-group'>
                                                                <label>Rut</label>
                                                                <input class="form-control" id="rut" name="rut" type="text" value="{{$user->rut}}" />
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <select id="confirmed" class="form-control">
                                                                @if($user->confirmed == "yes")
                                                                    <option value="yes">Verificado</option>
                                                                @else
                                                                    <option value="no">Pendiente</option>
                                                                    <option value="yes">Verificado</option>
                                                                @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4'>
                                                            <div class='form-group'>
                                                                <label>Teléfono</label>
                                                                <input class="form-control" id="phone" name="phone" type="text" value="{{$user->phone}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-6'>
                                                            <div class='form-group'>
                                                                <label>Email</label>
                                                                <input class="form-control" id="email" name="email" type="text" value="{{$user->email}}"/>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6'>
                                                            <div class='form-group'>
                                                                <label>Departamento</label>
                                                                <input class="form-control" id="department" name="department" type="text" value="{{$user->department}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <div class='form-group'>
                                                                <button id="btn_update" type="button" class="btn btn-primary">Actualizar</button>
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
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <script src="{{asset('pickadate/picker.js')}}"></script>
        <script src="{{asset('pickadate/picker-date.js')}}"></script>
        <script src="{{asset('js/pages/jquery-pickadate.js')}}"></script>
        <script src="{{asset('material-buttons/ripple-effects.js')}}"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

        <script src="{{asset('js/user-profile.js')}}"></script>


        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<style type="text/css">
    
</style>

<script type="text/javascript">

    $(document).ready(function(){
    
    $(function(){
     


    $('.dropify').dropify();


});

    $('#btn_update').on('click',function(e){

        e.preventDefault();

        var name = $('#name').val();
        var lName = $('#lName').val();
        var rut = $('#rut').val();
        var confirmed = $('#confirmed').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var department = $('#department').val();

        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
           data:{name:name, lName:lName, rut:rut, confirmed:confirmed, phone:phone, email:email, department:department, "_token": "{{ csrf_token() }}"},
            //Cambiar a type: POST si necesario
            type: 'PUT',
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: '/profile/update' ,
            success:function(data){
                    if(data.errors != ""){
                        html = '<p>Por favor corregir los siguientes errores</p><br><div class="alert alert-danger fade in">';
                        jQuery.each(data.errors, function(key, value){
                            html += '<li>' + value + '</li>';
                        });
                        swal({
                            title:"Ups!!",
                            text: html,
                            type: "warning",
                            html: true
                        });
                    }
                if(data.message != ""){
                    swal({
                        title:"Actualizado!!",
                        text: "<strong>"+data.message+"</strong>",
                        type: "success",
                        html: true,
                    },function () {
                        window.location.href = "my-profile";
                    });
                }
            }
        }); 
    });
});
</script>