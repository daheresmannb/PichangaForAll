<!DOCTYPE Html>
<Html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PichangaForAll</title>
     <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Fonts -->
    {!! Html::style('assets/css/font-awesome.min.css'); !!}
    <!-- Styles -->
    {!! Html::style('assets/css/bootstrap.min.css'); !!}
    {!! Html::style('assets/css/style.css'); !!}
    {!! Html::style('assets/css/bootstrap.css'); !!}
        {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('assets/js/bootstrap.min.js'); !!}

   {{ HTML::style('css/busqueda.css') }}
   {{ HTML::script('js/busqueda.js') }}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="application/x-javascript"> 
        addEventListener(
            "load", 
            function() { 
                setTimeout(hideURLbar, 0); 
            }, 
            false
        ); 
        function hideURLbar() { 
            window.scrollTo(0,1); 
        } 
    </script>
    {!! Html::script('assets/js/move-top.js'); !!}
    {!! Html::script('assets/js/easing.js'); !!}

    <script type="text/javascript">
        jQuery(document).ready(
            function($) {
                $(".scroll").click(
                    function(event){     
                        event.preventDefault();
                        $('Html,body').animate({
                            scrollTop:$(this.hash).offset().top
                        },1000);
                    }
                );
            }
        );
    </script>
<!-- start-smoth-scrolling -->
<!-- animated-css -->
    {!! Html::style('assets/css/animate.css'); !!}
    {!! Html::script('assets/js/wow.min.js'); !!}
    <script>
        new WOW().init();
    </script>

</head>
<body>
    @yield('funcionesjs')
    @yield('header')
    @yield('banner')
    @yield('servicios')
    @yield('portafolio')
    @yield('acerca')
    @yield('habilidades')
    @yield('contacto')
    @yield('footer')
    @yield('login')
    @yield('content')
    @yield('jugadoresporlista')
    @yield('jugadorformulario')
    @yield('datosjugador')
    @yield('busquedajugador')
    @yield('registro')
    @yield('infouser')
    @yield('creacapeonato')

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
</Html>
