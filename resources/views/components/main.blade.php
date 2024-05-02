<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
<<<<<<< HEAD
    <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href={{asset('css/icons/raQib-no-bg.png')}}>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
@yield('style')
<title>raQib-admin-system</title>
=======
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
<title>school bus tracker system</title>
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
</head>
<body>
    <div class="open-dash" id="open-dash">
        <button>
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
<<<<<<< HEAD
    <div class="logout-section">
            <a href="{{route('logout')}}">Logout</a>
    </div>
    <div class="notification shadow">
        <div class="container">
            <div class="head">
                <div class="parte">
                    <div class="parteOne">
                        <h4>
                            Notifications
                        </h4>
                        <a href="{{route('vehicles.notificationMarkAllAsRead')}}">
                            Mark all as read
                        </a>
                    </div>
                    <div class="partTwo">
                            <Button class="btn-one">
                                <span>All</span>
                                <span>{{Auth::guard('administrations')->user()->unreadNotifications->count()}}</span>
                            </Button>
                            <Button class="btn-two">Archive</Button>
                    </div>
                </div>
            </div>
            <div class="body">
                @if(Auth::guard('administrations')->user()->unreadNotifications->count() == 0)
                <div class="d-flex justify-content-center mt-5">
                    <h6>Empty</h6>
                </div>
                @else
                @foreach (Auth::guard('administrations')->user()->unreadNotifications as $notification)    
                <div class="item">
                    <a href="{{route('vehicles.detailsWithNotification',['id'=>$notification->data['vehicle_id'],$notification])}}">
                        <div class="item-section">
                            <div class="one">
                                <div class="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div class="details">
                                    <h3>{{Str::limit($notification->data['vehicle_name'] . '-' . $notification->data['maintenance_type'],30)}}</h3>
                                    <h6>{{{$notification->created_at->diffForHumans()}}}</h6>
                                </div>
                            </div>
                            <div class="two">
                                <div class="arrow">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
=======
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
    <div class="main row">
        <div class="dashboard col-3" id="dashboard">
            <div class="logo">
                <div>
<<<<<<< HEAD
                    <img src="{{asset('css/images/raQib-logo.png')}}" alt="user image" srcset="" style="width: 95%; margin-left: 10px;">
=======
                    LOGO
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                </div>
                <button id="btn-menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="select">
                <ul>
                    <li class="{{$id == "1" ? 'active' : ''}}">
                            <div>
<<<<<<< HEAD
                                <a href="{{route('dashboard')}}">
=======
                                <a href="/">
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                                    <div class="icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <h4>Dashboard</h4>
                                </a>
                            </div>
                    </li>
                    <li class="{{$id == "2" ? 'active' : ''}}">
                        <div>
<<<<<<< HEAD
                            <a href="/vehicles">
=======
                            <a href="{{route('vehicles')}}">
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                                <div class="icon">
                                    <i class="fa-solid fa-bus"></i>
                                </div>
                                <h4>Vehicles</h4>
                            </a>
                        </div>
                    </li>
                    <li class="{{$id == "3" ? 'active' : ''}}">
                        <div>
                            <a href="{{route('students')}}">
                                <div class="icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <h4>Students</h4>
                            </a>
                        </div>
                    </li>
                    <li class="{{$id == "4" ? 'active' : ''}}">
                        <div>
<<<<<<< HEAD
                            <a href="{{route('drivers.index')}}">
=======
                            <a href="{{route('drivers')}}">
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                                <div class="icon">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <h4>Drivers</h4>
                            </a>
                        </div>
                    </li>
                    <li class="{{$id == "5" ? 'active' : ''}}">
                        <div>
<<<<<<< HEAD
                            <a href="{{route('parents.index')}}">
=======
                            <a href="{{route('parents')}}">
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                                <i class="fa-solid fa-person-breastfeeding"></i>
                                <h4>Parents</h4>
                            </a>
                        </div>
                    </li>
                    <li class="{{$id == "6" ? 'active' : ''}}">
                        <div>
<<<<<<< HEAD
                            <a href="{{route('assistants.index')}}">
=======
                            <a href="{{route('assistants')}}">
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                                <i class="fa-solid fa-hands-holding-child"></i>
                                <h4>Assistants</h4>
                            </a>
                        </div>
                    </li>
                    <li class="{{$id == "7" ? 'active' : ''}}">
                        <div>
                            <a href="{{route('routes')}}">
                                <i class="fa-solid fa-road"></i>
                                <h4>Routes</h4>
                            </a>
                        </div>
                    </li>
                    <li class="{{$id == "8" ? 'active' : ''}}">
                        <div>
                            <a href="{{route('incidents')}}">
                                <i class="fa-solid fa-car-burst"></i>
                                <h4>Incidents</h4>
                            </a>
                        </div>
                    </li>
                    <li class="{{$id == "9" ? 'active' : ''}}">
                        <div>
                            <a href="{{route('reports')}}">
                                <i class="fa-solid fa-calendar-minus"></i>
                                <h4>Reports</h4>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content col-9" id="content">
            <div class="container">
                    <div class="navbar">

                        <div class="search">
                            <input type="text" name="" id="" placeholder="search here">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                        <div class="actions">
                            <div class="navbar-actions">
                                <div class="item">
                                    <a href="#">
                                        <i class="fa-regular fa-bell"></i>
<<<<<<< HEAD
                                        <div>
                                            <span>{{Auth::guard('administrations')->user()->unreadNotifications->count()}}</span>
                                        </div>
=======
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                                    </a>
                                </div>
                                <div class="item-2">
                                    <a href="#">
                                        <i class="fa-solid fa-gear"></i>
                                        </a>
                                </div>
                            </div>
                            <div class="separator">

                            </div>
                            <div class="user">
<<<<<<< HEAD
                                <p>Hello, <span>{{Auth::guard('administrations')->user()->name}}</span></p>
=======
                                <p>Hello, <span>El Mahdi</span></p>
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
                                <div class="user-image">
                                    <img src="{{asset('css/images/user-image.avif')}}" alt="user image" srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        @yield('content')
                    </div>
            </div>
        </div>
    </div>
</body>
<<<<<<< HEAD


{{-- Script to Hide Sidebar by Default and Toggle Visibility on Click --}}
{{-- <script>  
    document.addEventListener('DOMContentLoaded', function() {
        const openDash = document.getElementById('open-dash');
        const btnMenu = document.getElementById('btn-menu');
        const dashboard = document.getElementById('dashboard');
        const content = document.getElementById('content');

        // Initially hide the sidebar
        dashboard.classList.add('hide');

        // Trigger a click event on the toggle button
        btnMenu.click();

        openDash.addEventListener('click', function() {
            // Toggle the width of the sidebar and the left margin of the main content
            dashboard.classList.toggle('hide');
            content.classList.toggle('expand');
        });
    });
</script> --}}


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/datatable-config.js')}}"></script>
<script src="{{asset('js/launch-modal.js')}}"></script>
<script src="{{asset('js/launch-modal2.js')}}"></script>
<script src="{{asset('js/vehicles-details.js')}}"></script>
=======
<script src="{{asset('js/app.js')}}"></script>
>>>>>>> becd55fda6263ea4e9f703d49866496a3b45c140
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>