@extends('layouts.app')
@extends('funciones.js')
@section('registro')



{!! Form::open(['route' => 'regusuarios','method'=> 'POST']) !!}

<div class="Form-group">
 {!! Form::label('nombre','Nombre')  !!}
 {!! Form::text(
 	'nombre',
 	null,[
 		'class' => 'form-control',
 		'placeholder' => 'nombre',
 		'required'
 	]
 )!!}

</div>

<div class="Form-group">
 {!! Form::label('apelido','apelido')  !!}
 {!! Form::text('apelido',null,['class' => 'form-control','placeholder' =>'apellido','required'])!!}

</div>

<div class="Form-group">
 {!! Form::label('email','email')  !!}
 {!! Form::email('email',null,['class' => 'form-control','placeholder' =>'email','required'])!!}

</div>


<div class="Form-group">
 {!! Form::label('password','password')  !!}
 {!! Form::password('password',null,['class' => 'form-control','required'])!!}

</div>

<div class="Form-group">
  {!! Form::submit('Registrar',['class' => 'btn btn-primary'])!!}

</div>



{!! Form::close() !!}

@endsection