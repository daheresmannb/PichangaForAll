@extends('layouts.app')
@extends('funcionesjs')
@section('registro')

@if(session('respuesta'))
    <?php 
        $resp = session('respuesta');
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
  html { background: url(https://thenewcode.com/assets/images/polina.jpg) #000 no-repeat center center fixed; }
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
   
<!--fin de documentos de videos-->

<!--inicio de formulario de registro -->

              <div class="container" style="background: transparent;">

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                          <div class="form-top">
                            <div class="form-top-left">
                              <h2>Registro de Usuarios</h2>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-key"></i>
                            </div>
                            </div>
                            
            <div class="form-bottom">



{!! Form::open(['route' => array('usuario.crear', ), 'autocomplete' => 'off']) !!}
<div class="form-horizontal">
 {!! Form::label('nombre','Nombre')  !!}
 {!! Form::text(
  'name',
  null,[
    'class' => 'form-control',
    'placeholder' => 'nombre',
    'required'
  ]
 )!!}

</div>

<div class="form-horizontal">
 {!! Form::label('email','email')  !!}
 {!! Form::text('email',
    null,['class' => 'form-control',
              'placeholder' =>'email',
              'required'])!!}

</div>

<div class="form-horizontal">
{!! Form::label('password') !!}
{!! Form::password(
  'password',[
  'class' => 'form-control',
  'name'=>'password',
  'autocomplete'=>'new-password',
  'placeholder' => 'Password',
  'type' => 'password'
  ])
!!}                        
</div>

<div class="form-horizontal">
{!! Form::label('re-password') !!}
{!! Form::password(
  'password2',[
  'class' => 'form-control',
  'name'=>'password2',
  'autocomplete'=>'new-password',
  'placeholder' => 'Password2',
  'type' => 'password'
  ])
!!}                        
</div>

 <span class="help-block"></span>
                    
        <button id="Registrar" class="btn btn-lg btn-primary btn-block" type="submit">
          Registrar
        </button>
{!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>


        {!! Html::script('assets2/js/jquery-1.11.1.min.js'); !!}
        {!! Html::script('assets2/bootstrap/js/bootstrap.min.js'); !!}
        {!! Html::script('assets2/js/jquery.backstretch.min.js'); !!}
        {!! Html::script('assets2/js/scripts.js'); !!}
@endsection