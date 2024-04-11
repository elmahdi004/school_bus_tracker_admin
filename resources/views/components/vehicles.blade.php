<x-main id="2">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}">
    @endsection
    @section('content')
        <h4>
            Vehicles
        </h4>
        <div class="card py-4 px-4 my-4">
            <div class="card-head">
                <div class="d-flex justify-content-between">
                    <div class="one d-flex align-items-center">
                        <i class="fa-solid fa-bus mb-2"></i>
                        <h5 class="ms-2">Manage Buses</h5>
                    </div>
                    <div class="actions"> 
                        <a href="{{route('vehicles.create')}}">
                            <h6 class="mt-2 ms-1">Add bus</h6>
                            <i class="fa-solid fa-add mb-1 px-1 py-1 mt-1"></i>
                        </a>
                        </div>
                </div>
                <div class="card-body mt-4">
                    <table class="table table-hover" id="">
                        <thead class="">
                          <tr class="">
                            <th scope="col">Bus Name</th>
                            <th scope="col">Model</th>
                            <th scope="col">Registration Plate</th>
                            <th scope="col">Number of Seats</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($vehicles as $vehicle)
                          <tr>
                            <td>{{ $vehicle->name }}</td>
                            <td>{{ $vehicle->model }}</td>
                            <td>{{ $vehicle['registration plate'] }}</td>
                            <td>{{ $vehicle['number of seats'] }}</td>
                            <td ><span id="status" class="{{$vehicle->status == 'active' ? 'text-success bg-success-subtle' : 'text-warning bg-warning-subtle'}}">{{ $vehicle->status }}</span></td>
                            <td>
                              <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('vehicles.details',$vehicle->id)}}">Details</a></li>
                                  <li><a class="dropdown-item" href="{{route('vehicles.edit',$vehicle->id)}}">Update</a></li>
                                  <li><a class="dropdown-item" href="{{route('vehicles.show',$vehicle->id)}}">Delete</a></li>
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