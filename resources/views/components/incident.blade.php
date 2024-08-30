<x-main id="8">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/parents/parents.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}"> 
    @endsection
    @section('content')
        <h4>
            Incidents
        </h4>
        <div class="card py-4 px-4 my-4">
            <div class="card-head">
                <div class="d-flex justify-content-between">
                    <div class="one d-flex align-items-center">
                        <i class="fa-solid fa-users mb-2"></i>
                        <h5 class="ms-2">Manage Incidents</h5>
                    </div>
                </div>
                
                <div class="card-body mt-4 overflow-auto">
                    @foreach ($routes as $route)                        
                    <div class="card shadow-sm my-3 p-3">
                        <div class="card-head d-flex justify-content-between">
                          <div class="id">
                          </div>
                          <div class="name">
                            {{$route->name}}
                          </div>
                          <div class="open-close">
                            <button class="toggler bg-transparent border-0" ><i class="fa-solid fa-chevron-down"></i></button>
                          </div>
                        </div>
                        <div class="card-bod pt-4 d-none">
                          <div id="map" style="width:100%">
                            @if ($route->incidents->count())
                            <table class="table table-hover text-center" id="" style="width:100%">
                                <thead class="">
                                  <tr class="">
                                    <th scope="col">Type</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Assistant name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($route->incidents as $incident)
                                  <tr>
                                    <td>{{ $incident->type }}</td>
                                    <td>{{ Str::limit($incident->description,20) }}</td>
                                    <td>{{ $incident->assistant->name }}</td>
                                    <td>{{ $incident->created_at->format('d M Y, H:i') }}</td>
                                    <td>
                                      <div class="dropdown">
                                         <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="">Delete</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                
                              </table>
                              @else
                              <div class="text-center">
                                  <h4>Not Founded</h4>
                              </div>
                              @endif
                        </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                @yield('modal')
            </div>
        </div>
    @endsection
    @section('scripts')
    <script src="{{asset('js/route-card.js')}}"></script>
    @endsection
</x-main>