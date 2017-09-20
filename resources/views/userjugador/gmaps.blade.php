@if(session('respuesta'))
    <?php 
        $resp = session('respuesta');
    ?>

    <script type="text/javascript">
        alert("respuestaaaa!!!");
    </script>
@endif

<button id="ej"> addd</button>

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

    <style>
       #map {
        height: 370px;
        width: 100%;
       }
    </style>

    
    <br>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjpd08Tu7zozwrj3-Sb3RIBUv13gnY3SQ&callback=initMap" async defer></script>
<script>
  var mi_location;
  var map;
  var marker;

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

  function addMarker() {
    var mark = new google.maps.Marker({
      position: new google.maps.LatLng(
            "-38.738806", 
            "-72.597354"
      ),
      animation: google.maps.Animation.DROP,
      map: map
    });
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
            document.getElementById('ej'),
            'click',
            addMarker
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

<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <button id="cerrar">x</button>
  <h1>Datos del Jugador</h1>
  <button id="">ver perfil</button>     
</div>