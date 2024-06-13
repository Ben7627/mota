/* Modale contact */


    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionner le dernier élément du menu
        let lastMenuItem = document.querySelector('#menu-menu-principal .menu-item:last-child');
    
        // Ajouter un gestionnaire d'événement pour le clic
        lastMenuItem.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche l'action par défaut du lien
    
            // Sélectionner la div avec la classe popup
            let popup = document.querySelector('.popup');
    
            // Ajouter la classe close à la div popup
            if (popup) {
                popup.classList.add('open');
            }
        });
    });