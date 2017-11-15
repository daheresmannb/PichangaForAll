@extends('funcionesjs')
<script type="text/javascript">
$(document).ready(
	function() {
		$.ajax({
      		type: 'POST',
      		url:  "<?php echo url('usuarioenlinea/obtener'); ?>",
      		headers: {
      			'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
      		},
      		data: {
        		_token: {
        			'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
        		}
      		},
      		success: function(data) {
						console.log(data);
      			$("#rowcont").empty();
						miid = "<?php echo Auth::user()->id; ?>";
      			for (var i = data.respuesta.length - 1; i >= 0; i--) {
      				var nombre = data.respuesta[i].user.name;
      				nombre = nombre.split(" ",1);
							id = data.respuesta[i].user.id;
      				console.log(data.respuesta);

							if (miid != id) {
								console.log(miid +"   "+ id);
								$("#rowcont").append(
	      					"<div class='col-xl-3 col-sm-6 mb-3'><div class='card text-white bg-success o-hidden h-100'><div class='card-body'><div class='card-body-icon'><i class='fa fa-fw fa-comments'></i></div><div class='mr-5'>"+nombre+"</div></div> <button id='n1' type='button' class='btn btn-primary btn-xs btn-block' value='"+id+"' onclick='SolAmistad(value)'> Agregar </button> </div></div>"
	      				);
							}
      			}
      		},
      		error: function(xhr, textStatus, thrownError) {
        		console.log(thrownError +"error "+ textStatus);
      		}
    	});
	}
);

function SolAmistad(amigo_id) {
	$.ajax({
				type: 'POST',
				url:  "<?php echo url('amigo/solicitud/enviar'); ?>",
				headers: {
					'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
				},
				data: {
					_token: "<?php echo csrf_token(); ?>",
					amigo_id: amigo_id,
					id: "<?php echo Auth::user()->id; ?>"
				},
				success: function(data) {
					console.log(data);
						if (data.errors == false) {
								if (data.respuesta == null) {
										alert("La solicitud de amistad ya ha sido enviada");
								}
						}
				},
				error: function(xhr, textStatus, thrownError) {
					console.log(thrownError +"error "+ textStatus);
				}
		});
}
</script>

<div id="contus" class="container">
 <div style="" class="container" id="tourpackages-carousel">
 	<div class="col-lg-6">
        <h4>Jugadores en Linea</h4>
				<br> <br>
    </div>
    <div id="rowcont"  class="row">
    </div>
</div>
</div>
