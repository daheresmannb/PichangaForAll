<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PichangaForAll</title>
     <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Fonts -->
    {!! Html::style('assets/css/font-awesome.min.css'); !!}
    <!-- Styles -->
    {!! Html::style('assets/css/boostrap.min.css'); !!}
    {!! Html::style('assets/css/style.css'); !!}
    {!! Html::style('assets/css/bootstrap.css'); !!}
        {!! HTML::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('assets/js/boostrap.min.js'); !!}

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
    {!! HTML::script('assets/js/move-top.js'); !!}
    {!! HTML::script('assets/js/easing.js'); !!}

    <script type="text/javascript">
        jQuery(document).ready(
            function($) {
                $(".scroll").click(
                    function(event){     
                        event.preventDefault();
                        $('html,body').animate({
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
    @yield('header')
    @yield('banner')
    @yield('servicios')
    @yield('portafolio')
    @yield('acerca')
    @yield('habilidades')
    @yield('contacto')
    @yield('footer')
    @yield('login')

</body>
</html>
