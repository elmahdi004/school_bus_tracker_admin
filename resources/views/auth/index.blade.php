<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/auth/auth.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
<title>school bus tracker system</title></head>
<body>
    <div class="main">
        <div class="form">
            <div class="image-form">
                <img src="{{asset('css/auth/images/bus-img.jpg')}}" alt="school bus" srcset="">
            </div>
            <div class="login-form">
                <div>
                    <div class="details">
                        <h3>Login to your account</h3>
                        <p>Welcome back! login with your data that you entered during registration</p>
                    </div>
                    <div class="form-cred">
                        <form action="">
                            @csrf
                            <div class="email">
                                <img src="{{asset('css/auth/images/icons8-mail.svg')}}" alt="" srcset="">
                                <input type="text" name="email" placeholder="Email">
                            </div>
                            <div class="password">
                                    <img src="{{asset('css/auth/images/icons8-lock.svg')}}" alt="" srcset="">
                                    <input type="password" name="password" placeholder="Password" id="password">
                                <img src="{{asset('css/auth/images/icons8-eye.svg')}}" alt="" srcset="" id="eye">
                            </div>
                            <div class="forget">
                                <div>
                                    <input type="checkbox" name="remember" id="">
                                    <p>Remember me</p>
                                </div>
                                <a href="#">Forgot your Password?</a>
                            </div>
                            <button>LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('js/auth/auth.js')}}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>