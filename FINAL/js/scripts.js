function initMap() {

	var alaska = {
		info: '<strong>Alaska, United States</strong><br>',
		lat: 	66.160507,
		long: -153.369141
	};

	var bc = {
		info: '<strong>British Columbia, Canada</strong><br>',
		lat: 49.246292,
		long: -123.116226

	};

	var montana = {
		info: '<strong>Montana, United States</strong><br>',
		lat: 46.965260,
		long: -109.533691
	};

	var locations = [
      [alaska.info, alaska.lat, alaska.long, 0],
      [bc.info, bc.lat, bc.long, 1],
      [montana.info, montana.lat, montana.long, 2],
    ];

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 3,
		center: new google.maps.LatLng(49.246292, -123.116226),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow({});

	var marker, i;

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function (marker, i) {
			return function () {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}
}

// When the user scrolls down 20px from the top of the document, show the button

