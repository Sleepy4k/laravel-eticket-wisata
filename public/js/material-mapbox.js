const lokasi = [109.26048199923719, -7.4638904493787805]

mapboxgl.accessToken = 'pk.eyJ1IjoiYmVuamFtaW40ayIsImEiOiJjbDM1YWx5eGEwNmJwM2tsZDhsbG1zaGhpIn0.6pA7VvYoJELB5lPGFrjaJA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: lokasi,
    zoom: 11.15
});

let geolocate = new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true
})

map.addControl(geolocate);
map.addControl(new mapboxgl.NavigationControl());

map.on('click', function(e) {
    let latitude = e.lngLat.lat;
    let longitude = e.lngLat.lng;
    
    document.getElementById("latitude").value = latitude;
    document.getElementById("longitude").value = longitude;
});