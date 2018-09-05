@include('layout.header')

        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 

        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">

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
                        Crea tu reserva
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/user/index"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Crear reserva</li>
                    </ol>
                </section>

                <section class="content">
                <div class="box box-form">
                        <div class="box-header">
                            <h3 class="box-title">Fechas y habitación</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Checkin</label>
                                            <input value="{{$check_in}}" class="form-control" id="name" name="first-name" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Checkout</label>
                                            <input value="{{$check_out}}" class="form-control" id="apellidoP" name="apellidoP" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Tipo habitación</label>
                                            <select id="rt" class="form-control">
                                                    <option value="null">--</option>
                                                    <option value="1">Single</option>
                                                    <option value="2">Compartida</option>
                                                    <option value="3">Matrimonial</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                    
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <button id="validateDates" type="submit" class="btn btn-primary">Validar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="infoGuest1" class="box box-form" style="display:none">
                        <div class="box-header">
                            <h3 class="box-title">Información del huésped N°1</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Nombre</label>
                                            <input class="form-control" id="name" name="first-name" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido paterno</label>
                                            <input class="form-control" id="apellidoP" name="apellidoP" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido materno</label>
                                            <input class="form-control" id="apellidoM" name="apellidoP" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Nacionalidad</label>
                                            <select id="na" class="form-control">
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de origen</label>
                                            <select id="po" class="form-control">
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de residencia</label>
                                            <select id="pr" class="form-control">
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('email') ? ' has-error' : '' }}'>
                                            <label>Email</label>
                                            <input class="form-control" id="email" name="email" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Teléfono</label>
                                            <input class="form-control" id="phone" name="phone" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Universidad</label>
                                            <input class="form-control" id="university" name="university" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <button id="validateGuest" type="submit" class="btn btn-primary">Validar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div id="infoGuest2" class="box box-form" style="display:none">
                        <div class="box-header">
                            <h3 class="box-title">Información del huésped N°2</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Nombre</label>
                                            <input class="form-control" id="name" name="first-name" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido paterno</label>
                                            <input class="form-control" id="apellidoP" name="apellidoP" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Apellido materno</label>
                                            <input class="form-control" id="apellidoM" name="apellidoP" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Nacionalidad</label>
                                            <select id="na" class="form-control">
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de origen</label>
                                            <select id="po" class="form-control">
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>País de residencia</label>
                                            <select id="pr" class="form-control">
                                                @foreach($country as $c)
                                                    <option value="{{$c->iso}}">{{ $c->name }} {{CountryFlag::get($c->iso)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('email') ? ' has-error' : '' }}'>
                                            <label>Email</label>
                                            <input class="form-control" id="email" name="email" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Teléfono</label>
                                            <input class="form-control" id="phone" name="phone" type="text" />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Universidad</label>
                                            <input class="form-control" id="university" name="university" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <button id="validateGuest" type="submit" class="btn btn-primary">Validar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </section>
                <!-- /. main content -->
                <a href="#" class="add-icon" style="display: inline-block;"><i class="fa fa-check"></i></a>
                <span class="return-up"><i class="fa fa-chevron-up"></i></span>
            </div>
            <!-- /. content-wrapper -->
            <!-- Main Footer -->
            @include('layout.footer')
        </div>
        <!-- /. wrapper content-->
        <!-- JS scripts -->
        <script src="{{asset('jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('js/jQueryUI/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <script src="{{asset('js/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('js/pages/jquery-icheck.js')}}"></script>

        <script src="{{asset('js/pages/dialogs.js')}}"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

        <script src="{{asset('pickadate.js-3.5.6/lib/picker.js')}}"></script>
        <script src="{{asset('pickadate.js-3.5.6/lib/picker.date.js')}}"></script>
        <script src="{{asset('pickadate.js-3.5.6/lib/picker.time.js')}}"></script>
        <script src="{{asset('pickadate.js-3.5.6/lib/translations/es_ES.js')}}"></script>
        <!-- JS app -->
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<script type="text/javascript">

$(document).ready(function(){

            $('#rt').on('change', function(e){
                e.preventDefault();

                var $selected = $('#rt').val();
                if($selected == '1'){
                    $("#infoGuest1").show(1000);
                    $("#infoGuest2").hide(1000);

                }else if($selected == '2'){
                    $("#infoGuest1").show(1000);
                    $("#infoGuest2").hide(1000);
                }else if($selected == '3'){
                    $("#infoGuest1").show(1000);
                    $("#infoGuest2").show(1000);
                }
            });

            $('#validateGuest').on('click',function(e){


            e.preventDefault();

            var name = $('#name').val();
            var ap = $('#apellidoP').val();
            var am = $('#apellidoM').val();
            var na = $('#na').val();
            var po = $('#po').val();
            var pr = $('#pr').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var university = $('#university').val();

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{name:name, ap:ap, am:am, na:na, po:po, pr:pr, email:email, phone:phone, university:university, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/user/validate_guest' ,
                success:function(data){
                    $('#s').text('    Disponible '+data.single+' de 4');
                    $('#c').text('    Disponible '+data.compartida+' de 2');
                    $('#m').text('    Disponible '+data.matrimonial+' de 2');

           }
            }); 

        });
});
</script>