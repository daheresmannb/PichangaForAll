@extends('layouts.app')
@extends('funcionesjs')
@section('login')

@if(session('respuesta'))
    <?php 
        $resp = session('respuesta');
    ?>
    <script type="text/javascript">
        $(document).ready(
            function(e) {
                InfoModal(
                    "Respuesta",
                    "<?php echo $resp['msg'];?>"
                );
            }
        );
    </script>
@endif

{!! Html::style('assets2/bootstrap/css/bootstrap.min.css'); !!}

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

{!! Html::style('assets2/font-awesome/css/font-awesome.min.css'); !!}
{!! Html::style('assets2/font-awesome/css/font-awesome.css'); !!}

{!! Html::style('assets2/css/form-elements.css'); !!}
{!! Html::style('assets2/css/style.css'); !!}


    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


<style type="text/css">
    
    video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
  background-size: cover;
  transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}

#polina { 
  font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
  font-weight:100; 
  background: rgba(0,0,0,0.3);
  color: white;
  padding: 2rem;
  width: 33%;
  margin:2rem;
  float: right;
  font-size: 1.2rem;
}
h1 {
  font-size: 3rem;
  text-transform: uppercase;
  margin-top: 0;
  letter-spacing: .3rem;
}
#polina button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: #fff;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
}

a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  background:rgba(0,0,0,0.5);
  padding: .5rem;
  transition: .6s background; 
}
a:hover{
  background:rgba(0,0,0,0.9);
}
@media screen and (max-width: 500px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 800px) {
  html { background: url(https://thenewcode.com/assets/images/polina.jpg) #000 no-repeat center center fixed; }
  #bgvid { display: none; }
}
</style>
        <div class="top-content" style="background: rgba(98,125,77,1);
background: -moz-linear-gradient(left, rgba(98,125,77,1) 0%, rgba(31,59,8,0.76) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(98,125,77,1)), color-stop(100%, rgba(31,59,8,0.76)));
background: -webkit-linear-gradient(left, rgba(98,125,77,1) 0%, rgba(31,59,8,0.76) 100%);
background: -o-linear-gradient(left, rgba(98,125,77,1) 0%, rgba(31,59,8,0.76) 100%);
background: -ms-linear-gradient(left, rgba(98,125,77,1) 0%, rgba(31,59,8,0.76) 100%);
background: linear-gradient(to right, rgba(98,125,77,1) 0%, rgba(31,59,8,0.76) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#627d4d', endColorstr='#1f3b08', GradientType=1 );">
<script type="text/javascript">
    var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#polina button");

if (window.matchMedia('(prefers-reduced-motion)').matches) {
    vid.removeAttribute("autoplay");
    vid.pause();
    pauseButton.innerHTML = "Paused";
}

function vidFade() {
  vid.classList.add("stopfade");
}

vid.addEventListener('ended', function()
{
// only functional if "loop" is removed 
vid.pause();
// to capture IE10
vidFade();
}); 


pauseButton.addEventListener("click", function() {
  vid.classList.toggle("stopfade");
  if (vid.paused) {
    vid.play();
    pauseButton.innerHTML = "Pause";
  } else {
    vid.pause();
    pauseButton.innerHTML = "Paused";
  }
})

</script>

<video poster="{{ url('video/fondolog.mp4') }}" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="{{ url('video/fondolog.mp4') }}" type="video/webm">
<source src="{{ url('video/fondolog.mp4') }}" type="video/mp4">
</video>
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>PichangaForAll</strong> </h1>
             
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Inicio de sesion</h3>
                            		<p>
                                        Ingresa el correo, y contraseña asociado a tu cuenta:
                                    </p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">


                                <form role="form" action="{{ url('/signin') }}" method="POST" class="form-horizontal">
                                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recordar cuenta
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> iniciar
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvidaste tu contraseña?</a>
                            </div>
                        </div>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>Inicia con redes sociales:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        {!! Html::script('assets2/js/jquery-1.11.1.min.js'); !!}
        {!! Html::script('assets2/bootstrap/js/bootstrap.min.js'); !!}
        {!! Html::script('assets2/js/jquery.backstretch.min.js'); !!}
        {!! Html::script('assets2/js/scripts.js'); !!}
@endsection