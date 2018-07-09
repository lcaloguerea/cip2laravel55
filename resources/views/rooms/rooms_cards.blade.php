<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CIP Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
            Fichas de habitaciones
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
            <li class="active">Habitaciones</li>
            <li class="active">Fichas</li>
          </ol>
        </section>
        <section class="content">
          <div class="row elements-overlay">
          	@foreach($rooms as $item)
            <div class="col-md-3 col-xs-12 col-sm-6">
              <div class="box">
                <div class="element-overlay">
                	@if($item->type == 'single')
                  		<img class="img-responsive" alt="room" src="{{asset('img/single.png')}}">
                  	@elseif($item->type == 'shared')
                  		<img class="img-responsive" alt="room" src="{{asset('img/shared_single.png')}}">
                  	@else
                  		<img class="img-responsive" alt="room" src="{{asset('img/matrimonial.png')}}">
                  	@endif
                  <div class="element-overlay-info">
                    <ul class="element-detail">
                      <li><a class="btn btn-outline" href="#"><i class="fa fa-search"></i></a></li>
                      <li><a class="btn btn-outline" href="#"><i class="fa fa-link"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="box-body body-car">
                  <h4 class="car-title text-center">Habitación N° {{$item->id_room}}</h4>
                  <div class="car-information text-center">
                    <div class="row">
						<ul style="list-style-type: disc; padding-left: 2em; text-align: left;">
						  @if($item->type == 'shared')
                          	<li>Tipo: Single compartida</li>
                          @else
                          	<li>Tipo: {{$item->type}}</li>
                          @endif
                          @if($item->status == 'free')
                          	<li>Estado: Libre</li>
                          @else
                          	<li>Estado: Ocupada</li>
                          @endif
                          @if($item->active_reservation_id == null)
                          	<li>Reserva: N/A</li>
                          @else
                          	<li>E{{$item->active_reservation_id}}</li>
                          @endif
                        </ul>
                      <div style="margin: 0px -9px -24px;" class="price-car text-center"><strong>$ {{$item->price}} /Day</strong></div>
                    </div>
                  </div>
                  <button class="btn btn-block">Detalles</button>
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
    <<script src="{{asset('js/app2.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
    <!-- Slimscroll is required when using the fixed layout. -->
  </body>
</html>