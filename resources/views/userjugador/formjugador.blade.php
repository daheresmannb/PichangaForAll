@extends('layouts.app')
@section('jugadorformulario')

<div class="container">

{!! Form::open(['route' => array('reg.jug', ), 'autocomplete' => 'off']) !!}
  
      
       <div class="form-group has-feedback">
         {!! Form::label('nombre') !!}
         {!! Form::text(
           'nombre',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'nombre',
             'placeholder'=>'nombre'
           ))
         !!}
        </div>
       <div class="form-group has-feedback">
         {!! Form::label('apellido') !!}
         {!! Form::text(
           'apellido',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'apellido',
             'placeholder'=>'apellido'
           ))
         !!}
        </div>
       <div class="form-group has-feedback">
         {!! Form::label('email') !!}
         {!! Form::text(
           'email',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'email',
             'placeholder'=>'email'
           ))
         !!}
        </div>
       <div class="form-group has-feedback">
         {!! Form::label('telefono') !!}
         {!! Form::text(
           'telefono',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'telefono',
             'placeholder'=>'telefono'
           ))
         !!}
        </div>   



<div class="form-group has-feedback" style="padding-left:35%; padding-right:35%; padding-top: 1%;">
   {!! Form::submit(
     'Registrar',
     array(
       'class'=>'btn btn-primary btn-lg btn-block'
     ))
   !!}
</div>
{!! Form::close() !!}

</div>

@endsection