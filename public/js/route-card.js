document.querySelectorAll('.toggler').forEach(ele=>{
    ele.onclick = ()=>{
        if(ele.childNodes[0].classList.contains('fa-chevron-down')){
            ele.childNodes[0].classList.remove('fa-chevron-down');
            ele.childNodes[0].classList.add('fa-chevron-up');
            ele.parentElement.parentElement.nextElementSibling.classList.remove('d-none');
            ele.parentElement.parentElement.nextElementSibling.classList.add('d-block');

            const map = ele.parentElement.parentElement.nextElementSibling.children[0];
            mapboxgl.accessToken = 'pk.eyJ1IjoiMHVkaW5lIiwiYSI6ImNsdmZ1Z3BwNTBiazMybW5weTI0YzBnZHkifQ.zvrWkMtWnChsFIe69mZ2Fg';
            const initial = new mapboxgl.Map({
            container: map,
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-9.216125, 32.307529], 
            zoom: 12 
            });
            initial.on('load', () => {
            initial.resize();
            });
            const routeId = ele.getAttribute('route-id');
            fetch(`http://127.0.0.1:8000/api/routes/${routeId}`)
            .then((response)=>response.json())
            .then((data)=>{
                var url = 'https://api.mapbox.com/directions/v5/mapbox/driving/' + data.start_point_lng + ',' + data.start_point_lat + ';' + data.end_point_lng + ',' + data.end_point_lat + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;
                new mapboxgl.Marker().setLngLat({"lng":data.start_point_lng, "lat":data.start_point_lat}).addTo(initial);
                new mapboxgl.Marker().setLngLat({"lng":data.end_point_lng, "lat":data.end_point_lat}).addTo(initial);
                // map.setCenter([data.start_point_lng, data.start_point_lat]);
                fetch(url)
                  .then(function (response) {
                    return response.json();
                  })
                  .then(function (data) {
                      route = data.routes[0];
                      initial.addLayer({
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
                            })
        }else{
            ele.childNodes[0].classList.remove('fa-chevron-up');
            ele.childNodes[0].classList.add('fa-chevron-down');
            ele.parentElement.parentElement.nextElementSibling.classList.remove('d-block');
            ele.parentElement.parentElement.nextElementSibling.classList.add('d-none')
        }
    }
})