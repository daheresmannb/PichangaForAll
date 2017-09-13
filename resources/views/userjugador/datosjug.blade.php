@extends('layouts.app')
@section('datosjugador')

<div class="container">

{!! Form::open(['route' => array('datos.jug', ), 'autocomplete' => 'off']) !!}
  
      
       <div class="form-group has-feedback">
         {!! Form::label('Altura') !!}
         {!! Form::text(
           'Altura',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'Altura',
             'placeholder'=>'Altura'
           ))
         !!}
        </div>
               <div class="form-group has-feedback">
         {!! Form::label('peso') !!}
         {!! Form::text(
           'peso',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'peso',
             'placeholder'=>'peso'
           ))
         !!}
        </div>       <div class="form-group has-feedback">
         {!! Form::label('numero') !!}
         {!! Form::text(
           'numero',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'numero',
             'placeholder'=>'numero'
           ))
         !!}
        </div>       <div class="form-group has-feedback">
         {!! Form::label('posicion') !!}
         {!! Form::text(
           'posicion',
           null,
           array(
             'required',
             'class'=>'form-control',
             'name'=>'posicion',
             'placeholder'=>'posicion'
           ))
         !!}
        </div>




<div class="form-group has-feedback" style="padding-left:35%; padding-right:35%; padding-top: 1%;">
   {!! Form::submit(
     'actualzar',
     array(
       'class'=>'btn btn-primary btn-lg btn-block'
     ))
   !!}
</div>
{!! Form::close() !!}

</div>



@endsection