document.addEventListener('DOMContentLoaded', function() {
    let lastMenuItem = document.querySelector('#menu-menu-principal .menu-item:last-child');
    let boutonContact = document.querySelector('.bouton-single');

    if (lastMenuItem) {
        lastMenuItem.addEventListener('click', function(event) {
            event.preventDefault(); 

            let popup = document.querySelector('.popup');
            let popupfond = document.querySelector('.fond-popup');

            if (popup) {
                popup.classList.add('open');
            }
            if (popupfond) {
                popupfond.classList.add('open-fond');
            }
        });
    }
    if (boutonContact) {
        boutonContact.addEventListener('click', function(event) {
            event.preventDefault(); 

            let popup = document.querySelector('.popup');
            let popupfond = document.querySelector('.fond-popup');

            if (popup) {
                popup.classList.add('open');
            }
            if (popupfond) {
                popupfond.classList.add('open-fond');
            }
        });
    }
    document.addEventListener('click', function(event) {
        let popupfond = document.querySelector('.fond-popup.open-fond');
        let popup = document.querySelector('.popup.open');

        if (popupfond && popupfond.contains(event.target)) {
            if (popup) {
                popup.classList.remove('open');
            }
            popupfond.classList.remove('open-fond');
        }
    });
});
