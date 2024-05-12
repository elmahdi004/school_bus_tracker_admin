<x-main id="2">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/vehicles/details.css')}}">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    <style>

    </style>
    @endsection
    @section('content')
    <h4 class="title">
        Vehicle Details
    </h4>
    <div class="row mt-4">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="main-details">
                        <h4>{{ $vehicle->name }}</h4>
                        <p class="bus">Bus</p>
                        <p class="{{$vehicle->status == 'active' ? 'status bg-success text-light px-2 py-1': 'status bg-warning text-light px-2 py-1'}}">{{ $vehicle->status }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                    <div class="card-body">
                        <div class="actions">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                  <a class="{{$idNav == 1 ? 'nav-link active' : 'nav-link' }}"href="#">Details</a>
                                </li>
                                <li class="nav-item">
                                  <a class="{{$idNav == 2 ? 'nav-link active' : 'nav-link' }}" href="#">Maintenance</a>
                                </li>
                                <li class="nav-item">
                                  <a class="{{$idNav == 3 ? 'nav-link active' : 'nav-link' }}" href="#">Driver</a>
                                </li>
                                <li class="nav-item">
                                  <a class="{{$idNav == 4 ? 'nav-link active' : 'nav-link' }}" href="#">Assistant</a>
                                </li>
                                <li class="nav-item">
                                  <a class="{{$idNav == 5 ? 'nav-link active' : 'nav-link' }}" href="#">Routes</a>
                                </li>
                              </ul>
                        </div>
                        <div class="{{$idNav == 1 ? 'section p-3 mt-3 d-block' : 'section p-3 mt-3 d-none'}}">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <td>Vehicle name</td>
                                    <td>{{$vehicle->name}}</td>
                                  </tr>
                                  <tr>
                                    <td>Registration plate</td>
                                    <td>{{$vehicle['registration plate']}}</td>
                                  </tr>
                                  <tr>
                                    <td>Model</td>
                                    <td>{{$vehicle->model}}</td>
                                  </tr>
                                  <tr>
                                    <td>Number of seats</td>
                                    <td>{{$vehicle['number of seats']}}</td>
                                  </tr>
                                  <tr>
                                    <td>Status</td>
                                    <td>{{$vehicle->status}}</td>
                                  </tr>
                                  <tr>
                                    <td>Driver name</td>
                                    <td>{{$driver[0]->username}}</td>
                                  </tr>
                                  <tr>
                                    <td>Assistant name</td>
                                    <td>{{$vehicle['assistant']->name}}</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <div class="{{$idNav == 2 ? 'section p-3 mt-3 d-block' : 'section p-3 mt-3 d-none'}}">
                            <div class="title d-flex justify-content-between align-items-center">
                                <div class="d-flex ">
                                    <i class="fa-regular fa-clock "></i>
                                    <h6 class="ms-1">Add Reminder </h6>
                                </div>
                                <a href="{{route('maintenance.show',$vehicle->id)}}">
                                    <i class="fa-regular fa-plus"></i>
                                </a>
                            </div>
                            <div class="reminder-body mt-4">
                                <table class="table">
                                    <thead>
                                        <th>Maintenance type</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Remaining time</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($busMaintenances as $item)     
                                         <tr>
                                        <td>{{$item['maintenance_type']['name']}}</td>
                                        <td>{{$item['busMaintenance']['date']}}</td>
                                        <td>{{$item['busMaintenance']['description']}}</td>
                                        <td>{{$item['remaining_time']}}</td>
                                        <td>
                                          <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{route('maintenance.done',[$item['busMaintenance']['id'],$item['busMaintenance']['vehicle_id']])}}">Done</a></li>
                                              <li><a class="dropdown-item" href="{{route('maintenance.modify',[$item['busMaintenance']['id'],$item['busMaintenance']['vehicle_id']])}}">Update</a></li>
                                            </ul>
                                          </div>
                                        </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="{{$idNav == 3 ? 'section p-3 mt-3 d-block' : 'section p-3 mt-3 d-none'}}">
                            <h3>
                              <table class="table">
                                <tbody class="fw-normal">
                                  <tr>
                                    <td>Driver name</td>
                                    <td>{{$driver[0]->username}}</td>
                                  </tr>
                                  <tr>
                                    <td>Licence id</td>
                                    <td>{{$driver[0]->driver_licence_nbr}}</td>
                                  </tr>
                                  <tr>
                                    <td>Phone Number</td>
                                    <td>{{$driver[0]->phone_number}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </h3>
                        </div>
                        <div class="{{$idNav == 4 ? 'section p-3 mt-3 d-block' : 'section p-3 mt-3 d-none'}}">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Name</td>
                                <td>{{$vehicle['assistant']->name}}</td>
                              </tr>
                              <tr>
                                <td>Email</td>
                                <td>{{$vehicle['assistant']->email}}</td>
                              </tr>
                              <tr>
                                <td>Phone number</td>
                                <td>{{$vehicle['assistant']->phone_number}}</td>
                              </tr>
                              <tr>
                                <td>Availability</td>
                                <td>{{$vehicle['assistant']->availability}}</td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                        <div class="{{$idNav == 5 ? 'section p-3 mt-3 d-block' : 'section p-3 mt-3 d-none'}}">
                          @if ($routes->count())
                          @foreach ($routes as $route)
                          <div class="card shadow-sm my-3 p-3">
                            <div class="card-head d-flex justify-content-between">
                              <div class="id">
                                {{$loop->index + 1}}
                              </div>
                              <div class="name">
                                {{$route->name}}
                              </div>
                              <div class="open-close">
                                <button class="toggler bg-transparent border-0" route-id="{{$route->id}}"><i class="fa-solid fa-chevron-down"></i></button>
                              </div>
                            </div>
                            <div class="card-bod pt-4 d-none">
                              <div id="map"  style="width: 100%;height:200px"></div>
                            </div>
                          </div>
                      @endforeach
                          @else
                              <div class="text-center">
                                <h6>                                        Not Founded                                </h6>
                              </div>
                          @endif

                        </div>
                    </div>
            </div>
        </div>
    </div>
    @yield('modal')
    @endsection
    @section('scripts')
    <script src="{{asset('js/route-card.js')}}"></script>
    @endsection
</x-main>