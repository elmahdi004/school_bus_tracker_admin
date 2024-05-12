<x-main id="7">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    @vite('resources/js/app.js')
    @endsection
    @section('content')
        <div id="app">
            <waypoint-page route="{{$route['id']}}"></waypoint-page>
        </div>
    @endsection
</x-main>