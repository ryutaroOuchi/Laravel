<html>
	<head>
		<title>Laravel</title>
		<style>
			html, body, #map-canvas {
				margin: 0;
				padding: 0;
				height: 98%;
				width: 100%;
			}
			#panel {
				position: absolute;
				top: 5px;
				left: 300px;
				margin-left: -180px;
				z-index: 5;
				background-color: #fff;
				padding: 5px;
				border: 1px solid #999;
			}
		</style>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true_or_false"></script>
		<script type="text/javascript">
//			var geocoder;
			var map;
//			var markerNow;
			var i = 0;
			var data = new Array();
			var loc = new Array();
			var marker = new Array();
//			var place;
//			var html;
//			var infoWindow;
//			var data = new Array();
//			var title = new Array();
//			var service = new google.maps.places.PlacesService();
//			var directionsService = new google.maps.DirectionsService();
			//--------------地図を表示--------------------------------------------------------------------------
			function initialize() {
				data = JSON.parse('<?php echo $data; ?>');
				var latlng = new google.maps.LatLng(35.677036, 139.735550);
				var mapOptions = {
					zoom: 18,
					center: latlng,
					disableDefaultUI: true
				}
				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				var marker_now = new google.maps.Marker({
						position: latlng,
						map: map, 
						title: '現在地',
						animation: google.maps.Animation.BOUNCE,
						icon: 'http://www.google.com/mapfiles/gadget/arrowSmall80.png'
				});
				for(i=0; i<data.length; i++){
					loc[i] = new google.maps.LatLng(data[i].detail.latitude, data[i].detail.longitude);
					marker[i] = new google.maps.Marker({
						position: loc[i],
						map: map, 
						title: data[i].detail.name,
						icon : 'http://maps.google.com/mapfiles/ms/micons/cabs.png'
					});
				}
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
		{{$data}}
	</body>
</html>
