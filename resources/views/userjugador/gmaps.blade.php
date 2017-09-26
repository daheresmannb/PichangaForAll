@if(session('respuesta'))
    <?php 
        $resp = session('respuesta');
    ?>

    <script type="text/javascript">
        alert("respuestaaaa!!!");
    </script>
@endif

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="dist/bootstrap-slider.js"></script>

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

        $('#ex1').slider({
          formatter: function(value) {
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


<h4><span>Buscar Jugadores Cercanos</span></h4>
<div class="card" style="display:inline-block;">
<div class="row">
  <div class="col-sm-8">
    <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="14"/>
  </div>
  <div class="col-sm-4">
    <button style="background: #66615b; text-shadow: #fff;" type="button" class="btn btn-default  btn-sm">Buscar</button>
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
    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjpd08Tu7zozwrj3-Sb3RIBUv13gnY3SQ&callback=initMap" async defer></script>
<script>
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

  function mostrarinfo() {
      document.getElementById('light').style.display='block';
      document.getElementById('fade').style.display='block';
  }

  function addMarker() {
    var mark = new google.maps.Marker({
      position: new google.maps.LatLng(
            lat, 
            lon
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

  $.ajax({
    type: 'POST',
    url:  "<?php echo url('assets/img/jugador2.png'); ?>",
    headers: {'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"},
    data: {id: id, _token: tok},
                  
    success: function(data) {
      // data.msg
    },
    error: function(xhr, textStatus, thrownError) {
      textStatus
    }
  });



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

