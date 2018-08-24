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
                        Boleta
                        <small>#10645</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Pagos</li>
                        <li class="active">Boleta</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <h2>Your logo Here</h2>
                                            </td>
                                            <td>
                                                Created: January 15, 2017<br>
                                                Due: February 15, 2017
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="information">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                Admin<br>
                                                12345 Street<br>
                                                New York<br>
                                                info@example.com
                                            </td>
                                            <td>
                                                Adrien Doe<br>
                                                12345 Street<br>
                                                New York<br>
                                                adrien.doe@example.com
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="heading">
                                <td>
                                    Payment Method
                                </td>
                                <td>
                                    Invoice #
                                </td>
                            </tr>
                            <tr class="details">
                                <td>
                                    Paypal
                                </td>
                                <td>
                                    10645
                                </td>
                            </tr>
                            <tr class="heading">
                                <td>
                                    Order Summary
                                </td>
                                <td>
                                    Price
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    First Item
                                </td>
                                <td>
                                    $300.00
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    Second Item
                                </td>
                                <td>
                                    $75.00
                                </td>
                            </tr>
                            <tr class="item last">
                                <td>
                                    Third Item
                                </td>
                                <td>
                                    $10.00
                                </td>
                            </tr>
                            <tr class="total">
                                <td></td>
                                <td>
                                    Total: $385.00
                                </td>
                            </tr>
                        </table>
                        <!-- accepted payments column -->
                        <div class="">
                            <p class="lead">Payment Methods:</p>
                            <img src="/img/credit/visa.png" alt="Visa">
                            <img src="/img/credit/mastercard.png" alt="Mastercard">
                            <img src="/img/credit/american-express.png" alt="American Express">
                            <img src="/img/credit/paypal2.png" alt="Paypal">
                            <br>
                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Enviar</button>
                                <button class="btn btn-default pull-right" onclick="window.print();" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</button>
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
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>