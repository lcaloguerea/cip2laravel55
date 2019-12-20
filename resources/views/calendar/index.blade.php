@include('layout.header')

        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 

        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/calendar.css')}}">
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
                        Calendario de reservas
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Calendario</li>
                        <li class="active">Reservas</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
        <script src="{{asset('js/calendar.js')}}"></script>
        <!-- JS app -->
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<script type="text/javascript">

        //calendar
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid' ],
          locale: 'es',
          height: 'auto',
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
                    url   : '/admin/reservations/reservation-detail/{{$r->id_res}}',
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

</script>
