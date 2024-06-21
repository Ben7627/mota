document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner le dernier élément du menu
    let lastMenuItem = document.querySelector('#menu-menu-principal .menu-item:last-child');
    let boutonContact = document.querySelector('.bouton-single');

    // Ajouter un gestionnaire d'événement pour le clic sur le dernier élément du menu
    if (lastMenuItem) {
        lastMenuItem.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche l'action par défaut du lien

            // Sélectionner la div avec la classe popup
            let popup = document.querySelector('.popup');
            let popupfond = document.querySelector('.fond-popup');

            // Ajouter la classe open à la div popup et à la div fond-popup
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
            event.preventDefault(); // Empêche l'action par défaut du lien

            // Sélectionner la div avec la classe popup
            let popup = document.querySelector('.popup');
            let popupfond = document.querySelector('.fond-popup');

            // Ajouter la classe open à la div popup et à la div fond-popup
            if (popup) {
                popup.classList.add('open');
            }
            if (popupfond) {
                popupfond.classList.add('open-fond');
            }
        });
    }
    // Ajouter un gestionnaire d'événement pour fermer la popup en cliquant sur fond-popup.open-fond
    document.addEventListener('click', function(event) {
        // Sélectionner la div avec la classe fond-popup et open-fond
        let popupfond = document.querySelector('.fond-popup.open-fond');
        let popup = document.querySelector('.popup.open');

        // Vérifier si le clic a eu lieu sur fond-popup.open-fond
        if (popupfond && popupfond.contains(event.target)) {
            if (popup) {
                popup.classList.remove('open');
            }
            popupfond.classList.remove('open-fond');
        }
    });
});
