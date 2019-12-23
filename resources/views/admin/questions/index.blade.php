@include('layout.header')


        <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('responsive-tables/responsivetables.css')}}">

        <link rel="stylesheet" href="{{asset('select2/select2.min.css')}}">

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
                        Preguntas
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/{{Auth::user()->type}}"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Preguntas</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table id="passengers" class="table table-bordered table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Mensaje</th>
                                                <th>Respondido por</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $q)
                                            <tr>
                                                <td>{{$q->id}}</td>
                                                <td>{{$q->name}}</td>
                                                <td>{{$q->email}}</td>
                                                <td>{{$q->message}}</td>
                                                @if($q->ansBy)
                                                <td>{{$q->userR->name}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($q->status == "answered")
                                                <td>
                                                    <span class="badge bg-green">{{trans('attributes.'.$q->status)}}</span>
                                                </td>
                                                @else
                                                 <td>
                                                    <span class="badge bg-orange">{{trans('attributes.'.$q->status)}}</span>
                                                </td>
                                                @endif
                                                <td style="text-align: center">
                                                    @if($q->status != "answered")
                                                    <button id="{{$q->id}}" class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    @endif
                                                    </button>
                                                    <button id="{{$q->id}}" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        <script src="{{asset('select2/select2.min.js')}}"></script>

        <script src="{{asset('js/swal2.js')}}"></script>

        <!-- DataTables -->
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('responsive-tables/responsivetables.js')}}"></script>

        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
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

<script type="text/javascript">

    $(document).ready(function(){


    
        $('.datatable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollX": true,
            "oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
        });

        $('.btn-success').on('click', function(e){
            var q_id = $(this).attr('id');
            Swal.fire({
                        title: 'Gestionar Pregunta',
                        text: '¿Desea marcar esta pregunta como respondida? (Recuerde que es labor de un administrador responder manualmente via correo electronico las consultas recibidas de los usuarios)',
                        imageWidth: 100,
                        imageHeight: 100,
                        imageAlt: 'visibility',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Confirmar',
                        type: 'info'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                // En data puedes utilizar un objeto JSON, un array o un query string
                                data:{q_id:q_id, "_token": "{{ csrf_token() }}"},
                                //Cambiar a type: POST si necesario
                                type: 'POST',
                                // Formato de datos que se espera en la respuesta
                                dataType: "json",
                                // URL a la que se enviará la solicitud Ajax
                                url: '/admin/questions/answer' , //this is different because it can change user type
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
                        }else{
                                Swal.fire({
                                    title:'Cancelado',
                                    text:'Has cancelado la modificación de del estado de esta consulta.',
                                    confirmButtonText:'Cerrar',
                                    type:'error'
                                })
                            }
                    })

        });

        $('.btn-danger').on('click', function(e){
            var q_id = $(this).attr('id');
            Swal.fire({
                        title: 'Eliminar Pregunta',
                        text: '¿Desea eliminar esta pregunta?',
                        imageWidth: 100,
                        imageHeight: 100,
                        imageAlt: 'visibility',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Confirmar',
                        type: 'info'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                // En data puedes utilizar un objeto JSON, un array o un query string
                                data:{q_id:q_id, "_token": "{{ csrf_token() }}"},
                                //Cambiar a type: POST si necesario
                                type: 'POST',
                                // Formato de datos que se espera en la respuesta
                                dataType: "json",
                                // URL a la que se enviará la solicitud Ajax
                                url: '/admin/questions/delete' , //this is different because it can change user type
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
                        }else{
                                Swal.fire({
                                    title:'Cancelado',
                                    text:'Has cancelado la eliminación de esta consulta.',
                                    confirmButtonText:'Cerrar',
                                    type:'error'
                                })
                            }
                    })

        });
    });

        
</script>