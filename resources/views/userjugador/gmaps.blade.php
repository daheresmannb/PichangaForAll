<script type="text/javascript">
  $("#loader").hide();
</script>
{!! Html::style('assets/css/perfil_en_mapa.css'); !!}
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

<script type="text/javascript">
  var km;

  $(document).ready(
      function(e) {
        
        $("#cerrar").click(
            function(e) {
                document.getElementById('light').style.display='none';
                document.getElementById('fade').style.display='none';
            }
        );

        $('#ex1').slider({
          formatter: function(value) {
              km = value;
              return 'Kilometros: ' + value;
          }
        });
      }
  );
</script>

<style>
  #map {
    height: 300px;
    width: 100%;
    margin: 0px;
    padding: 0px
  }
</style>
<br>
<div class="" style="background-color: transparent; display:inline-block; padding: 1% 1% 1% 1%; padding-top: 2%;">
  <h4><span>Buscar Jugadores Cercanos</span></h4>
</div>
<br>
<div class="card" style="display:inline-block;">
<div class="row">
  <div class="col-sm-8">
    <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="14"/>
  </div>
  <div class="col-sm-4">
    <button id="buscar_c" style="background: #66615b; text-shadow: #fff;" type="button" class="btn btn-default  btn-sm">Buscar</button>
  </div>
</div>
</div>

<div id="esperando" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src="{{ url('assets/img/loader_1.gif') }}" width="64" height="64" /><br>Loading..</div>

{!! Html::style('assets/css/slider.css'); !!}
{!! Html::script('assets/js/slider.js'); !!}

<div class="card" style="padding: 1% 1% 1% 1%;">
  <center>
    <div id="map"></div>
  </center>
</div>
    

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjpd08Tu7zozwrj3-Sb3RIBUv13gnY3SQ&callback=initMap" async defer>
</script>
<script type="text/javascript">
  var markers = new Array();
  var marks_coords = [];
  var lat = "-38.738806";
  var lon = "-72.597354";
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

  function mostrarinfo(idd) {
    $.ajax({
      type: 'POST',
      url:  "<?php echo url('jugador/obtener'); ?>",
      headers: {'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"},
      data: {
        id: idd, 
        _token: {'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"}
      },      
      success: function(data) {
        var dis;
        if(data.respuesta.disponible == true) {
          dis = "Disponible";
        } else {
          dis = "No Disponible";
        }
        $("#cuerpo").empty();
        $("#cuerpo").append(
          "<p>Apodo: "+data.respuesta.apodo+"</p><br>"+
          "<p>Edad: "+data.respuesta.edad+"</p><br>"+
          "<p>Estatura: "+data.respuesta.estatura+"</p><br>"+
          "<p>Peso: "+data.respuesta.peso+"</p><br>"+
          "<p>Posicion: "+data.respuesta.posicion+"</p><br>"+
          "<p>Disponible para jugar: "+dis+"</p>"
        );
        document.getElementById('light').style.display='block';
  
      },
      error: function(xhr, textStatus, thrownError) {
       
        alert(thrownError +"error "+ textStatus);
      }
    });
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
            animation: google.maps.Animation.BOUNCE,
            map: map,
            icon: "<?php echo url('assets/img/jugador2.png'); ?>",
            title: 'Mi posicion'
          }); 
          marker.addListener('mouseout', saltar);
          marker.addListener('mouseover', detenido);
          marker.addListener('click', mostrarinfo);

          google.maps.event.addDomListener(
            document.getElementById('buscar_c'),
            'click',
            JugadoresC
          );

        }
      ); 
    } else {
      alert("No se puede acceder a su localizacion");
    }
  }

function autoUpdate() {
  navigator.geolocation.getCurrentPosition(
    function(position) {  
      var newPoint = new google.maps.LatLng(
        position.coords.latitude, 
        position.coords.longitude
      );

      if (marker) {
        marker.setPosition(newPoint);
      } else {
        marker = new google.maps.Marker({
          position: newPoint,
          map: map,
          title: 'Mi posicion'
        });
      }
    //map.setCenter(newPoint);
    }
  ); 
  setTimeout(autoUpdate, 2000);
}

autoUpdate();

</script>

<script type="text/javascript">
   function JugadoresC() {

    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
    }
        
    markers = new Array(); 
    $("#loader").show();
    if (navigator.geolocation) { 
      navigator.geolocation.getCurrentPosition(
        function(position) {
          $.ajax({
            type: 'POST',
            url:  "<?php echo url('jugadores/cercanos'); ?>",
            headers: {'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"},
            data: {
              latitud: position.coords.latitude, 
              longitud: position.coords.longitude, 
              radio: km, 
              _token: {'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"}
            },      
            success: function(data) {
              $("#loader").hide();
              if(data.respuesta.length != 0) {
                for (var i = data.respuesta.length - 1; i >= 0; i--) {
                  var marker = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(
                      data.respuesta[i].latitud, 
                      data.respuesta[i].longitud
                    ),
                    icon: "<?php echo url('assets/img/jugador3.png'); ?>",
                    id: data.respuesta[i].id
                  });

                  marker.addListener(
                    'click', 
                    function () {
                      mostrarinfo(data.respuesta[i].jugador_id);
                    }
                  );
                   markers['jugadorescercanos'].push(markers);
                  markers.push(markers);
                }
              } else {
                mostrarinfo2(
                  "Respuesta", 
                  "No se encontraron jugadores cercanos en un radio de " + km
                );
              }
            },
            error: function(xhr, textStatus, thrownError) {
              $("#loader").hide();
              alert("no hay conexion a internet");
            }
          });
        }
      );
    } 
  }
</script>


<div id="loader">
  <div class="loader"></div>
</div>

