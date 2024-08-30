<template lang="">
    <h4>
        Manage your Route 
    </h4>
    <div class="row pt-3">
        <div class="map col-8">
            <div id="map" class="rounded">
            </div>
        </div>
        <div class="list col-4 d-flex flex-column rounded">
            <div class="sticky-top bg-white header d-flex justify-content-between align-items-center pt-4 px-2 ">
                <h6>Waypoint List :</h6>
            </div>
            <div v-if="loading" class="items" style="width:100%;height:100%;display: flex;justify-content: center;align-items: center">
              <div class="spinner-border text-success " role="status" >
              <span class="visually-hidden" >Loading...</span>
              </div>
            </div>
            <div v-else class="items" style="width:100%;height:100%">
              <div v-if="items.length != 0">
                  <ListItem @call-modal="callModalHandle" v-for="(item,index) in items"  :key="item.id" :index="index" :item="item"></ListItem>
                </div>
                <div v-else class="d-flex justify-content-center align-items-center" style="width:100%;height:100%">
                  Not Founded
                </div>
            </div>
        </div>
        <AddStudentModal :waypoint="waypoint" @call-students="callStudentHandle"></AddStudentModal>
    </div>
</template>
<script setup>
import { onMounted , defineProps, ref } from 'vue';
import ListItem from '../components/ListItem.vue';
import AddStudentModal from '../components/AddStudentModal.vue';
import api from '../axiosClient';
import axios from 'axios';
const selectedRoute = ref(null);
const items = ref([]);
const loading = ref(false);
const modal = ref(false);
const props = defineProps(['route']);
const waypoint = ref(null);
const API = "http://127.0.0.1:8000/api"
var map;
const callModalHandle = (id)=>{
  waypoint.value = id;
  $(document).ready(function(){
    $("#myModal3").modal('show');
});
}

onMounted(async() => {

loading.value = true;
const response = await api.get(`/routes/${props.route}`)
.then(({data})=>{
  selectedRoute.value = data;
})
.catch((error)=>console.log(error));

mapboxgl.accessToken = 'pk.eyJ1IjoiMHVkaW5lIiwiYSI6ImNsdmZ1Z3BwNTBiazMybW5weTI0YzBnZHkifQ.zvrWkMtWnChsFIe69mZ2Fg'; // Replace with your Mapbox access token
var route;
// Initialize the map
  map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  // center: [-9.216125, 32.307529], 
  zoom: 13 
});

map.on('load', () => {
  map.setCenter([selectedRoute.value.start_point_lng, selectedRoute.value.start_point_lat]);
});


listWaypoints();

var waypoints = [[selectedRoute.value.start_point_lng, selectedRoute.value.start_point_lat],[[selectedRoute.value.end_point_lng, selectedRoute.value.end_point_lat]]];


async function addMarker(e) {
    loading.value = true;
    new mapboxgl.Marker().setLngLat(e.lngLat).addTo(map);
    let marker = [e.lngLat.lng,e.lngLat.lat];
    waypoints.push(marker);
    const point = {
          'route_id':props.route,
          'latitude':e.lngLat.lat,
          'longitude':e.lngLat.lng
    }
    let {data} = await axios.post(`${API}/waypoints`,point);
    listWaypoints();
    // items.value.push(data);
    // calculateRoute();

}

// Calculate route between two points
function calculateRoute() {
  if (map.getLayer('route')) {
    map.removeLayer('route');
    map.removeSource('route');
  }
  let url = 'https://api.mapbox.com/directions/v5/mapbox/driving/';
    waypoints.forEach((waypoint, index) => {
      url += `${waypoint[0]},${waypoint[1]}`;
      if (index < waypoints.length - 1) {
        url += ';';
      }
    });
    url += `?steps=true&geometries=geojson&access_token=${mapboxgl.accessToken}`;
    console.log(url);
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
new mapboxgl.Marker().setLngLat({"lng":selectedRoute.value['start_point_lng'], "lat":selectedRoute.value['start_point_lat']}).addTo(map);
new mapboxgl.Marker().setLngLat({"lng":selectedRoute.value['end_point_lng'], "lat":selectedRoute.value['end_point_lat']}).addTo(map);
calculateRoute();

map.on('click', addMarker);


// document.getElementById('add').onclick = ()=>{
//     let name = document.getElementById('name');
//     let vehicle = document.getElementById('vehicle');
//     if(name.value != '' && coordinates.length == 2){
//         const data = {
//             name:name.value,
//             sourceCoordinates:coordinates[0],
//             destinationCoordinates:coordinates[1],
//             distance:route.distance,
//             vehicle:vehicle.value
//         }
//         fetch(`${API}/routes/store`,{
//             method: 'POST', 
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(data) 
//         })
//         .then(function (response) {
//             window.location.href = '/routes'
//         })
//     }

// }
})
const listWaypoints = async()=>{
  const points = await axios.get(`${API}/route/${props.route}/waypoints`);
if(points.data.length > 0){
  items.value = [];
  loading.value = false;
  points.data.forEach((ele,index)=>{
    let marker = new mapboxgl.Marker().setLngLat({"lng":ele.longitude, "lat":ele.latitude}).addTo(map);
    let popup = new mapboxgl.Popup({ maxWidth: '300px' }); // Create a Popup instance

// Show the popup when the mouse enters the marker area
marker.getElement().addEventListener('mouseenter', () => {
  popup.setLngLat({"lng": ele.longitude, "lat": ele.latitude})
    .setHTML(`<h3 class="rounded fs-6">waypoint - ${index + 1}</h3>
    <p>longitude : ${ele.longitude}</p>
    <p>latitude : ${ele.latitude}</p>`)
    .addTo(map);
});
// Hide the popup when the mouse leaves the marker area
marker.getElement().addEventListener('mouseleave', () => {
  popup.remove();
});

      items.value.push(ele);
  });
}
loading.value = false;
}
const callStudentHandle = async()=>{
  loading.value = true;
  console.log('i do not got them')
  let points = await axios.get(`${API}/route/${props.route}/waypoints`);
  console.log('i got them')
if(points.data.length > 0){
  items.value = [];
  loading.value = false;
  points.data.forEach((ele,index)=>{
        items.value.push(ele);
  });
}
}
</script>
<style scoped>
    .map{
        height: 400px;
    }
    #map{
        width: 100%;
        height: 100%;
    }
    .list{
        height: 400px;
        overflow-y:scroll ;
        background-color: white;
    }
    a.green{
    background-color: #00B074;
    color: white;
    border: none;
    padding: 0 7px;
    border-radius: 4px;
}
.spinner-border {
    color: #00B074 !important; /* Change to the color you want */
}


</style>