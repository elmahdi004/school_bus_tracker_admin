<x-route :routes="$routes">
    @section('modal')
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Route</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('routes.destroy',$id)}}" method="POST">
                @method('DELETE')
                @csrf
            <div class="modal-body">
                <h6>Are you sure that you want to delete this route ?</h6>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </div>
        </form>
          </div>
        </div>
      </div>
      </button>
    @endsection
</x-route>