<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    {!! Html::style('assetsj/css/bootstrap.min.css'); !!}
    {!! Html::style('assetsj/css/style.default.css'); !!}
    {!! Html::style('assetsj/css/grasp_mobile_progress_circle-1.0.0.min.css'); !!}
    {!! Html::style('assetsj/css/custom.css'); !!}

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->

    {!! Html::style('assetsj/css/custom.css'); !!}

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
    {!! Html::script('assetsj/js/tether.min.js'); !!}
    {!! Html::script('assetsj/js/bootstrap.min.js'); !!}
    {!! Html::script('assetsj/js/jquery.cookie.js'); !!}
    {!! Html::script('assetsj/js/grasp_mobile_progress_circle-1.0.0.min.js'); !!}
    {!! Html::script('assetsj/js/jquery.nicescroll.min.js'); !!}
    {!! Html::script('assetsj/js/jquery.validate.min.js'); !!}

    {!! Html::script('assetsj/js/Chart.min.js'); !!}
    {!! Html::script('assetsj/js/charts-home.js'); !!}
    {!! Html::script('assetsj/js/front.js'); !!}
  </head>
  <body>
    @yield('funcionesjs')
    @yield('navbar')
    @yield('header')

    <div id="content" class="content">
      
    </div>
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

  </body>
</html>