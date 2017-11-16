@extends('funcionesjs')



<div class="container-fluid">  
	<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h3><strong>Informacion de usuario</strong> </h3>
             
                        </div>
  </div>
      
  <div>
       <div class="card" style="padding-bottom: 1%;">
              <div class="col-sm-6 col-sm-offset-3 form-box">                         
                      <div class="form">
                    				{!! Form::open(['route' => array('infouser.actualizar', )]) !!}
                    								
                    								{!! Form::hidden(
                       												'id_user',
                       												Auth::user()->id,
                       												array(
                           												'id' => 'id_user',
                           												'name' => 'id_user')
                    								)!!}
                   								
                     								{!! Form::label('ombre','Nombre')  !!}
                                    <input id="nombre" type="text" class="form-control" placeholder="nombre">
                    								<div class="form-horizontal">
                     								{!! Form::label('apellido','apellido')  !!}
                   									 <input id="apellido" type="text" class="form-control" placeholder="apellido">
                    								</div>

                    								<div class="form-horizontal">
                     								{!! Form::label('email','Email')  !!}
                     								{!! Form::text('email',
                        									null,[
                        									'id'=>'email',
                        									'class' => 'form-control',
                                  							'placeholder' =>'email',
                                  							'required'])
                                  					!!}
                    								</div>

                    								<div class="form-horizontal">
                     								{!! Form::label('telefono','Telefono')  !!}
                     								{!! Form::text('telefono',
                        									null,[
                        									'id'=>'telefono',
                        									'class' => 'form-control',
                                  							'placeholder' =>'telefono',
                                  							'required'])
                                  							!!}
                    								</div>           
                                    <span class="help-block"></span>                        
                                    
                    								<div class="col-md-6 col-md-offset-3 " style="padding: 30px">
                       								{!! Form::submit(
                         										'Actualizar',
                         										array(
                           										'class'=>'btn btn-primary btn-lg btn-block'))
                       								!!}
                    								</div>
                                    
                    				{!! Form::close() !!}

                    </div><!--fin de containr botton-->
              </div>
       </div><!--fin row-->

</div>
                    
