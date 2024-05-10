<x-main id="7">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    @endsection
    @section('content')
        <h4>
            Routes
        </h4>
        <div class="card py-4 px-4 my-4">
            <div class="card-head">
                <div class="d-flex justify-content-between">
                    <div class="one d-flex align-items-center">
                        <i class="fa-solid fa-road mb-2"></i>
                        <h5 class="ms-2">Manage routes</h5>
                    </div>
                    <div class="actions"> 
                        <a href="{{route('routes.create')}}">
                            <h6 class="mt-2 ms-1">Add route</h6>
                            <i class="fa-solid fa-add mb-1 px-1 py-1 mt-1"></i>
                        </a>
                        </div>
                </div>
                <div class="card-body mt-4">
                    <table class="table table-hover" id="myTable">
                        <thead class="">
                          <tr class="">
                            <th scope="col">Name</th>
                            <th scope="col">Distance (KM)</th>
                            <th scope="col">Vehicle name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($routes as $route)
                          <tr>
                            <td>{{$route->name}}</td>
                            <td>{{$route->distance}}</td>
                            <td>{{$route['vehicle']->name}}</td>
                            <td>
                              <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('waypoint.index',$route->id)}}">Manage</a></li>
                                  <li><a class="dropdown-item" href="{{route('routes.edit',$route->id)}}">Update</a></li>
                                  <li><a class="dropdown-item" href="{{route('routes.delete',$route->id)}}">Delete</a></li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                @yield('modal')
            </div>
        </div>
    @endsection
</x-main>