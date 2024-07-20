<x-main id="3">
    @section('style')
    <link rel="stylesheet" href="{{asset('css/parents/parents.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/vehicles/vehicles.css')}}"> 
    @endsection
    @section('content')
    <h4>
        Students
    </h4>
    <div class="card py-4 px-4 my-4">
        <div class="card-head">
            <div class="d-flex justify-content-between">
                <div class="one d-flex align-items-center">
                    <i class="fa-solid fa-users mb-2"></i>
                    <h5 class="ms-2">Manage Students</h5>
                </div>
                <div class="actions"> 
                    <a href="{{ route('students.create') }}">
                        <h6 class="mt-2 ms-1">Add Student</h6>
                        <i class="fa-solid fa-add mb-1 px-1 py-1 mt-1"></i>
                    </a>
                </div>
            </div>
            <div class="card-body mt-4">
                <table class="table table-hover" id="">
                    <thead class="">
                        <tr class="">
                            <th scope="col">Nom</th>
                            <th scope="col">Age</th>
                            <th scope="col">School level</th>
                            <th scope="col">Parent</th>
                            <th scope="col">waypoint</th>
                            <th scope="col">In/Out bus</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->nivScolaire }}</td>
                            <td>{{ $student->parent->username }}</td>
                            @if (!$student->waypoint)
                            <td class="text-center"><i class="fa-solid fa-xmark"></i></td>
                            @else
                            <td class="text-center"><i class="fa-solid fa-check"></i></td>
                            @endif
                            @if ($student->status == 'hors du bus')
                            <td ><span id="status" class="text-danger bg-danger-subtle"> out </span></td>
                            @else
                            <td ><span id="status" class="text-success bg-success-subtle">in</span></td>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        {{-- <li><a class="dropdown-item" href="{{ route('students.details', $student->id) }}">Details</a></li> --}}
                                        <li><a class="dropdown-item" href="{{ route('students.update', $student->child_id) }}">Update</a></li>
                                        <li><a class="dropdown-item" href="{{ route('students.destroy', $student->child_id) }}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @yield('modal')
        </div>
    </div>
    
    @endsection

</x-main>