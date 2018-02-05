<div class="col-md-12">
	<div id="peta-bengkel"></div>

	<script>
		function initMap() {

			var map = new google.maps.Map(document.getElementById('peta-bengkel'), {
				zoom: 13,
				center: new google.maps.LatLng(-0.922238, 100.381466),
			});

			var infoWindow = new google.maps.InfoWindow;

			$.getJSON("lokasi/get_map_marker.php", function(json1) {
				$.each(json1, function(key, data) {
					var latLng = new google.maps.LatLng(data.latitude, data.longitude);
					var marker = new google.maps.Marker({
						position: latLng,
						title: data.nama_bengkel,
						icon: '../../assets/img/marker.png'
					});
					marker.setMap(map);

					var contentStr = '<div class="text-center"><h5>'+data.nama_bengkel+'</h5><p>Alamat : '+data.alamat+'</p><p>Telepon : '+data.telepon+'</p></div>';

					var infowindow = new google.maps.InfoWindow({
						content: contentStr
					});

					marker.addListener('click', function() {
						infowindow.open(map, marker);
					});
				});
			});

		}
	</script>
</div>