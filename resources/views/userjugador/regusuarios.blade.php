@extends('layouts.app')
@extends('funcionesjs')
@section('registro')

@if(session('respuesta'))
  <?php 
    $resp = session('respuesta');

    if ($resp['errors'] == false) {
      ?>
        <script type="text/javascript">
          $(document).ready(
            function(e) {
              InfoModal(
                "Respuesta",
                "Registro exitoso"
              );
            }
          );
        </script>
      <?php
    } else {
      ?>
        <script type="text/javascript">
          $(document).ready(
            function(e) {
              InfoModal(
                "Respuesta",
                "<?php echo $resp['respuesta'];?>"
              );
            }
          );
        </script>
      <?php
    }
  ?>
@endif

{!! Html::style('assets2/font-awesome/css/font-awesome.min.css'); !!}
{!! Html::style('assets2/font-awesome/css/font-awesome.css'); !!}
{!! Html::style('assets2/css/form-elements.css'); !!}
{!! Html::style('assets2/css/style.css'); !!}

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


<style type="text/css">
  body {
    background: transparent;
  }
  
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
    html { 
      background: url(https://thenewcode.com/assets/images/polina.jpg) #000 no-repeat center center fixed; 
    }
  
  #bgvid { display: none; }
}
</style>

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

  vid.addEventListener(
    'ended', 
    function() {
      vid.pause();
      vidFade();
    }
  ); 

  pauseButton.addEventListener(
    "click", 
    function() {
      vid.classList.toggle("stopfade");
      if (vid.paused) {
        vid.play();
        pauseButton.innerHTML = "Pause";
      } else {
        vid.pause();
        pauseButton.innerHTML = "Paused";
      }
    }
  );
</script>

<video poster="{{ url('video/fondolog.mp4') }}" id="bgvid" playsinline autoplay muted loop>
<source src="{{ url('video/fondolog.mp4') }}" type="video/webm">
<source src="{{ url('video/fondolog.mp4') }}" type="video/mp4">
</video>
<!-- inicio formulario -->
<div class="container" style="background: transparent;">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
      <div class="form-top">      
        <div class="row">
          <div class="col-sm-6">       
            <h3>Registrar o Iniciar: </h3>
          </div>
          <div class="col-sm-6">
          <br>
          <span class="help-block"></span>
            <a href="{{ url('/login') }}" class="btn btn-block btn-social btn-twitter">
              <span class="fa fa-futbol-o"></span> 
              Iniciar
            </a>
          </div>
        </div>
      </div>
      <div class="form-bottom">
        <form role="form" action="{{ url('/usuario/crear') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <!-- nombreeee -->
          <div style="height: 35px;" class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span style="height: 35px;" class="input-group-addon">
              <i class="fa fa-futbol-o"></i>
            </span>
            <input style="height: 35px;" id="name" type="text" class="form-control" name="name" placeholder="nombre">    
          </div>
          <span class="help-block"></span>

          <!-- correo -->
          <div style="height: 35px;" class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span style="height: 35px;" class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <input style="height: 35px;" id="email" type="email" class="form-control" name="email" placeholder="correo">
            @if ($errors->has('email'))
              <span class="help-block">
                <strong>
                  {{ $errors->first('email') }}
                </strong>
              </span>
            @endif       
          </div>
          <span class="help-block"></span>
          <!-- password -->
          <div style="height: 35px;" class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <span style="height: 35px;" class="input-group-addon">
              <i class="fa fa-lock"></i>
            </span>
            <input style="height: 35px;" id="password" type="password" class="form-control" name="password" placeholder="password">
            @if ($errors->has('password'))                      
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div> 
          <span class="help-block"></span>
          <!-- confirmacion pasword -->
          <div style="height: 35px;" class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <span style="height: 35px;" class="input-group-addon">
              <i class="fa fa-lock"></i>
            </span>
            <input style="height: 35px;" id="password2" type="password" class="form-control" name="password2" placeholder="confirmacion password">
            @if ($errors->has('password'))                      
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div> 
          <span class="help-block"></span>
                    
          <button id="registrar" class="btn btn-lg btn-primary btn-block" type="submit">
            Registrar
          </button>                      
        </form>
      </div>
    </div>
  </div>
</div>
        {!! Html::script('assets2/js/jquery-1.11.1.min.js'); !!}
        {!! Html::script('assets2/bootstrap/js/bootstrap.min.js'); !!}
        {!! Html::script('assets2/js/jquery.backstretch.min.js'); !!}
        {!! Html::script('assets2/js/scripts.js'); !!}
@endsection