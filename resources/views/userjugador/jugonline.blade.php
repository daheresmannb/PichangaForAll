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
      					"<div class='col-xl-3 col-sm-6 mb-3'><div class='card text-white bg-success o-hidden h-100'><div class='card-body'><div class='card-body-icon'><i class='fa fa-fw fa-comments'></i></div><div class='mr-5'>"+nombre+"</div></div><a class='card-footer text-white clearfix small z-1' href='#'><span class='float-left'></span><span class='float-right'><i class='fa fa-angle-right'></i></span></a></div></div>"
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

<div id="contus" class="container">
 <div style="" class="container" id="tourpackages-carousel">
 	<div class="col-lg-6">
        <h4>Jugadores en Linea</h4>
    </div>
    <div id="rowcont"  class="row">
    </div>
</div>
</div>

      <div class="row">

      </div>