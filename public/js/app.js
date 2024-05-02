document.getElementById('btn-menu').onclick = function (){
    console.log('click');
    let dashboard = document.getElementById('dashboard');
    let content = document.getElementById('content');
    let openDashoard = document.getElementById('open-dash');
    dashboard.classList.remove('col-3');
    dashboard.style.display = "none";
    content.classList.remove('col-9');
    content.classList.add('col-12');
    openDashoard.style.display = "block"
}
document.getElementById('open-dash').onclick = ()=>{
    let dashboard = document.getElementById('dashboard');
    let content = document.getElementById('content');
    let openDashoard = document.getElementById('open-dash');
    dashboard.classList.add('col-3');
    dashboard.style.display = "block";
    content.classList.remove('col-12');
    content.classList.add('col-9');
    openDashoard.style.display = "none"

}
document.querySelector('.navbar-actions .item').onclick = ()=>{
document.querySelector('.notification').classList.toggle('active');
}
document.querySelector('.navbar-actions .item-2').onclick = ()=>{
    document.querySelector('.logout-section').classList.toggle('active');
    }

