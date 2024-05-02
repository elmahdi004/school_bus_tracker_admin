<x-drivers :drivers="$drivers">
    @section('modal')
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a Driver</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('drivers.store')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <label for="username">Username</label>
                        <input required name="username" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="driving_licence_number">Driving Licence Number</label>
                        <input required name="driving_licence_number" class="form-control form-control-sm mt-2" type="number"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="bus_id">driver's bus's id</label>
                        <input required name="bus_id"  class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                      <label for="phone_number">Phone Number</label>
                      <input required name="phone_number" class="form-control form-control-sm mt-2" type="number"  aria-label=".form-control-sm example">
                  </div>
                  <div class="col-6">
                    <label for="status">Satuts</label>
                    <input required name="status" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                </div>
                    <div class="col-6">
                        <label for="password">Password</label>
                        <input required name="password" class="form-control form-control-sm mt-2" type="password"  aria-label=".form-control-sm example" minlength="8">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success btn-sm">Add</button>
            </div>
        </form>
          </div>
        </div>
      </div>
      </button>
    @endsection
</x-parents>