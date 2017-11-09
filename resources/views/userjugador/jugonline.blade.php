@extends('layouts.diseñopichanga')
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
      			$("#rowcont").empty();
      			for (var i = data.respuesta.length - 1; i >= 0; i--) {
      				var nombre = data.respuesta[i].user.name;
      				nombre = nombre.split(" ",1);
      				console.log(data.respuesta);
      				$("#rowcont").append(
      					"<div style='word-wrap: break-word' class='col-xs-6 col-sm-3 col-md-3 col-lg-3'><div class='thumbnail'><div class='caption'><div class='col-lg-6'></div><div style='word-wrap: break-word' class='col-lg-6 well well-add-card'><h4>"+nombre+"</h4></div><button type='button' class='btn btn-danger btn-xs btn-update btn-add-card'>ver perfil</button><span class='glyphicon glyphicon-exclamation-sign text-danger pull-right '></span></div></div></div>"
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

 <div style="padding-left: 10%; padding-right: 10%;" class="container" id="tourpackages-carousel">

 		<div class="col-lg-6">
        	<h4>Jugadores en Linea</h4>
        </div>
      <div id="rowcont"  class="row">

      </div><!-- End row -->
    </div><!-- End container -->