@extends('funcionesjs')
<script type="text/javascript">
	function cargar_partidos() {
		$.ajax({
					type: 'POST',
					url:  "<?php echo url('partido/obtener'); ?>",
					headers: {
						'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
					},
					data: {
						_token: "<?php echo csrf_token(); ?>"
					},
					success: function(data) {
						console.log(data.respuesta);

						$("#conttabla").empty();
						for (var i = data.respuesta.length - 1; i >= 0; i--) {
							$("#conttabla").append(
								"<tr><td>"+data.respuesta[i].nombre_partido+"</td><td>"+data.respuesta[i].inicio+"</td><td>"+data.respuesta[i].termino+"</td><td>"+data.respuesta[i].numjugadores+"</td><td>"+data.respuesta[i].created_at+"</td><td>"+data.respuesta[i].updated_at+"</td><td><button value='"+data.respuesta[i].id+"' onclick='sumar_a_partido(value)' class='btn btn-primary btn-xs' type='button' name='button'> unirse </button> </td> </tr>"
							);
						}

					},
					error: function(xhr, textStatus, thrownError) {
						console.log(thrownError +"error "+ textStatus);
					}
			});
	}


function sumar_a_partido(partidoid) {
	console.log("caca: "+partidoid);
	console.log("caca: "+"<?php echo Auth::user()->id; ?>");
	$.ajax({
				type: 'POST',
				url:  "<?php echo url('partido/sumarse'); ?>",
				headers: {
					'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
				},
				data: {
					_token: "<?php echo csrf_token(); ?>",
					partido_id: partidoid,
					jugador_id: "<?php echo Auth::user()->id; ?>"
				},
				success: function(data) {
						alert("Te has sumado al partido!");
				},
				error: function(xhr, textStatus, thrownError) {
					alert("no pasa naa");
					console.log(thrownError +"error "+ textStatus);
				}
		});
}
$(document).ready(
	function() {
		cargar_partidos();
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
<div class="center-block" align="center">
<div id="contus" class="container center-block">
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-futbol-o">Partidos disponibles</i></div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>nombre de partido</th>
							<th>inicio</th>
							<th>termino</th>
							<th>n°jugadores</th>
							<th>creado</th>
							<th>actualizado</th>
							<th>accion</th>
						</tr>
					</thead>
					<tbody id="conttabla">

					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted"></div>
	</div>
<div style="background-color: #fbfbfb;" >
	<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 text">
			<h4><strong>Crea tu Partido</strong></h4>
		</div>
	</div>
 	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 form-box" class="card"  >
			<div class="form-group row">


{!! Form::open(['route' => array('partido.crear', )]) !!}
<input type="hidden" id="recinto_id" name="recinto_id">
<div class="form-horizontal row">
<label class="col-md-6 col">nombre del partido</label>
<input type="text" name="nombre_partido" class="col-md-6 col">
	<label class="col-md-6 col">seleccione recinto</label>
	<select class="selectpicker" id="listrecinto" name="nombre">
		<option value="0">waaa</option>
	</select>
</div>
<div class="form-horizontal row" style="padding-top: 10px">
	<label class="col-md-6 col">fecha y hora de inicio</label>
	<input id="partidotime" name="inicio" class="col-md-6 col">
</div>
<div class="form-horizontal row" style="padding-top: 10px">
	<label class="col-md-6 col">fecha y hora de termino</label>
	<input id="partidotime2" name="termino" class="col-md-6 col">
	<script>
		$("#partidotime").datetimepicker({
			autoclose: true
		});
    $("#partidotime2").datetimepicker({
      autoclose: true
    });

	</script>
</div>
<span class="help-block"></span>
<div class="form-horizontal row" style="padding-top: 10px">
<label class="col-md-6 col">numero de jugadores</label>
 <input type="number" name="numjugadores" min="6" max="20" step="2"  required="required" class="col-md-6 col">
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
</div>
</div>
