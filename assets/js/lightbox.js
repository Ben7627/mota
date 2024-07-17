document.addEventListener('DOMContentLoaded', function() {

    let imgOpen = document.querySelectorAll('.img-container');
        
    for (let img of imgOpen) {

    let imgOverlay = img.querySelector('.header-overlay')
    let iconCloseLightbox = img.querySelector('.lightbox__close')
    let lightbox = img.querySelector('.lightbox');

    imgOverlay.addEventListener('click', function(event) {
            lightbox.classList.add('open');
        });

        iconCloseLightbox.addEventListener('click', function(event) {
            lightbox.classList.remove('open');
       });
    }
});