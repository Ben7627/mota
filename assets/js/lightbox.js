document.addEventListener('DOMContentLoaded', function() {
    let iconOpen = document.querySelector('g#Icon_fullscreen');
    let iconCloseLightbox = document.querySelector('.lightbox__close')

    if (iconOpen) {
        iconOpen.addEventListener('click', function(event) {
             let lightbox = document.querySelector('.lightbox');

             lightbox.classList.add('open');

        });
    }

    if (iconCloseLightbox) {
        iconCloseLightbox.addEventListener('click', function(event) {
             let lightbox = document.querySelector('.lightbox');

             lightbox.classList.remove('open');

        });
    }

});