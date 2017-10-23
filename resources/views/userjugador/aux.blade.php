<script>
function initMap() { 
 // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
 var map = new google.maps.Map(document.getElementById('mapa{
 center: {lat: 43.2686751, lng: -2.9340005},
 scrollwheel: false,
 zoom: 8,
 zoomControl: true,
 rotateControl : false,
 mapTypeControl: true,
 streetViewControl: false,
 });
 // Creamos el marcador
 var marker = new google.maps.Marker({
 position: {lat: 43.2686751, lng: -2.9340005},
 draggable: true 
 });
 // Le asignamos el mapa a los marcadores.
 marker.setMap(map); 
 // creamos el objeto geodecoder 
 var geocoder = new google.maps.Geocoder(); 
// le asignamos una funcion al eventos dragend del marcado
 google.maps.event.addListener(marker, 'dragend', function() {
 geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
 if (status == google.maps.GeocoderStatus.OK) {
 var address=results[0]['formatted_address'];
 alert(address);
 }
 });
});
}
</script>