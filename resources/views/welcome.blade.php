<x-main id="1">
    @section('content')
    <h4>
        Dashboard
    </h4>
    <div class="totals row row-gap-3">
        <div class="item col-3">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="image">
                        <img src="{{asset('css/images/icons8-route.svg')}}" alt="" srcset="">
                    </div>
                    <div class="details">
                            <h4>200</h4> 
                        <p>Total Routes</p>
                    </div>
                </div>
        </div>
        </div>
        <div class="item col-3">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="image">
                        <img src="{{asset('css/images/icons8-student.svg')}}" alt="" srcset="">
                    </div>
                    <div class="details">
                        @isset($studentCount)
                            <h4>{{ $studentCount }}</h4>
                        @endisset
                        <p>Total Students</p>
                    </div>
                </div>
        </div>
        </div>
        <div class="item col-3">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="image">
                        <img src="{{asset('css/images/icons8-assistant.svg')}}" alt="" srcset="">
                    </div>
                    <div class="details">
                        <h4>200</h4>
                        <p>Total Assistants</p>
                    </div>
                </div>
        </div>
        </div>
        <div class="item col-3">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="image">
                        <img src="{{asset('css/images/icons8-driver.svg')}}" alt="" srcset="">
                    </div>
                    <div class="details">
                        @isset($driversCount)
                        <h4>{{ $driversCount }}</h4>
                    @endisset
                        <p>Total Drivers</p>
                    </div>
                </div>
        </div>
        </div>

 <div class="gap" style="height: 20px;"></div>

        <div class="item col-3">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="image">
                        <img src="{{asset('css/images/icons8-parent.svg')}}" alt="" srcset="">
                    </div>
                    <div class="details">
                        @isset($parentsCount)
                        <h4>{{ $parentsCount }}</h4>
                    @endisset
                        <p>Total Parents</p>
                    </div>
                </div>
        </div>
        </div>
 
    </div>
    @endsection
</x-main>