function attachLightboxListeners() {
    let imgOpen = document.querySelectorAll('.img-container');
    let currentImgIndex = 0;

    function showImage(i) {
        if (i < 0) {
            i = imgOpen.length - 1;
        } else if (i >= imgOpen.length) {
            i = 0;
        }

        // Fermer la lightbox actuelle
        imgOpen[currentImgIndex].querySelector('.lightbox').classList.remove('open');

        // Ouvrir la lightbox de la nouvelle image
        currentImgIndex = i;
        imgOpen[currentImgIndex].querySelector('.lightbox').classList.add('open');
    }

    for (let i = 0; i < imgOpen.length; i++) {
        let img = imgOpen[i];
        let imgOverlay = img.querySelector('.header-overlay');
        let iconCloseLightbox = img.querySelector('.lightbox__close');
        let lightbox = img.querySelector('.lightbox');
        let prevLightbox = img.querySelector('.lightbox__prev');
        let nextLightbox = img.querySelector('.lightbox__next');

        imgOverlay.addEventListener('click', function(event) {
            currentImgIndex = i;
            lightbox.classList.add('open');
        });

        iconCloseLightbox.addEventListener('click', function(event) {
            lightbox.classList.remove('open');
        });

        prevLightbox.addEventListener('click', function(event) {
            showImage(currentImgIndex - 1);
        });

        nextLightbox.addEventListener('click', function(event) {
            showImage(currentImgIndex + 1);
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    attachLightboxListeners();
});
