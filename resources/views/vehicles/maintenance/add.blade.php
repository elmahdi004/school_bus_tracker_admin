<x-bus-maintenance  :busMaintenances="$busMaintenances" :vehicle="$vehicle" :idNav="$idNav" :driver="$driver" :routes="$routes">
@section('modal')
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Reminder</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('maintenance.add',$vehicle->id)}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="row g-3">
                <div class="col-6">
                    <label for="name">Maintenance type</label>
                    <select required class="form-select form-select-sm mt-2" name="maintenace_type" id="">
                        @foreach ($maintenanceType as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="col-6">
                    <label for="name">Date</label>
                    <input required name="date"  class="form-control form-control-sm mt-2" type="date"  aria-label=".form-control-sm example">
                </div>
                <div class="form-floating">
                    <textarea name="description" class="form-control form-control-sm" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
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
@endsection
</x-bus-maintenance>