var geocoder;
var map;
var markerNow;
var i = 0;
var place;
var html;
var infoWindow;
var data = new Array();
var service = new google.maps.places.PlacesService();
var directionsService = new google.maps.DirectionsService();
//--------------地図を表示--------------------------------------------------------------------------
function initialize() {
	var latlng = new google.maps.LatLng(35.658871, 139.701238);
	var mapOptions = {
		zoom: 16,
		center: latlng,
		disableDefaultUI: true
	}
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	var marker = new google.maps.Marker({
                position: latlng,
                map: map, 
                title: "{{$data[0]['obj']['name']}}"
            });
}

google.maps.event.addDomListener(window, 'load', initialize);
