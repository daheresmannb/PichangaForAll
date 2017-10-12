@extends('layouts.diseñopichanga')
@extends('funcionesjs')
@section('infouser')


<div class="container-fluid" style="display:inline-block; padding: 5% 5% 5% 5%;">
	<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Informacion de usuario</strong> </h1>
             
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                          <div class="form-top">
                            </div>

<div>Auth::user()->id</div>
                             
                            <div class="form-bottom">

				{!! Form::open(['route' => array('infoUser.actualizar', )]) !!}
								
								{!! Form::hidden(
   												'id_user',
   												Auth::user()->id,
   												array(
       												'id' => 'id_user',
       												'name' => 'id_user')
								)!!}


								<div class="form-horizontal">
 								{!! Form::label('nombre','nombre')  !!}
 								{!! Form::text(
  											'nombre',
  											null,[
  											'id'=>'nombre',
    										'class' => 'form-control',
    										Auth::user()-> nombre,
    										'required'
  											])!!}
								</div>

								<div class="form-horizontal">
 								{!! Form::label('apellido','apellido')  !!}
 									{!! Form::text('apellido',
        							null,[
        							'id'=>'apellido',
        							'class' => 'form-control',
              						'placeholder' =>'apellido',
            						'required'])
            					!!}
								</div>

								<div class="form-horizontal">
 								{!! Form::label('email','email')  !!}
 								{!! Form::text('email',
    									null,[
    									'id'=>'email',
    									'class' => 'form-control',
              							'placeholder' =>'email',
              							'required'])
              					!!}
								</div>

								<div class="form-horizontal">
 								{!! Form::label('telefono','telefono')  !!}
 								{!! Form::text('telefono',
    									null,[
    									'id'=>'telefono',
    									'class' => 'form-control',
              							'placeholder' =>'telefono',
              							'required'])
              							!!}
								</div>

								<div class="form-horizontal">
   								{!! Form::submit(
     										'Actualizar',
     										array(
       										'class'=>'btn btn-primary btn-lg btn-block'))
   								!!}
								</div>
				{!! Form::close() !!}



                        
                        </div><!--fin de containr botton-->
                        </div>
       </div>
</div>
                    
@endsection