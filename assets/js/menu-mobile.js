document.addEventListener('DOMContentLoaded', function() {
    let buttonburger = document.querySelector('.button-nav-menu-mobile');
    let buttonClose = document.querySelector('.button-close-menu-mobile');

    if (buttonburger) {
        buttonburger.addEventListener('click', function(event) {
            let menu = document.querySelector('.main-navigation');
            let button = document.querySelector('.js-menu-toggle.menu-toggle');
            console.log(buttonburger);

            menu.classList.add('open');
            button.classList.add('active');
        });
    }

    if (buttonClose) {
        buttonClose.addEventListener('click', function(event) {
            let menu = document.querySelector('.main-navigation');
            let button = document.querySelector('.js-menu-toggle.menu-toggle');
            console.log(buttonClose);

            menu.classList.remove('open');
            button.classList.remove('active');
        });
    }
});
