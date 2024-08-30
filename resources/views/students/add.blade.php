<x-students :students="$students">
    @section('modal')
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Add a student</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('students.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="row g-3">
                      <div class="col-6">
                          <label for="username">Full name</label>
                          <input required name="username" class="form-control form-control-sm mt-2" type="text" aria-label=".form-control-sm example">
                      </div>
                      <div class="col-6">
                          <label for="contact_num">Age</label>
                          <input required name="age" class="form-control form-control-sm mt-2" type="number" aria-label=".form-control-sm example">
                      </div>
                      <div class="col-6">
                          <label>school level</label>
                          <input  name="nivScolaire" class="form-control form-control-sm mt-2" type="text" aria-label=".form-control-sm example">
                      </div>
                      <div class="col-6">
                          <label for="parent_id">Parent</label>
                          <select required name="parent_id" class="form-control form-control-sm mt-2" aria-label=".form-control-sm example">
                              <option value="" disabled>Select Parent</option>
                              @foreach($parents as $parent)
                                  <option value="{{ $parent->parent_id }}">{{ $parent->username }}</option>
                              @endforeach
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
</x-students>