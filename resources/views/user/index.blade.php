@include('layout.header')

        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 

        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">

        <!-- calendar style -->
        <link rel="stylesheet" href="{{asset('css/calendar.css')}}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">

        <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.css')}}" rel="stylesheet">
        <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.date.css')}}" rel="stylesheet">

        <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">
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
                        Bienvenido al portal de reservas
                        <small></small>
                    </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Inicio </a></li>
          </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                <strong>Info!</strong> Para brindar un mejor servicio, las habitaciones quedan fuera de disponibilidad luego terminarse una estadía (Mantenimiento y limpieza), es por ello que a pesar de ver un espacio disponible en el calendario, si este esta directamente seguido de un checkin o checkout de una reserva, no se contabilizara como disponible (dependiendo de la cantidad y tipo de habitacion en dicha fecha).
                            </div>
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Consultar disponibilidad</h4>
                                </div>
                                <div class="row">
                                    <!-- Single Feature Start -->
                                <form class="form" method="POST" action="{{ route('reservation') }}">
                                             {{ csrf_field() }}
                                    <div class="box-body">

                                        <div class="col-md-12">
                                            <div class="single-feature">
                                                <h5>Check in</h5>
                                                <input id="chIn" name="chIn" type="date" class="form-control datepicker">
                                            </div>
                                            <!-- Single Feature Start -->
                                            <div class="single-feature">
                                                <h5>Check out</h5>
                                                <input id="chOut" name="chOut" type="date" class="form-control datepicker2">
                                            </div>
                                            <!-- Single Feature Start -->

   
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <br>
                                                    <button type="button" id="srchDisp" class="btn btn-primary">Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>
                                <div class="box-body">
                                    <!-- the events -->
                                    <div id="external-events">
                                        <div class="event-title b-maroon">Single <span class="badge bg-grey pull-right" id="s"></span></div>
                                        <div class="event-title b-purple">Compartida <span class="badge bg-grey pull-right" id="c"></span></div>
                                        <div class="event-title b-orange">Matrimonial <span class="badge bg-grey pull-right" id="m"></span></div>
                                        <div class="checkbox">
                                        </div>
                                        <div><button type="submit" class="btn btn-primary btn-block" id="startReserv">+ Crear reserva</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        <script src="{{asset('js/jQueryUI/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>

        <script src="{{asset('js/calendar.js')}}"></script>

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

        //calendar
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid' ],
          locale: 'es',
          events:[
           @foreach($Reservations as $r)
                {
                    @if($r->user_id == Auth::user()->id)
                        title : '{{ '(*) ' . trans('attributes.'.$r->roomType) . ' R' . $r->id_res }}',
                    @else
                        title : '{{ trans('attributes.'.$r->roomType) . ' R' . $r->id_res }}',
                    @endif
                    start : '{{ $r->check_in}}',
                    end   : '{{ $r->check_out}}',
                    @if($r->roomType == "single")
                        color : '#d81b60'
                    @elseif($r->roomType == "shared")
                        color : '#605ca8'
                    @elseif($r->roomType == "matrimonial")
                        color : 'orange'
                    @endif
                },
                @endforeach
          ]

        });
        //calendar.addEvents($calendar.event);
        calendar.render();


        //prevent auto hide on some chromes
        $('.datepicker').on('mousedown',function(event){
            event.preventDefault();
        })
        
        $('.datepicker2').on('mousedown',function(event){
            event.preventDefault();
        })

        var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);

        $('.datepicker').pickadate({
          disable: [
            { from: [0,0,0], to: yesterday }
          ]
        });

        $('.datepicker2').pickadate({
          disable: [
            { from: [0,0,0], to: yesterday }
          ]
        }); 

        var $input = $('.datepicker').pickadate()
        var picker = $input.pickadate('picker')
        var $input2 = $('.datepicker2').pickadate()
        var picker2 = $input2.pickadate('picker')

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $('#srchDisp').on('click',function(e){


            e.preventDefault();

            var hola = picker.get("select","yyyy-mm-dd");
            var inFormatedForUser = picker.get("select","dd-mm-yyyy");
            $('#in').text(inFormatedForUser);
            var hola2 = picker2.get("select","yyyy-mm-dd");
            var outFormatedForUser = picker2.get("select","dd-mm-yyyy");
            $('#out').text(outFormatedForUser);

            var checkIn = hola;
            var checkOut = hola2;

             if ((inFormatedForUser == '') || (outFormatedForUser == '')){
                 swal({
                    title:"Ups!!",
                    text: "Para comenzar una nueva reserva debes ingresar las fechas, intenta nuevamente",
                    type: "warning"
                });

            }else if((checkOut >= checkIn) == false){
                swal({
                    title:"Ups!!",
                    text: "El check out no puede tener fecha antes del check in, intenta nuevamente",
                    type: "warning"
                });
            }
            else{

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{checkIn:checkIn, checkOut:checkOut},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/disp' ,
                success:function(data){
                    $('#s').text('    Disponible '+data.single+' de 3');
                    $('#c').text('    Disponible '+data.compartida+' de 1');
                    $('#m').text('    Disponible '+data.matrimonial+' de 4');

                    }
                });

            } 

        });


});
</script>
