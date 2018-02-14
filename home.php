<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Selamat Datang</title>

	<link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="header-ahass"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e92030;">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="home.php"><strong>HOME</strong></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="visi-misi.php"><strong>VISI MISI</strong></a>
							</li>
						</ul>
						<div class="my-2 my-lg-0">
							<span id="jarak-durasi"></span>
							<button type="button" id="lihat-rute" class="btn btn-success">LIHAT RUTE</button>
							<a class="btn btn-success" href="login.php">LOGIN</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="peta-bengkel"></div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container text-center">
			2018 @ STMIK Indonesia Allright Reserved.
		</div>
	</div>

	<script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>

    <script>

    	function initMap() {

    		var directionsDisplay = new google.maps.DirectionsRenderer;
    		var directionsService = new google.maps.DirectionsService;
    		var geocoder = new google.maps.Geocoder;
    		var distanceMatrixService = new google.maps.DistanceMatrixService;

    		var map = new google.maps.Map(document.getElementById('peta-bengkel'), {
    			zoom: 13,
    			center: new google.maps.LatLng(-0.922238, 100.381466),
    		});

    		directionsDisplay.setMap(map);

    		document.getElementById('lihat-rute').addEventListener('click', function() {
    			calculateAndDisplayRoute(directionsService, directionsDisplay, geocoder, distanceMatrixService);
    		});

    		var infoWindow = new google.maps.InfoWindow;

    		$.getJSON("public/admin/lokasi/get_map_marker.php", function(json1) {
    			$.each(json1, function(key, data) {
    				var latLng = new google.maps.LatLng(data.latitude, data.longitude);
    				var marker = new google.maps.Marker({
    					position: latLng,
    					title: data.nama_bengkel,
    					icon: 'assets/img/marker.png'
    				});
    				marker.setMap(map);
    				var contentStr = '<div class="text-center"><h5>'+data.nama_bengkel+'</h5><p>'+data.alamat+' Telp.'+data.telepon+'</p></div><div class="text-center"><img src="assets/foto/'+data.foto+'" height="200px" width="200px"><br><br><p>'+data.keterangan+'</p></div>';

    				var infowindow = new google.maps.InfoWindow({
    					content: contentStr
    				});

    				marker.addListener('click', function() {
    					infowindow.open(map, marker);
    				});
    			});
    		});

    		google.maps.event.addListener(map, 'click', function(event) {
    			var lat = event.latLng.lat();
    			var lng = event.latLng.lng();
    			addListing(event.latLng, map, lat, lng);
    		});

    	}

    	var lat1, lat2, lng1, lng2;

    	function calculateAndDisplayRoute(directionsService, directionsDisplay, geocoder, distanceMatrixService) {
    		var selectedMode ="DRIVING";

    		directionsService.route({
    			origin: {lat: lat1, lng: lng1},
    			destination: {lat: lat2, lng: lng2},
    			travelMode: google.maps.TravelMode[selectedMode]
    		}, function(response, status) {
    			if (status == 'OK') {
    				directionsDisplay.setDirections(response);
    			} else {
    				window.alert('Directions request failed due to ' + status);
    			}
    		});

    		distanceMatrixService.getDistanceMatrix({
    			origins: [{lat: lat1, lng: lng1}],
    			destinations: [{lat: lat2, lng: lng2}],
    			travelMode: 'DRIVING',
    			unitSystem: google.maps.UnitSystem.METRIC,
    			avoidHighways: false,
    			avoidTolls: false
    		}, function(response, status){
    			if (status !== 'OK') {
    				alert('Telah terjadi kesalahan.');
    			} else {
    				var distance = response.rows[0].elements[0].distance.text;
    				var duration = response.rows[0].elements[0].duration.text;
    				$('#jarak-durasi').html("Jarak : " + distance + " | Durasi : " + duration + " ");
    			}
    		});
    	}

    	
    	var i=0

    	function addListing(location, map, lat, lng) {
    		var addMarker;
    		var iMax=1;

    		if (i == 0) {
    			lat1 = lat;
    			lng1 = lng;
    		} else if (i == 1) {
    			lat2 = lat;
    			lng2 = lng;
    		}

    		if(i<=iMax) {
    			addMarker = new google.maps.Marker({
    				draggable:true,
    				position: location,
    				map: map
    			});

    			google.maps.event.addListener(addMarker, 'dblclick', function() {
    				addMarker.setMap(null);
    				i=i-1;
    			});

    			i++;

    		} else {
    			alert('Anda hanya bisa membuat 2 buah marker, double click untuk menghilangkan marker.');
    		}

    	}

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvbr9LgPDtHcrZ0tffOHDRPxcSx2B_PSI&callback=initMap"></script>
</body>
</html>