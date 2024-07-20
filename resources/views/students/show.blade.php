<x-students :students="$students">
@section('modal')
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Parent</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('students.update',$student->child_id) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="modal-body">
              <div class="row g-3">
                  <div class="col-6">
                      <label for="username">Username</label>
                      <input name="username" value="{{ $student->username }}" class="form-control form-control-sm mt-2" type="text" aria-label=".form-control-sm example">
                  </div>
                  <div class="col-6">
                      <label for="contact_num">Age</label>
                      <input name="age" value="{{ $student->age }}" class="form-control form-control-sm mt-2" type="text" aria-label=".form-control-sm example">
                  </div>
                  <div class="col-6">
                      <label for="email">School level</label>
                      <input name="nivScolaire" value="{{ $student->nivScolaire }}" class="form-control form-control-sm mt-2" type="text" aria-label=".form-control-sm example">
                  </div>
                  <div class="col-6">
                    <label for="name">Parent name</label>
                    <select class="form-select form-select-sm mt-2" name="parent_id" id="">
                      @foreach($parents as $parent)
                      <option @selected($parent->parent_id == $student->parent_id) value="{{$parent->parent_id}}">{{$parent->username}}</option>
                      @endforeach
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
</x-students>