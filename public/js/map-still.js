$(document).ready(function () {
    let latitude = $('#latitude').val();
    let longitude = $('#longitude').val();

    let map = L.map('leaflet-map').setView([latitude, longitude], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    let markerGroup = L.layerGroup().addTo(map);

    let marker = L.marker([latitude, longitude]).addTo(markerGroup);
})