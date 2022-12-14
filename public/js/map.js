$(document).ready(function () {

    let lat, long;
    if($('#latitude').val() == '') {
        lat = 51.505
    } else {
        lat = $('#latitude').val();
    }

    if($('#longitude').val() == '') {
        long = 0
    } else {
        long = $('#longitude').val();
    }

    let map = L.map('leaflet-map').setView([lat, long], 10);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    let markerGroup = L.layerGroup().addTo(map);

    if((lat != '') && (long != '')) {
        let marker = L.marker([lat, long]).addTo(markerGroup)
    }

    // Get current location
    $("#lokasi-anda").click(function () {
        markerGroup.clearLayers();
        navigator.geolocation.getCurrentPosition(getPosition);
        function getPosition(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);

            map.flyTo([latitude, longitude], 15);
            let marker = L.marker([latitude, longitude]).addTo(markerGroup);
        }
    })

    // Get location on click
    map.on('click', function(e) {
        markerGroup.clearLayers();
        latitude = e.latlng.lat;
        longitude = e.latlng.lng;

        $('#latitude').val(latitude);
        $('#longitude').val(longitude);

        let marker = L.marker([latitude, longitude]).addTo(markerGroup);
    });
})