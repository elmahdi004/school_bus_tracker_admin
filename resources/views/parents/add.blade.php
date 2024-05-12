<x-parents :parents="$parents">
    @section('modal')
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a parent</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('parents.store')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <label for="username">Username</label>
                        <input required name="username" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="contact_num">Contact Number</label>
                        <input required name="contact_num" class="form-control form-control-sm mt-2" type="number"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="email">Email</label>
                        <input required name="email"  class="form-control form-control-sm mt-2" type="email"  aria-label=".form-control-sm example">
                    </div>
                    <div class="col-6">
                        <label for="address">Address</label>
                        <input required name="address" class="form-control form-control-sm mt-2" type="text"  aria-label=".form-control-sm example">
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