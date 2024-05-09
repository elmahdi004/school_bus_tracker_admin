<x-route :routes="$routes">
    @section('modal')
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" route-id="{{$route->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Route</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                @csrf
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <label for="name" >Name</label>
                        <input required name="name" id="name" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example" value="{{$route->name}}">
                    </div>
                  <div class="col-6">
                    <label for="name" >Vehicle Name</label>
                    <select name="vehicle" class="form-select" id="vehicle" >
                      @foreach ($vehicles as $vehicle)
                              <option @selected($vehicle->id == $route->vehicle_id) value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                      @endforeach
                    </select>
                </div>
                </div>
                <label  class="my-1" for="name" >Please select source and destination of your route</label>
                <div class="my-1 rounded" style="height:300px;width:100%;" id="map"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
              <button id="add" type="submit" class="btn btn-success btn-sm">Update</button>
            </div>
        </form>
          </div>
        </div>
      </div>
      </button>
    @endsection
    @section('scripts')
        <script src="{{asset('js/mapbox/updateRoute.js')}}"></script>
    @endsection
</x-route>