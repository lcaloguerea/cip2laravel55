@include('layout.header')
        
        <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('responsive-tables/responsivetables.css')}}">
        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}">
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
                        Administración de mantenimiento
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Suministros</li>
                    </ol>
                </section>


                <section class="content">

          <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                <table id="maintenance" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Mantenimiento</th>
                      <th>Periodicidad</th>
                      <th>Estado</th>
                      <th>Vencimiento</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($maint as $m)
                    <tr>
                      <td>{{$m->name}}</td>
                      <td>{{trans('attributes.'.$m->periodicity)}}</td>
                      @if($m->status == 'done')
                      <td><span class="label bg-green">Al día</span></td>
                      @else
                      <td><span class="label bg-red">Expirado</span></td>
                      @endif
                      <td>{{date('d-m-Y', strtotime($m->deadline))}}</td>
                      @if($m->status == 'done')
                      <td><a  href="#" class="btn btn-block btn-danger" value="{{$m->id}}" value2="{{$m->name}}">Alertar</a></td>
                      @elseif($m->status == 'expired')
                      <td><a  href="#" class="btn btn-block btn-info" value="{{$m->id}}" value2="{{$m->name}}">Validar</a></td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
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
        <script src="{{asset('js/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('select2/select2.min.js')}}"></script>
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('js/iCheck/icheck.min.js')}}"></script>
        <script src="{{asset('js/swal2.js')}}"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<style type="text/css">
 
.swal2-popup {
  font-size: 1.6rem !important;
}    

.swal2-actions {
  z-index: 0;
}

.swal2-progress-steps .swal2-progress-step {
  z-index: 0;
}

.swal2-progress-steps .swal2-progress-step-line {
  z-index: 0;
}

</style>

        <script>
            $(function () {



    $('.btn-danger').on('click',function(e){
        e.preventDefault();

        var m_id = $(this).attr('value');
        var name = $(this).attr('value2');

        Swal.fire({
            title:'Alertar',
            html:'Se alertará a los administradores de que la mantención <strong>"'+name+'"</strong> requiere atención. <br><br><div style="text-align: center" class="alert alert-warning alert-dismissable">Esta acción quedará registrada y vinculada a su cuenta</div>',
            type:'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, alertar!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data:{m_id:m_id, "_token": "{{ csrf_token() }}"},
            //Cambiar a type: POST si necesario
            type: 'POST',
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: '/maid/alert-m' , //this is different because it can change user type
            success:function(data){
                Swal.fire({
                    title:"Actualizado!!",
                    html: "<strong>"+data.message+"</strong>",
                    type: "success",
                }).then((result) => {
                    window.location.reload(true);
                });

            }
        });
            }
        })


    });
         
    $('.btn-info').on('click',function(e){
        e.preventDefault();

        var m_id = $(this).attr('value');
        var name = $(this).attr('value2');

        Swal.fire({
            title:'Validar',
            html:'Se validará el estado de la mantención <strong>"'+name+'"</strong> y se notificará a los administradores del proceso. <br><br><div style="text-align: center" class="alert alert-warning alert-dismissable">Esta acción quedará registrada y vinculada a su cuenta</div>',
            type:'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, validar!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data:{m_id:m_id, "_token": "{{ csrf_token() }}"},
            //Cambiar a type: POST si necesario
            type: 'POST',
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: '/maid/validate-m' , //this is different because it can change user type
            success:function(data){
                Swal.fire({
                    title:"Actualizado!!",
                    html: "<strong>"+data.message+"</strong>",
                    type: "success",
                }).then((result) => {
                    window.location.reload(true);
                });

            }
        });
            }
        })


    })

            $('#maintenance').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "autoWidth": false,
                "scrollX": true,
                "oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
            });
            });
        </script>