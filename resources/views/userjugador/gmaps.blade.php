
 {!! Html::script('assets/js/jquery-3.2.1.js'); !!}
 {!! Html::script('assets/js/bootstrap.min.js'); !!}
{!! Html::style('assets/css/perfil_en_mapa.css'); !!}

<script type="text/javascript">
  $(document).ready(
      function(e) {
          $("#cerrar").click(
            function(e) {
                document.getElementById('light').style.display='none';
                document.getElementById('fade').style.display='none';
            }
          );
      }
  );
</script>


	<script type="text/javascript">
		var centreGot = false;
	</script>

<script type="text/javascript">
  
</script>
	{!! $map['js'] !!} 
	

{!! Form::open(['route' => array('latlng.dir',)]) !!}

<div class="form-group has-feedback">
    {!! Form::label('Direccion') !!}
    {!! Form::text(
            'direccion', 
            null, 
            array(
              'required', 
              'class'=>'form-control', 
              'id'=>'direccion',
              'name'=>'direccion'
            )) 
          !!}
</div>
<div class="form-group has-feedback" style="padding-left:3%; padding-right:35%; padding-top: 1%">
    {!! Form::submit(
      'Actualizar', 
      array(
        'class'=>'btn btn-primary btn-lg btn-block'
      ))
    !!}
</div>
{!! Form::close() !!}

{!! $map['html'] !!}





  
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <button id="cerrar">x</button>
  <h1>Datos del jugador</h1>     
</div>
  




