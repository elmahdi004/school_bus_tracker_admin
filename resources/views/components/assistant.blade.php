<x-main id="6">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}">
    @endsection
    @section('content')
        <h4>
            Assistants
        </h4>
        <div class="card py-4 px-4 my-4">
            <div class="card-head">
                <div class="d-flex justify-content-between">
                    <div class="one d-flex align-items-center">
                        <i class="fa-solid fa-hands-holding-child mb-2"></i>
                        <h5 class="ms-2">Manage assistants</h5>
                    </div>
                    <div class="actions"> 
                        <a href="{{route('assistants.create')}}">
                            <h6 class="mt-2 ms-1">Add assistant</h6>
                            <i class="fa-solid fa-add mb-1 px-1 py-1 mt-1"></i>
                        </a>
                        </div>
                </div>
                <div class="card-body mt-4">
                    <table class="table table-hover" id="myTable">
                        <thead class="">
                          <tr class="">
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($assistants as $assistant)
                          <tr>
                            <td>{{ $assistant->name }}</td>
                            <td>{{ $assistant->email }}</td>
                            <td>{{ $assistant->phone_number }}</td>
                            <td ><span id="status" class="{{$assistant->availability == 'available' ? 'text-success bg-success-subtle' : 'text-warning bg-warning-subtle'}}">{{ $assistant->availability }}</span></td>
                            <td>
                              <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('assistants.edit',$assistant->id)}}">Update</a></li>
                                  <li><a class="dropdown-item" href="{{route('assistants.show',$assistant->id)}}">Delete</a></li>
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