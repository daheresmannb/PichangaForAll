@extends('layouts.diseñopichanga')
@extends('funcionesjs')

<script type="text/javascript">
$(document).ready(
	function() {
		$("#listrecinto").change(
			function () {
				$("#recinto_id").val(
					$('#listrecinto').find(":selected").val()
				);
				$("#recinto_id:text").val(
					$('#listrecinto').find(":selected").val()
				);
			}
		);
		$.ajax({
      		type: 'POST',
      		url:  "<?php echo url('recinto/obtener'); ?>",
      		headers: {
      			'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
      		},
      		data: { 
        		_token: {
        			'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
        		}
      		},      
      		success: function(data) {
      			console.log(data.respuesta);
      			$("#listrecinto").empty();
      			for (var i = data.respuesta.length - 1; i >= 0; i--) {
      				$("#listrecinto").append(
      					"<option value='"+data.respuesta[i].id+"'>"+ data.respuesta[i].nombre +"</option>"
      				);
      			}      		
      		},
      		error: function(xhr, textStatus, thrownError) {
        		console.log(thrownError +"error "+ textStatus);
      		}
    	});
	}
);
</script>

{!!Html::style('assets/css/jquery.datetimepicker.min.css'); !!}
{!!Html::script('assets/js/jquery.datetimepicker.full.js'); !!}
<button id="ej">gg</button>
<div style="background-color: #fbfbfb;" class="card">
	<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 text">
			<h4><strong>Crea tu Partido</strong></h4>				 
		</div>
	</div>
 	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 form-box">                         
			<div class="form-group row">	
{!! Form::open(['route' => array('partido.crear', )]) !!}
<input type="hidden" id="recinto_id" name="recinto_id">
<div class="form-horizontal row">
	<label class="col-md-6 col">seleccione recinto</label>
	<select class="selectpicker" id="listrecinto" name="nombre">
		<option value="0">waaa</option>
	</select>
</div>
<span class="help-block"></span> 
<div class="form-horizontal row" >
	<label class="col-md-6 col">fecha y hora de inicio</label>
	<input id="partidotime" name="inicio" class="col-md-6 col">
</div>
<span class="help-block"></span>
<div class="form-horizontal row">
	<label class="col-md-6 col">fecha y hora de termino</label>
	<input id="partidotime2" name="termino" class="col-md-6 col">
	<script>
		$("input").datetimepicker({
			autoclose: true
		});
	</script>
</div>
<span class="help-block"></span>   
<div style="padding-top: 20px;" class="col-md-6 col-md-offset-3 ">
	<input  class="btn btn-primary  btn-block" type="submit" value="crearpartido" id="btnpartido">	 
</div>
{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
</div>