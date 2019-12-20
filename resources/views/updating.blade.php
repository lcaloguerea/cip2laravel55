<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>CIP - Landing Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/logo_Mecesup.ico')}}" />

    <!-- Core Stylesheet -->
    <link href="{{asset('style.css')}}" rel="stylesheet">

    <!-- Slick-Slider -->
    <link href="{{asset('js/slick-1.8.1/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('js/slick-1.8.1/slick/slick-theme.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{asset('css/colorlib/responsive.css')}}" rel="stylesheet">


    <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.css')}}" rel="stylesheet">
    <link href="{{asset('pickadate.js-3.5.6/lib/themes/default.date.css')}}" rel="stylesheet">



</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>


    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
    </section>
    <!-- ***** Wellcome Area End ***** -->





    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>CIP</h2>
        </div>
        <div class="footer-menu">
            <nav>

                    <strong>Copyright &copy; {{date("Y")}} <a href="mailto:l.caloguerea@gmail.com">Thánatos development</a>.</strong> All rights reserved.
                
            </nav>
        </div>
        <!-- Foooter Text-->
    </footer>
    <!-- ***** Footer Area Start ***** -->

<style type="text/css">
    .wellcome_area {
    background-image: url(img/bg-img/site_under_maintenance.png);
    height: 900px;
    position: relative;
    z-index: 1;
    background-position: bottom center;
    background-size: cover;
}
</style>

    <!-- Jquery-2.2.4 JS -->
    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('js/index_mixed.js')}}"></script>



</body>

</html>
