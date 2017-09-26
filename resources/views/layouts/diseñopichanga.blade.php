<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>PichangaForAll</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    {!! Html::style('admin/assets/css/bootstrap.min.css'); !!}
    {!! Html::style('admin/assets/css/animate.min.css'); !!}
    {!! Html::style('admin/assets/css/paper-dashboard.css'); !!}
    {!! Html::style('admin/assets/css/font-awesome.min.css'); !!}
    {!! Html::style('admin/assets/css/font1.css'); !!}
    {!! Html::style('admin/assets/css/themify-icons.css'); !!}
</head>
<body>
    {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    <div class="wrapper">
        @yield('sidebar')
        <div class="main-panel">
            @yield('navbar')
            <div class="content">
                <div id="content" class="container-fluid">
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
</body>
    {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('admin/assets/js/bootstrap.min.js'); !!}
    {!! Html::script('admin/assets/js/chartist.min.js'); !!}
    {!! Html::script('admin/assets/js/bootstrap-notify.js'); !!}
    {!! Html::script('admin/assets/js/paper-dashboard.js'); !!}
</html>