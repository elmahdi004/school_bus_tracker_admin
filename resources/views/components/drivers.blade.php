<x-main id="4">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/driver/driver.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}"> 
    @endsection
    @section('content')
        <h4>
            Driver
        </h4>
        <div class="card py-4 px-4 my-4">
            <div class="card-head">
                <div class="d-flex justify-content-between">
                    <div class="one d-flex align-items-center">
                      <i class="fa-solid fa-users mb-2"></i>
                        <h5 class="ms-2">Manage Drivers</h5>
                    </div>
                    <div class="actions"> 
                        <a href="{{route('drivers.create')}}">
                            <h6 class="mt-2 ms-1">Add Driver</h6>
                            <i class="fa-solid fa-add mb-1 px-1 py-1 mt-1"></i>
                        </a>
                        </div>
                </div>
                <div class="card-body mt-4">
                    <table class="table table-hover" id="">
                        <thead class="">
                          <tr class="">
                            <th scope="col">username</th>
                            <th scope="col">driver licence nbr</th>
                            <th scope="col">driver's bus's id</th>
                            <th scope="col">Password</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($drivers as $driver)
                          <tr>
                            <td>{{ $driver->username }}</td>
                            <td>{{ $driver->driver_licence_nbr }}</td>
                            <td>{{ $driver->bus_id }}</td>
                            <td>{{ $driver->password }}</td>
                            <td ><span id="status" class="{{$driver->status == 'active' ? 'text-success bg-success-subtle' : 'text-warning bg-warning-subtle'}}">{{ $driver->status }}</span></td>
                            <td>
                            <td>
                              <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                  {{-- <li><a class="dropdown-item" href="{{route('drivers.details',$driver->id)}}">Details</a></li> --}}
                                  <li><a class="dropdown-item" href="{{route('drivers.edit',$driver->driver_id)}}">Update</a></li>
                                  <li><a class="dropdown-item" href="{{route('drivers.show',$driver->driver_id)}}">Delete</a></li>
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