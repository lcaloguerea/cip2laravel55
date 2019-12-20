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
                <section class="content-title">
                    <h1>
                        Fichas de huéspedes
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/{{Auth::user()->type}}"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="">Huéspedes</li>
                        <li class="active">Fichas</li>
                    </ol>
                </section>
                <section class="content">
                    <div id= "js_card" class="row">
                    @foreach($passengers as $item)

                            
                        
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="box all-drivers">
                                <div style="height: 320px" class="box-body">
                                    <img class="member-online img-circle" src="{{$item->pAvatar}}" alt="User Image">
                                    <p class="name">{{$item->name_1}} {{$item->lName_1}} {{$item->lName_2}}</p>
                                    <div class="information">
                                        <p class="">{{$item->type}}</p>
                                        <p class="email"><a href="#">{{$item->email}}</a>
                                        </p>
                                        <p class="name">Nacionalidad <span><img style="height: 20px; width: 30px" src="/img/icons/flag-cl.icon"></span></p>
                                    </div>

                                    <!-- <div class="socials-networks">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                                                                <div class="text-center action-profile">
                                        <a href="passenger-profile/{{$item->id_passenger}}" class="btn btn-default btn-block">Ver Perfil</a>
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
        <script src="{{asset('js/app2.js')}}"></script>


        <!-- Slimscroll is required when using the fixed layout. -->
    </body>

</html>