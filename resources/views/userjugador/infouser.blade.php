@extends('layouts.app')
@extends('funcionesjs')
@section('infouser')

<div>nombe , apeliido,email, telefono</div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Informacion de usuario</strong> </h1>
             
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3>Informacion  de Usuario</h3>
                                <p>
                                        Actualizar
                                    </p>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-key"></i>
                            </div>
                            </div>
                            <div class="form-bottom">

								{!! Form::open(['route' => array('usuario.infoUser', ), 'autocomplete' => 'off']) !!}
								<div class="form-horizontal">
 								{!! Form::label('nombre','Nombre')  !!}
 								{!! Form::text(
  											'name',
  											null,[
    										'class' => 'form-control',
    										'placeholder' => 'nombre',
    										'required'
  											])!!}
								</div>

							<div class="form-horizontal">
 								{!! Form::label('apelido','apellido')  !!}
 									{!! Form::text('apelido',
        					null,['class' => 'form-control',
              					'placeholder' =>'apellido',
            					'required'])!!}
							</div>

						<div class="form-horizontal">
 					{!! Form::label('email','email')  !!}
 				{!! Form::text('email',
    			null,['class' => 'form-control',
              			'placeholder' =>'email',
              			'required'])!!}
						</div>

				<div class="form-horizontal">
 {!! Form::label('telefono','telefono')  !!}
 {!! Form::text('telefono',
    null,['class' => 'form-control',
              'placeholder' =>'telefono',
              'required'])!!}
				</div>

			<div class="form-horizontal">
				{!! Form::label('Contraseña') !!}
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
				{!! Form::label('Confirmar COntraseña') !!}
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
     'Actualizar',
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
@endsection