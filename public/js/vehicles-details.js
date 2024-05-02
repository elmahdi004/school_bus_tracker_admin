document.querySelectorAll('.nav-item').forEach((ele,index)=>{
    let navs = document.querySelectorAll('.nav-link');
    let section = document.querySelectorAll('.section');
    ele.onclick = function(){
        for(let i = 0 ; i < navs.length ;i++){
            navs[i].classList.remove('active')
            section[i].classList.remove('d-block');
            section[i].classList.add('d-none');
        }
        navs[index].classList.add('active');
        section[index].classList.remove('d-none');
        section[index].classList.add('d-block');

    }
})
