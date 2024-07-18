document.addEventListener('DOMContentLoaded', function() {
    let buttonCategorie = document.querySelector('.title-filters-categories');
    let selectCategorie = document.querySelector('.select-categories');
    let buttonFilters = document.querySelector('.title-filters-formats');
    let selectFilters = document.querySelector('.select-filters');
    let buttonTri = document.querySelector('.title-filters-tri');
    let selectTri = document.querySelector('.select-tri');

        buttonCategorie.addEventListener('click', function(event) {
            if (buttonCategorie.classList.contains('active')) {
                selectCategorie.classList.remove('open');
                buttonCategorie.classList.remove('active');
            } else {
                selectCategorie.classList.add('open');
                buttonCategorie.classList.add('active');
            }
        });

        buttonFilters.addEventListener('click', function(event) {
            if (buttonFilters.classList.contains('active')) {
                selectFilters.classList.remove('open');
                buttonFilters.classList.remove('active');
            } else {
                selectFilters.classList.add('open');
                buttonFilters.classList.add('active');
            }
        });

        buttonTri.addEventListener('click', function(event) {
            if (buttonTri.classList.contains('active')) {
                selectTri.classList.remove('open');
                buttonTri.classList.remove('active');
            } else {
                selectTri.classList.add('open');
                buttonTri.classList.add('active');
            }
        });
});
