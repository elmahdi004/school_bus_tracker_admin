<x-vehicles :vehicles="$vehicles">
    @section('modal')
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Vehicle</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('vehicles.store')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <label for="name">Name</label>
                        <input required name="name" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="name">Registration Plate</label>
                        <input required name="registration_plate" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="name">Model</label>
                        <input required name="model"  class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="name">Number of Seats</label>
                        <input required name="number_of_seats" class="form-control form-control-sm mt-2" type="number"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="name">Status</label>
                        <select required class="form-select form-select-sm mt-2" name="status" id="">
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
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
    </x-vehicles>