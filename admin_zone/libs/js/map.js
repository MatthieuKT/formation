
// Initialize and add the map
function initMap() {
// The location of Uluru
var adresse = {lat: 48.7944453, lng: 2.447922800000015};
// The map, centered at Uluru
var map = new google.maps.Map(
  document.getElementById('map'), {zoom: 16, center: adresse});
// The marker, positioned at Uluru
var marker = new google.maps.Marker({position: adresse, map: map});
}
