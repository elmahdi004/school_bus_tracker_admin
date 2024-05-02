<x-drivers :drivers="$drivers">
@section('modal')
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Driver</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('drivers.update',$driver->driver_id)}}" method="POST">
            @method('PUT')
            @csrf
        <div class="modal-body">
            <div class="row g-3">
                <div class="col-6">
                    <label for="username">Username</label>
                    <input name="username" value="{{$driver->username}}" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                    <label for="driver_licence_nbr">Driving Licence Number</label>
                    <input name="driver_licence_nbr" value="{{$driver->driver_licence_nbr}}" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                    <label for="bus_id">driver's bus's id</label>
                    <input name="bus_id" value="{{$driver->bus_id}}" class="form-control form-control-sm mt-2" type="number"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                    <label for="phone_number">Phone Number</label>
                    <input name="phone_number" value="{{$driver->phone_number}}" class="form-control form-control-sm mt-2" type="number"  aria-label=".form-control-sm example">
                </div>
                <div class="col-6">
                  <label for="status">Satuts</label>
                  <input required name="status" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
              </div>
                <div class="col-6">
                  <label for="password">Password</label>
                  <input name="password" value="{{$driver->password}}" class="form-control form-control-sm mt-2" type="password"  aria-label=".form-control-sm example" minlength="8">
              </div>
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
</x-drivers>