document.getElementById('eye').onclick = ()=>{
    let password = document.getElementById('password');
    let eye = document.getElementById('eye');
    if(password.getAttribute('type') == 'password'){
            eye.setAttribute('src','css/auth/images/icons8-closed-eye.svg')
            password.setAttribute('type','text')
    }else{
        eye.setAttribute('src','css/auth/images/icons8-eye.svg')
        password.setAttribute('type','password')
    }
}