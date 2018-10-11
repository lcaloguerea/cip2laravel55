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

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="#">CIP</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="#home">Inicio</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">Sobre nosotros</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#features">Disponibilidad</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#screenshot">Imágenes</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pricing">Habitaciones</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonios</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <a href="/login">Inicia sesión</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                <div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <a href="/login">Inicia sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                        <h2>Casa de Investigadores y Postgrado</h2>
                        <br>
                        <div style=" background-color: #8ea253;  border-radius: 24px 24px 24px 0px;" class="col-12 col-md-6">
                            <p style="font-size: 30px; height: auto; text-align: center; color: white;">Descanso en un entorno universitario </p>
                        </div>
                         <!--   <img style="width:300px; margin-left: auto; margin-right: auto; display:block" src="img/logo_Mecesup.png"> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Special Area Start ***** -->
    <section class="special-area bg-white section_padding_100" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Sobre nosotros</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>Ubicación</h5>
                        <p>La Casa de Investigadores y Postgrado – CIP, se ubica en el 4° piso del módulo C del Ex Hotel Isla Teja, ubicada en Las Encinas 220, Isla Teja. Es una excelente alternativa para descansar y disfrutar del entorno rodeado de naturaleza y cercanía a las instalaciones universitarias. Próxima a bancos, restaurantes, supermercado y a minutos del centro de Valdivia</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <h5>Habitaciones y recepción</h5>
                        <p>Disponemos de 4 habitaciones con cama matrimonial y 4 single con cama nido. La recepción y entrega de llaves se coordina con la Sra. Patricia Sánchez, quien se encuentra de lunes a viernes en horario continuado de 08:00 a 12:30 PM. La llegada de huéspedes en otro horario debe informarse con antelación.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="fa fa-shield" aria-hidden="true"></i>
                        <h5>Seguridad</h5>
                        <p>La CIP cuenta con alarma y vigilancia permanente por parte de guardias de seguridad del edificio; una vez que realice su reserva se le darán a conocer las reglas de uso, al momento de registrarse y recibir las llaves se le informará el procedimiento en caso de emergencia.</p>
                    </div>
                </div>
            </div>
        </div>

    <section class="our-Team-area bg-white section_padding_50 clearfix" id="team">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-1.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Jackson Nash</h4>
                            <p>Tax Advice</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-2.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Alex Manning</h4>
                            <p>CEO-Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-3.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Ollie Schneider</h4>
                            <p>Business Planner</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/team-img/team-4.jpg" alt="">
                            <div class="team-hover-effects">
                                <div class="team-social-icon">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="member-text">
                            <h4>Roger West</h4>
                            <p>Financer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Special Description Area -->
        <div class="special_description_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3064.863133729664!2d-73.2547967603998!3d-39.810061768371625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615ede0a0d896dd%3A0x1180b58688a2002d!2sLas+Encinas+220%2C+Valdivia%2C+Regi%C3%B3n+de+los+R%C3%ADos!5e0!3m2!1ses-419!2scl!4v1531062736166" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Special Area End ***** -->

    <!-- ***** Awesome Features Start ***** -->
    <section class="awesome-feature-area bg-white section_padding_0_50 clearfix" id="features">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text -->
                    <div class="section-heading text-center">
                        <h2>Disponibilidad</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
                

                
            </div>

            <div class="row">
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <h5>Búsqueda</h5>
                        <p>Ingrese a continuación la fecha de llegada y de salida deseada para consultar la disponibilidad en nuestro sistema.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <h5>Check in</h5>
                        <input id="chIn" class="datepicker"></input>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <h5>Check out</h5>
                        <input id="chOut" class="datepicker2"></input>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <div class="col-12">
                           <button type="button" id="srchDisp" class="btn submit-btn">Buscar</button>
                        </div>
                    </div>
                </div>
                <!-- Single Feature Start -->
            </div>

        </div>
    </section>
    <!-- ***** Awesome Features End ***** -->

    <!-- ***** Video Area Start ***** -->
    <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Video Area Start -->
                    <div class="video-area" style="background-image: url(img/front_building.JPG);">
                        <div class="video-play-btn">
                            <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Video Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <section class="cool_facts_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="counter-area">
                            <h3><span class="counter">20</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="fa fa-user-plus"></i>
                            <p>Usuarios <br> Registrados</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="counter-area">
                            <h3><span class="counter">30</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="fa fa-suitcase"></i>
                            <p>Huéspedes <br> Alojados</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="counter-area">
                            <h3><span class="counter">5</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="fa fa-user"></i>
                            <p>Huéspedes <br>Activos</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.8s">
                        <div class="counter-area">
                            <h3><span class="counter">5</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="fa fa-star-half-o"></i>
                            <p>Promedio de <br> Valoración</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Cool Facts Area End ***** -->

    <!-- ***** App Screenshots Area Start ***** -->
    <section class="app-screenshots-area bg-white section_padding_0_100 clearfix" id="screenshot">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>App Screenshots</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="app_screenshots_slides owl-carousel">
                        <div class="single-shot">
                            <img src="img/scr-img/app-1.jpg" alt="">
                        </div>
                        <div class="single-shot">
                            <img src="img/scr-img/app-2.jpg" alt="">
                        </div>
                        <div class="single-shot">
                            <img src="img/scr-img/app-3.jpg" alt="">
                        </div>
                        <div class="single-shot">
                            <img src="img/scr-img/app-4.jpg" alt="">
                        </div>
                        <div class="single-shot">
                            <img src="img/scr-img/app-5.jpg" alt="">
                        </div>
                        <div class="single-shot">
                            <img src="img/scr-img/app-3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** App Screenshots Area End *****====== -->




    <!-- ***** Pricing Plane Area Start *****==== -->
    <section class="pricing-plane-area section_padding_100_70 clearfix" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text  -->
                    <div class="section-heading text-center">
                        <h2>Detalles de habitaciones</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Single</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <h4>$30.000</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Cama de 1 plaza</p>
                            <p>Aire acondicionado</p>
                            <p>TV Satelital</p>
                            <p>WiFi</p>
                            <p>Frigobar</p>
                            <img class="img-responsive" src="{{asset('img/single.png')}}">
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Consultar disponibilidad</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Single compartida</h5>
                            <div class="ca-price d-flex justify-content-center">
                            <h4>$35.000</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Dos camas de 1 plaza</p>
                            <p>Aire acondicionado</p>
                            <p>TV Satelital</p>
                            <p>WiFi</p>
                            <p>Frigobar</p>
                            <img class="img-responsive" src="{{asset('img/shared_single.png')}}">
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Consultar disponibilidad</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Doble</h5>
                            <div class="ca-price d-flex justify-content-center">
                            <h4>$40.000</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Cama matrimonial</p>
                            <p>Aire acondicionado</p>
                            <p>TV Satelital</p>
                            <p>WiFi</p>
                            <p>Frigobar</p>
                            <img class="img-responsive" src="{{asset('img/matrimonial.png')}}">
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#">Consultar disponibilidad</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plane Area End ***** -->

    <!-- ***** Client Feedback Area Start ***** -->
    <section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="slider slider-for">
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Aigars Silkalns</h5>
                                <p>Ceo Colorlib</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Jennifer</h5>
                                <p>Developer</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job.”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Helen</h5>
                                <p>Marketer</p>
                            </div>
                        </div>
                        <!-- Client Feedback Text  -->
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Henry smith</h5>
                                <p>Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client Thumbnail Area -->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="slider slider-nav">
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-3.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-2.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-1.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="img/bg-img/client-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Client Feedback Area End ***** -->

    <!-- ***** CTA Area Start ***** -->
    <section class="our-monthly-membership section_padding_50 clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="membership-description">
                        <h2>¿Deseas realizar una reserva?</h2>
                        <p>Si eres miembro de nuestra institución debes registrarte para poder realizar una reserva asistida.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                        <a href="./register">Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** CTA Area End ***** -->


    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Escríbenos</h2>
                        <div class="line-shape"></div>
                    </div>
                    <div class="footer-text">
                        <p>Si tienes alguna duda o consulta, no dudes en dejarnos tus comentarios aquí. Te responderemos lo más pronto posible.</p>
                    </div>
                    <div class="address-text">
                        <p><span>Dirección:</span> Las Encinas 220, Isla Teja - Valdivia, Chile</p>
                    </div>
                    <div class="phone-text">
                        <p><span>Recepción:</span> +56 63 2 211136 Anexo 2436 - Lunes a Viernes: 08:00 -12:30 am</p>
                    </div>
                    <div class="phone-text">
                        <p><span>Reservas:</span> +56 63 2 221258 Anexo 1258</p>
                    </div>
                    <div class="email-text">
                        <p><span>Email:</span> info.deercreative@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Start-->
                    <div class="contact_from">
                        <form action="#" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Tu mensaje *" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn">Enviar</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>CIP</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
    </footer>
    <!-- ***** Footer Area Start ***** -->



    <!-- Jquery-2.2.4 JS -->
    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>

    <script src="{{asset('pickadate.js-3.5.6/lib/picker.js')}}"></script>
    <script src="{{asset('pickadate.js-3.5.6/lib/picker.date.js')}}"></script>
    <script src="{{asset('pickadate.js-3.5.6/lib/picker.time.js')}}"></script>
    <script src="{{asset('pickadate.js-3.5.6/lib/translations/es_ES.js')}}"></script>

    <!-- Popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- All Plugins JS -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- Slick Slider Js-->
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!-- Footer Reveal JS -->
    <script src="{{asset('js/footer-reveal.min.js')}}"></script>
    <!-- Active JS -->
    <script src="{{asset('js/active.js')}}"></script>

    @include('search_modal')

<script type="text/javascript">
    $(document).ready(function(){

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
                    $('#s').text(data.single);
                    $('#c').text(data.compartida);
                    $('#m').text(data.matrimonial);
                    $("#exampleModalCenter").modal();


           }
            }); 

        });


});
</script>


</body>

</html>
