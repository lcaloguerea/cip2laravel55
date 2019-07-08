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
                        Administración de suministros
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Suministros</li>
                    </ol>
                </section>


                <section class="content">

          <div class="row">

            <!--/.col-->
            <div class="col-sm-6 col-lg-12">
              <div class="info-box">
                <div class="info-box-content">
                  <div class="text-center value">Acciones de insumos</div>
                  <br>
                  <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <td>                            
                        <select id="opt_supp" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="1">Alertar selección</option>
                            <option value="2">Alertar todo</option>
                            <option value="3">Abastecer selección</option>
                            <option value="4">Abastecer todo</option>
                        </select>
                                </td>
                                <td><a id="accept" href="#" class="btn btn-block btn-success">Aceptar</a></td>
                            </tr>
                        </table>
                  </div>
                </div>
              </div>
            </div>
            <!--/.col-->
          </div>


          <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                <table id="supplies" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Insumo</th>
                      <th>Estado</th>
                      <th>Seleccionar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($supp as $s)
                    <tr>
                      <td>{{$s->supply}}</td>
                      @if($s->stock == 'yes')
                      <td><span class="label bg-green">Con stock</span></td>
                      @else
                      <td><span class="label bg-red">Sin stock</span></td>
                      @endif
                      <td><label>
                                <input type="checkbox" class="flat-red" value="{{$s->id}}">
                        </label></td>
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



    $('#accept').on('click',function(e){

        e.preventDefault();

                    var selectedIds = [];

$(":checked").each(function() {
    selectedIds.push($(this).val());
});
        var e = document.getElementById("opt_supp");
        var opt = e.options[e.selectedIndex].value;

        if(selectedIds.length > 1){
            if(selectedIds[0] == 1){
                Swal.fire({
                        title:'Alertar selección',
                        html:'Se alertará a los administradores de la falta de stock referente a suministro(s) seleccionado(s). <br><br><div style="text-align: center" class="alert alert-warning alert-dismissable">Esta acción quedará registrada y vinculada a su cuenta</div>',
                        type:'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, bloqueala!'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{selectedIds:selectedIds, "_token": "{{ csrf_token() }}"},
                        //Cambiar a type: POST si necesario
                        type: 'POST',
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: '/maid/supplies-alert' , //this is different because it can change user type
                        success:function(data){
                            if(data.outcome == "ok"){
                                Swal.fire({
                                    title:"Actualizado!!",
                                    html: "<strong>"+data.message+"</strong>",
                                    type: "success",
                                }).then((result) => {
                                    window.location.reload(true);
                                });
                            }else if(data.outcome == "fail"){
                                Swal.fire({
                                    title:"Error",
                                    html: "<strong>"+data.message+"</strong>",
                                    type: "error",
                                }).then((result) => {
                                    window.location.reload(true);
                            });
                        }
                        }
                    });
                        }
                    })
            }else if(selectedIds[0] == 3){
              Swal.fire({
                        title:'Abastecer selección',
                        html:'Se cambiará el estado de stock de los insumos seleccionados y se notificará a los administradores al respecto. <br><br><div style="text-align: center" class="alert alert-warning alert-dismissable">Esta acción quedará registrada y vinculada a su cuenta</div>',
                        confirmButtonText:'Cerrar',
                        type:'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, abastecer'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{selectedIds:selectedIds, "_token": "{{ csrf_token() }}"},
                        //Cambiar a type: POST si necesario
                        type: 'POST',
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: '/maid/supplies-res' , //this is different because it can change user type
                        success:function(data){
                            if(data.outcome == "ok"){
                                Swal.fire({
                                    title:"Actualizado!!",
                                    html: "<strong>"+data.message+"</strong>",
                                    type: "success",
                                }).then((result) => {
                                    window.location.reload(true);
                                });
                            }else if(data.outcome == "fail"){
                                Swal.fire({
                                    title:"Error",
                                    html: "<strong>"+data.message+"</strong>",
                                    type: "error",
                                }).then((result) => {
                                    window.location.reload(true);
                            });
                        }
                        }
                    });
                        }
                    })
            }

        }else{
            if(selectedIds[0] == 2){
              Swal.fire({
                        title:'Alertar todo',
                        html:'Se alertará a los administradores de la falta de stock referente a todos los suministros. <br><br><div style="text-align: center" class="alert alert-warning alert-dismissable">Esta acción quedará registrada y vinculada a su cuenta</div>',
                        confirmButtonText:'Cerrar',
                        type:'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, Alertar'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{selectedIds:selectedIds, "_token": "{{ csrf_token() }}"},
                        //Cambiar a type: POST si necesario
                        type: 'POST',
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: '/maid/supplies-alert-all' , //this is different because it can change user type
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
            }else if(selectedIds[0] == 4){
              Swal.fire({
                        title:'Abastecer todo',
                        html:'Se cambiará el estado de stock de los todos los insumos que figuran sin stock y se notificará a los administradores al respecto. <br><br><div style="text-align: center" class="alert alert-warning alert-dismissable">Esta acción quedará registrada y vinculada a su cuenta</div>',
                        confirmButtonText:'Cerrar',
                        type:'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Si, abastecer'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data:{selectedIds:selectedIds, "_token": "{{ csrf_token() }}"},
                        //Cambiar a type: POST si necesario
                        type: 'POST',
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: '/maid/supplies-res-all' , //this is different because it can change user type
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
            }else{
            Swal.fire({
            title:'Nada seleccionado',
            text:'Debe marcar algun insumo en la lista para poder gestionar.',
            confirmButtonText:'Cerrar',
            type:'error'
                    })
        }
        }
    });
                
            $('#supplies').DataTable({
                "paging": true,
                "lengthChange": false,
                "pageLength": 15,
                "searching": true,
                "oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
            });
            });
        </script>