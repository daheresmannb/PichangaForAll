@extends('funcionesjs')

<script type="text/javascript">
$(document).ready(
	function(e) {
		$("#crearrecinto").click(
			function(e) {
				$.ajax({
           			type: "POST",
           			url:  "<?php echo url('recinto/crear'); ?>",
           			headers: {'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"},
           			data: {
           				_token: 		"<?php echo csrf_token(); ?>",  
           				id_encargado: 	"<?php echo Auth::user()->id ?>",
           				nombre: 		document.getElementById('nombre').value,
           				lat: 			marker.getPosition().lat(),
           				lon: 			marker.getPosition().lng()
           			},
           			success: function(data) {
   						alert(data.respuesta);

           			},
           			error: function(xhr, textStatus, thrownError) {
           				alert("error");
		           	}
       			});
			}
		);  
	}
);
</script>

<!--Script que carga el mapa-->
{!! Html::style('assets/css/perfil_en_mapa.css'); !!}
<!--estilos de mapa google-->
<style type="text/css">
#loader {
   position: absolute; 
   left: 30%; top: 10px; z-index: 100;
   display:inline-block;

}
.loader {
  
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 60px;
  height: 60px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<!--datos para cargar el mapa-->
<style>
  #map {
    height: 300px;
    width: 100%;
    margin: 0px;
    padding: 0px
  }
</style>
<div class="card" style="display:inline-block;">

</div>
<h1>Vista solo de administrador</h1>
<h2>Crear Recintos</h2>

<div class="container-fluid">  
					{!! Form::label('name','nombre de recinto')  !!}
					
					<input type="text" name="nombre" class="form-control" id="nombre" >

					 
            <div class="" style="display: inline-block; background-color: transparent; padding-bottom: 20px;">
            <button id="crearrecinto"  >Crear Recinto</button>
            </div>

{!! Html::style('assets/css/slider.css'); !!}
{!! Html::script('assets/js/slider.js'); !!}
<!--div contenedor de map-->
<div class="card" style="padding: 1% 1% 1% 1%;">
  <center>
  <div class="card">
    <div id="map"></div>
    <div id="lat"></div>
    <div id="lon"></div>
  </center>
  </div>
</div>
</div>
<!--JS de googlemaps key incorporada-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjpd08Tu7zozwrj3-Sb3RIBUv13gnY3SQ&callback=initMap" async defer>
</script>
<script type="text/javascript">
  var markers = new Array();
  var marks_coords = [];
  var markersArray = [];
  var mi_location;
  var map;
  var marker;

  function saltar() {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }

  function detenido() {
    marker.setAnimation(null);
  }

  function mostrarinfo2(titulo, texto) {
    $("#titulomodal").empty();
    $("#titulomodal").append("<p>"+titulo+"</p>");
    $("#textmodal").empty();
    $("#textmodal").append("<p>"+texto+"</p>");
    $("#confirma-del").hide();
    $('#myModal').modal('show');
      document.getElementById('light2').style.display='block';
      document.getElementById('fade2').style.display='block';
  }
  
  function initMap() {
    if (navigator.geolocation) { 
      navigator.geolocation.getCurrentPosition(
        function(position) { 
          mi_location = new google.maps.LatLng(
            position.coords.latitude, 
            position.coords.longitude
          );
          map = new google.maps.Map(
            document.getElementById('map'), {
              center: mi_location,
              zoom: 15,
              disableDefaultUI: true,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"},{"weight":0.9}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#44847f"},{"weight":0.7}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#55a29c"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#44847f"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#febb12"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#febb12"},{"lightness":-20}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#febb12"},{"lightness":-17}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#aaa69b"},{"lightness":-10},{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2d829d"}]
              }]
            }
          );

          marker = new google.maps.Marker({
            position: mi_location,
             draggable: true,
            animation: google.maps.Animation.BOUNCE,
            map: map,
            icon: "<?php echo url('assets/img/cancha.png'); ?>",
            title: 'Mi posicion'
          
          }); 

          marker.addListener('drag',toggleBounce);
          marker.addListener('mouseout', saltar);
          marker.addListener('mouseover', detenido);

//mostrador de posicion en texto
    var div  = document.getElementById("lat");  
    var text = div.textContent; 
    var div2 = document.getElementById("lon");
    var text = div2.textContent;
        }//function position
      );//fin navegador geolocalition 
    } //fin de IF
    else {
      alert("No se puede acceder a su localizacion");
    }
  }
//fin de iniciador de mapa
  	function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
          var div = document.getElementById("lat");  
    	  div.textContent = marker.getPosition().lat();  
    	  var div2 = document.getElementById("lon");  
    	  div2.textContent = marker.getPosition().lng();
        }
   	}
</script>
</div>     
