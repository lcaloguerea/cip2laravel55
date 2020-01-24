@include('layout.header')

        <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('responsive-tables/responsivetables.css')}}">
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">

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
                        Detalle respaldo reserva N°{{$hres->id}}
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/{{Auth::user()->type}}"><i class="fa fa-home"></i>Inicio</a></li>
                        <li><a href="/admin/reservations-hist"></i>Respaldo de reservas</a></li>
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
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Huésped(es)</label>
                                                <input class="form-control" id="guests" name="guests" type="text" value="{{$hres->guests}}"/>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Patrocinante</label>
                                                <input class="form-control" id="sponsor" name="sponsor" type="text" value="{{$hres->sponsor}}"/>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Departamento</label>
                                                <input class="form-control" id="department" name="department" type="text" value="{{$hres->department}}"/>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-2'>
                                            <div class='form-group'>
                                                <label>Check In</label>
                                                <input class="form-control" id="check_in" name="check_in" type="text" value="{{date('d-m-Y', strtotime($hres->check_in))}}" disabled/>
                                            </div>
                                        </div>
                                        <div class='col-md-2'>
                                            <div class='form-group'>
                                                <label>Check Out</label>
                                                <input class="form-control" id="check_out" name="check_out" type="text" value="{{date('d-m-Y', strtotime($hres->check_out))}}" disabled/>
                                            </div>
                                        </div>
                                        <div class='col-md-2'>
                                            <div class='form-group'>
                                                <label>Noches</label>
                                                <input class="form-control" id="nights" name="nights" type="text" value="{{$hres->nights}}" disabled/>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>Valor Habitación</label>
                                                <input class="form-control" id="rprice" name="rprice" type="text" value="{{$hres->rprice}}" disabled/>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>Valor Total</label>
                                                <input class="form-control" id="rtotal" name="rtotal" type="text" value="{{$hres->rtotal}}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Método de pago</label>
                                                <input class="form-control" id="payment_m" name="payment_m" type="text" value="{{$hres->payment_m}}"/>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Código</label>
                                                <input class="form-control" id="code" name="code" type="text" value="{{$hres->code}}"/>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Email</label>
                                                <input class="form-control" id="email" name="email" type="text" value="{{$hres->email}}"/>
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
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

        <!-- DataTables -->
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('responsive-tables/responsivetables.js')}}"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
        <script>
            $(function () {
        $('.datatable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollX": true,
            "oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
        });

    $('#btn_update').on('click',function(e){

        e.preventDefault();

        var check_in = $('#check_in').val();
        var check_out = $('#check_out').val();
        var guests = $('#guests').val();
        var sponsor = $('#sponsor').val();
        var nights = $('#nights').val();
        var email = $('#email').val();
        var department = $('#department').val();
        var rprice = $('#rprice').val();
        var rtotal = $('#rtotal').val();
        var code = $('#code').val();
        var payment_m = $('#payment_m').val();
        var id = {{$hres->id}};

        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
           data:{check_in:check_in, check_out:check_out, guests:guests, sponsor:sponsor, nights:nights, email:email, department:department, rprice:rprice, rtotal:rtotal, code:code, payment_m:payment_m, id:id, "_token": "{{ csrf_token() }}"},
            //Cambiar a type: POST si necesario
            type: 'PUT',
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: '/admin/reservations-hist/update' ,
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
                        window.location.href = "/admin/reservations-hist";
                    });
                }
            }
        }); 
    });        
            });
        </script>
    </body>
</html>