
@section('con')

{!! Html::style('assets/css/perfil_en_mapa.css'); !!}

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
<div class="card" style="display:inline-block; padding: 1% 1% 1% 1%;">
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

{!! Html::script('assets/js/jquery-3.2.1.js'); !!}
{!! Html::script('assets/js/jquery.min.js'); !!}
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
  var marks_coords = [];
  var lat = "-38.738806";
  var lon = "-72.597354";
  var markersArray = [];
  var mi_location;
  var map;
  var marker;

  function JugadoresC() {
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
              if(data.respuesta.length != 0) {
                for (var i = data.respuesta.length - 1; i >= 0; i--) {
                  alert(data.respuesta[i].id);
                  console.log(data.respuesta[i].id);
                  console.log(data.respuesta[i].latitud);
                  console.log(data.respuesta[i].longitud);
                }
              } else {
                InfoModal("No hay jugadores en un radio de " + km + "Km");
                alert("No hay jugadores en un radio de " + km + "Km");
              }
            },
            error: function(xhr, textStatus, thrownError) {
              alert("no hay conexion a internet");
            }
          });
        }
      );
    } 
/*
    

    marks_coords.push(
       new google.maps.LatLng(60.32522, 19.07002)
    );
*/
  }

  function saltar() {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }

  function detenido() {
    marker.setAnimation(null);
  }

  function mostrarinfo() {
      document.getElementById('light').style.display='block';
      document.getElementById('fade').style.display='block';
  }

function addMarkers(filterType) {
    
    var temp = [];
    
    markers['jugadores'] = new Array();
    
    for (var i = 0; i < temp.length; i++) {
        
        var marker = new google.maps.Marker({
            map: map,
            position: temp[i]
        });
        
        markers['jugadores'].push(marker);
    }
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





















@endsection






<script type="text/javascript">
  
var map;
var markers = new Array();

var coords_1 = [
    new google.maps.LatLng(60.32522, 19.07002),
    new google.maps.LatLng(60.45522, 19.12002),
    new google.maps.LatLng(60.86522, 19.35002),
    new google.maps.LatLng(60.77522, 19.88002),
    new google.maps.LatLng(60.36344, 19.36346),
    new google.maps.LatLng(60.56562, 19.33002)];

var coords_2 = [
    new google.maps.LatLng(59.32522, 18.07002),
    new google.maps.LatLng(59.45522, 18.12002),
    new google.maps.LatLng(59.86522, 18.35002),
    new google.maps.LatLng(59.77522, 18.88002),
    new google.maps.LatLng(59.36344, 18.36346),
    new google.maps.LatLng(59.56562, 18.33002)];

function initialize() {
    
    var mapOptions = {
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: new google.maps.LatLng(59.76522, 18.35002)
    };
    
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    
    $('button').on('click', function() {
        
        if ($(this).data('action') === 'add') {
            
            addMarkers($(this).data('filtertype'));
            
        } else {
            
            removeMarkers($(this).data('filtertype'));
        }
    });
}

function addMarkers(filterType) {
    
    var temp = filterType === 'coords_1' ? coords_1 : coords_2;
    
    markers[filterType] = new Array();
    
    for (var i = 0; i < temp.length; i++) {
        
        var marker = new google.maps.Marker({
            map: map,
            position: temp[i]
        });
        
        markers[filterType].push(marker);
    }
}

function removeMarkers(filterType) {
    
    for (var i = 0; i < markers[filterType].length; i++) {
        
        markers[filterType][i].setMap(null);
    }
}

initialize();

</script>