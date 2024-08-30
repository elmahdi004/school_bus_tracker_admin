// let routes = document.getElementById('myModal').getAttribute('data-value');
// console.log(JSON.parse(routes));

<<<<<<< HEAD
const API = 'http://127.0.0.1:8000/api';
=======

const API = 'http://192.168.57.232:8000/api';

>>>>>>> 042da418eb745f73cda9890cc9d5ec204d0b8eac
$('#myModal').on('shown.bs.modal', function () {
    map.resize(); // Trigger map resize event
});

mapboxgl.accessToken = 'pk.eyJ1IjoiMHVkaW5lIiwiYSI6ImNsdmZ1Z3BwNTBiazMybW5weTI0YzBnZHkifQ.zvrWkMtWnChsFIe69mZ2Fg'; // Replace with your Mapbox access token
var route;
// Initialize the map
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-9.216125, 32.307529], 
  zoom: 15 
});
var coordinates = [];

// navigator.geolocation.getCurrentPosition(position=>map.setCenter([position.coords.longitude,position.coords.latitude]));

// Add a marker to the map
function addMarker(e) {
  if (coordinates.length < 2) {
    coordinates.push(e.lngLat);
    new mapboxgl.Marker().setLngLat(e.lngLat).addTo(map);
  }

  if (coordinates.length === 2) {
    calculateRoute();
  }
}

// Calculate route between two points
function calculateRoute() {
  var url = 'https://api.mapbox.com/directions/v5/mapbox/driving/' + coordinates[0].lng + ',' + coordinates[0].lat + ';' + coordinates[1].lng + ',' + coordinates[1].lat + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;

  fetch(url)
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
        route = data.routes[0];
      map.addLayer({
        'id': 'route',
        'type': 'line',
        'source': {
          'type': 'geojson',
          'data': {
            'type': 'Feature',
            'properties': {},
            'geometry': route.geometry
          }
        },
        'layout': {
          'line-join': 'round',
          'line-cap': 'round'
        },
        'paint': {
          'line-color': '#00B074',
          'line-width': 8
        }
      });
    });
}

map.on('click', addMarker);


document.getElementById('add').onclick = ()=>{
    let name = document.getElementById('name');
    let vehicle = document.getElementById('vehicle');
    if(name.value != '' && coordinates.length == 2){
        const data = {
            name:name.value,
            sourceCoordinates:coordinates[0],
            destinationCoordinates:coordinates[1],
            distance:route.distance,
            vehicle:vehicle.value
        }
        fetch(`${API}/routes/store`,{
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data) 
        })
        .then(function (response) {
            window.location.href = '/routes'

        }).catch(error=>console.log(error));

        })

    }

}