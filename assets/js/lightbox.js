document.addEventListener('DOMContentLoaded', function() {

    let imgOpen = document.querySelectorAll('.img-container');
    let currentImgIndex = 0;
    
    function showImage(i) {
        if (i < 0) {
            i = imgOpen.length - 1;
        } else if (i >= imgOpen.length) {
            i = 0;
        }
        currentImgIndex = i;
        const lightboxImg = imgOpen[i].querySelector('.lightbox-photos');
        const refOverlay = imgOpen[i].querySelector('.ref-overlay').innerHTML;
        const categOverlay = imgOpen[i].querySelector('.categ-overlay').innerHTML;

        document.querySelector('.lightbox__container .lightbox-photos').src = lightboxImg.src;
        document.querySelector('.lightbox.open .ref-overlay').innerHTML = refOverlay;
        document.querySelector('.lightbox.open .categ-overlay').innerHTML = categOverlay;
        
    }

    for (let i = 0; i < imgOpen.length; i++)  {
    let img = imgOpen[i];
    let imgOverlay = img.querySelector('.header-overlay')
    let iconCloseLightbox = img.querySelector('.lightbox__close')
    let lightbox = img.querySelector('.lightbox')
    let prevLightbox = img.querySelector('.lightbox__prev')
    let nextLightbox = img.querySelector('.lightbox__next')

    imgOverlay.addEventListener('click', function(event) {
            currentImgIndex = i;
            lightbox.classList.add('open');

        });

    iconCloseLightbox.addEventListener('click', function(event) {
            lightbox.classList.remove('open');
       });

       prevLightbox.addEventListener('click', function(event) {
        showImage(currentImgIndex - 1);
        console.log(currentImgIndex)
        console.log(img)
    });

    nextLightbox.addEventListener('click', function(event) {
        showImage(currentImgIndex + 1);
        console.log(currentImgIndex)

    });

    }
});