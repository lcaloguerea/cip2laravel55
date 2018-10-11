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
                        Mailbox
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/admin"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Mailbox</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Redactar</a>
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Folders</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                                                <span class="label bg-blue pull-right">8</span></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                                        <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                                        <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label bg-orange pull-right">15</span></a></li>
                                        <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                                    </ul>
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Folders</h3>
                                    </div>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="box mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-check-square"></i></button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-folder"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-tags"></i></button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.pull-right -->
                            </div>
                            <div class="box mailbox">
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped ">
                                        <tbody>
                                            <tr class="unread active">
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html"><span class="label bg-teal">Work</span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr class="unread">
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star"></i></td>
                                                <td class="hidden-xs">Earle Reynold</td>
                                                <td><a href="read-mail.html"><span class="label bg-teal">Work</span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html"><span class="label bg-teal">Work</span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star"></i></td>
                                                <td class="hidden-xs">Earle Reynold</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Earle Reynold</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html"><span class="label bg-teal">Work</span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star"></i></td>
                                                <td class="hidden-xs">Earle Reynold</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html"><span class="label bg-maroon">Shop</span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Earle Reynold</td>
                                                <td><a href="read-mail.html"><span class="label bg-maroon">Shop</span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Earle Reynold</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox"/></td>
                                                <td class=""><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs">Alexander Pierce</td>
                                                <td><a href="read-mail.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></td>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                                <td class="mailbox-date">5 mins ago</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /.table -->
                                </div>
                                <!-- /.mail-box-messages -->
                            </div>
                            <!-- /.box-body -->
                            <div class="row mailbox-controls">
                                <div class="col-xs-5 text-left">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-primary"><i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="col-xs-7 ">
                                    <p class="p-15">Showing 1 - 15 of 200</p>
                                </div>
                            </div>
                        </div>
                        <!-- /. col -->
                    </div>
                    <!-- /.row -->
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
        <script src="{{asset('js/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('js/pages/mailbox.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>