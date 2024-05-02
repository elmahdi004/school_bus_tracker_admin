<x-main id="5">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/parents/parents.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}"> 
    @endsection
    @section('content')
        <h4>
            Parents
        </h4>
        <div class="card py-4 px-4 my-4">
            <div class="card-head">
                <div class="d-flex justify-content-between">
                    <div class="one d-flex align-items-center">
                      <i class="fa-solid fa-users mb-2"></i>
                        <h5 class="ms-2">Manage Parents</h5>
                    </div>
                    <div class="actions"> 
                        <a href="{{route('parents.create')}}">
                            <h6 class="mt-2 ms-1">Add Parent</h6>
                            <i class="fa-solid fa-add mb-1 px-1 py-1 mt-1"></i>
                        </a>
                        </div>
                </div>
                <div class="card-body mt-4">
                    <table class="table table-hover" id="">
                        <thead class="">
                          <tr class="">
                            <th scope="col">username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Password</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($parents as $parent)
                          <tr>
                            <td>{{ $parent->username }}</td>
                            <td>{{ $parent->email }}</td>
                            <td>{{ $parent->contact_num }}</td>
                            <td>{{ $parent->address }}</td>
                            <td>{{ $parent->password }}</td>
                            <td>
                              <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                  {{-- <li><a class="dropdown-item" href="{{route('parents.details',$parent->id)}}">Details</a></li> --}}
                                  <li><a class="dropdown-item" href="{{route('parents.edit',$parent->parent_id)}}">Update</a></li>
                                  <li><a class="dropdown-item" href="{{route('parents.show',$parent->parent_id)}}">Delete</a></li>
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