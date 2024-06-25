document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

        });
    });

});
const aside = document.querySelector('aside.menu');
const main_content = document.querySelector('.main-content');

if(window.innerWidth < 768){
    aside.style.width='0';
    aside.style.padding = '0'
    main_content.style.marginLeft = '0'
}else {
    aside.style.width='256px';
    aside.style.padding = '10px'
    main_content.style.marginLeft = '256px'
}

window.addEventListener('resize',function () {
    const aside = document.querySelector('aside.menu');
    const main_content = document.querySelector('.main-content');

    if(window.innerWidth < 768){
        aside.style.width='0';
        aside.style.padding = '0'
        main_content.style.marginLeft = '0'
    }else {
        aside.style.width='256px';
        aside.style.padding = '10px'
        main_content.style.marginLeft = '256px'
    }
})

const menu_click = document.querySelector(".menu-click");
let valida = true;


menu_click.innerHTML = "<i class=\"fa-solid fa-angles-right\"></i>";

menu_click.addEventListener('click', function () {
    if(valida){
        menu_click.innerHTML = "<i class=\"fa-solid fa-angles-left\"></i>";
        aside.style.width='0';
        aside.style.padding = '0'
        main_content.style.marginLeft = '0'
        valida=false;
    }else {
        menu_click.innerHTML = "<i class=\"fa-solid fa-angles-right\"></i>";
        aside.style.width='256px';
        aside.style.padding = '10px'
        main_content.style.marginLeft = '256px'
        valida=true;
    }

})















