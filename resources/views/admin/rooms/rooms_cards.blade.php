@include('layout.header')
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
            Fichas de habitaciones
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/{{Auth::user()->type}}"><i class="fa fa-home"></i>Inicio</a></li>
            <li class="active">Habitaciones</li>
            <li class="active">Fichas</li>
          </ol>
        </section>
        <section class="content">
          <div class="row elements-overlay">
          	@foreach($rooms as $item)
            <div class="col-md-3 col-xs-12 col-sm-6">
              <div class="box">
              @if($item->status == 'free')
                <div class="ribbon ribbon-top-left"><span>Libre</span></div>
              @else
                <div class="ribbon-red ribbon-top-left"><span>Ocupada</span></div>
              @endif

                	@if($item->id_room == 1)
                  		<img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_1.JPG')}}">
                	@elseif($item->id_room == 2)
                		  <img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_2(1).JPG')}}">
                	@elseif($item->id_room == 3)
                      <img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_3(1).JPG')}}">
                  @elseif($item->id_room == 4)
                      <img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_4.JPG')}}">
                  @elseif($item->id_room == 5)
                      <img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_5.JPG')}}">
                  @elseif($item->id_room == 6)
                      <img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_6(3).JPG')}}">
                  @elseif($item->id_room == 7)
                      <img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_2(1).JPG')}}">
                  @elseif($item->id_room == 8)
                      <img class="img-responsive" alt="room" src="{{asset('img/rooms/HAB_8(1).JPG')}}">
                  	@endif

                <div class="box-body body-car">
                  <h4 class="car-title text-center">Habitación N° {{$item->id_room}}</h4>
                  <div class="car-information text-center">
                    <div class="row">
                      <div style="height: 45px; text-align: left;">
                        Huésped(es):
                          @if($item->status != 'free')
                            @foreach($pGroups as $pg)
                              @if($pg->reservation_id == $item->active_reservation_id)
                                <a href="passenger-profile/{{$pg->passengersR[0]->id_passenger}}"><img class="img-circle" src="{{$pg->passengersR[0]->pAvatar}}" style="height: 35px; width: 35px;"></a>
                              @endif
                            @endforeach
                          @else
                            <span class="badge bg-grey">N/A</span>
                          @endif
                          </div>
						            <ul style="list-style-type: disc; padding-left: 2em; text-align: left;">
						              @if($item->type == 'shared')
                          	<li>Tipo: Single compartida</li>
                          @else
                          	<li>Tipo: {{$item->type}}</li>
                          @endif
                          @if($item->active_reservation_id == null)
                          	<li>Reserva: <span class="badge bg-grey">N/A</span></li>
                          @else
                          	<li><a href=""><span class="badge bg-blue">Ir a reserva {{$item->active_reservation_id}}</span></a></li>
                          @endif
                        </ul>
                      <div style="margin: 0px -9px -24px;" class="price-car text-center"><strong>$ {{$item->price}} /Day</strong></div>
                    </div>
                  </div>
                  <div class="text-center action-profile">
                      <a href="room-detail/{{$item->id_room}}" class="btn btn-block">ver habitación</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
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
    <script src="{{asset('js/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/app2.js')}}"></script>
    <!-- Slimscroll is required when using the fixed layout. -->
  </body>
</html>