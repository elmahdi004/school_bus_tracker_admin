<x-vehicles :vehicles="$vehicles">
@section('modal')
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Vehicle</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('vehicles.update',$vehicle->id)}}" method="POST">
            @method('PUT')
            @csrf
        <div class="modal-body">
            <div class="row g-3">
                <div class="col-6">
                    <label for="name">Name</label>
                    <input name="name" value="{{$vehicle->name}}" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                    <label for="name">Registration Plate</label>
                    <input name="registration_plate" value="{{$vehicle['registration plate']}}" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                    <label for="name">Model</label>
                    <input name="model" value="{{$vehicle->model}}" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                    <label for="name">Number of Seats</label>
                    <input name="number_of_seats" value="{{$vehicle['number of seats']}}" class="form-control form-control-sm mt-2" type="number"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                    <label for="name">Status</label>
                    <select class="form-select form-select-sm mt-2" name="status" id="">
                        <option @selected($vehicle->status == 'active') value="active">active</option>
                        <option @selected($vehicle->status == 'inactive') value="inactive">inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  </button>
@endsection
</x-vehicles>