<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>PichangaForAll</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    {!! Html::style('assets/css/bootstrap.min.css'); !!}
    {!! Html::style('assets/css/bootstrap.css'); !!}
    {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('assets/js/bootstrap.min.js'); !!}


    {!! Html::style('admin/assets/css/animate.min.css'); !!}
    {!! Html::style('admin/assets/css/paper-dashboard.css'); !!}
    {!! Html::style('admin/assets/css/font-awesome.min.css'); !!}
    {!! Html::style('admin/assets/css/font1.css'); !!}
    {!! Html::style('admin/assets/css/themify-icons.css'); !!}

    {!! Html::script('assets/js/jquery.min.js'); !!}
</head>
<body>
    @yield('funcionesjs')
    <div class="wrapper">
        @yield('sidebar')
        <div class="main-panel">
            @yield('navbar')
            <div class="content">

                <div id="content" class="container-fluid">
                    @yield('contenido')
                    @yield('contenido')
                </div>
            </div>
        </div>
    </div>
    <div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <button type="button" id="cerrar" class="close" aria-hidden="true">&times;</button>
  <h1>Datos del Jugador</h1>
  <button id="">ver perfil</button>     
</div>
    {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('admin/assets/js/bootstrap.min.js'); !!}
    {!! Html::script('admin/assets/js/chartist.min.js'); !!}
    {!! Html::script('admin/assets/js/bootstrap-notify.js'); !!}
    {!! Html::script('admin/assets/js/paper-dashboard.js'); !!}
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titulomodal" class="modal-title"></h4>
                </div>
                <div id="textmodal" class="modal-body  justify-content-center" >
                </div> 
                <div class="modal-footer">
                    <button id='confirma-del' value='' class='btn btn-danger'>Confirmar</button>
                    <button id="confirmamodal" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>