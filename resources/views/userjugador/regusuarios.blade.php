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
    
.stopfade { 
   opacity: .5;
}

#polina { 
  font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
  font-weight:300; 
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
  font-size: 1.6rem;
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



</script>





<!--empesada de formulario de registro -->




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
                              <h3>Registro de Usuarios</h3>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-key"></i>
                            </div>
                            </div>
                            <div class="form-bottom">



{!! Form::open(['route' => array('user.crear', ), 'autocomplete' => 'off']) !!}
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


<div class="form-horizontal">
   {!! Form::submit(
     'Registrar',
     array(
       'class'=>'btn btn-primary btn-lg btn-block'
     ))
   !!}
</div>


{!! Form::close() !!}

                        </div>
                        </div>
                    </div>
                </div>
            </div>




<!--
<div class="Form-group">
  
  <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> registrar
                                </button>

</div>
-->
<!-- fin de formulario registro-->


        {!! Html::script('assets2/js/jquery-1.11.1.min.js'); !!}
        {!! Html::script('assets2/bootstrap/js/bootstrap.min.js'); !!}
        {!! Html::script('assets2/js/jquery.backstretch.min.js'); !!}
        {!! Html::script('assets2/js/scripts.js'); !!}
@endsection