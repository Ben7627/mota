jQuery(document).ready(function($) {
    let order = 'DESC';

    function filterPhotos() {
        let category = $('.select-categories .active').data('slug') || '';
        let titreCategory = $('.title-filters-categories');
        let format = $('.select-filters .active').data('format') || '';
        let titreFormat = $('.title-filters-formats');
        let paged = 1; 
        let data = {
            action: 'mota_filters_select',
            category: category,
            format: format,
            paged: paged,
            order: order
        };


        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: data,
            beforeSend: function() {
            },
            success: function(response) {
                let result = JSON.parse(response);
                if (result.html) {
                    $('.latest-photos').html(result.html);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }


    
    $('.select-categories li').on('click', function() {
        $('.select-categories li').removeClass('active');
        $(this).addClass('active');
        let categoryText = $(this).text();
        $('.title-filters-categories').text(categoryText);
        filterPhotos();
    });

    $('.select-filters li').on('click', function() {
        $('.select-filters li').removeClass('active');
        $(this).addClass('active');
        let formatText = $(this).text();
        $('.title-filters-formats').text(formatText);
        filterPhotos();
    });

    $('.tri-croissant').on('click', function() {
        order = 'ASC';
        $('.tri-decroissant').removeClass('active');
        $('.tri-croissant').removeClass('active');
        $(this).addClass('active');
        filterPhotos();
    });

    $('.tri-decroissant').on('click', function() {
        order = 'DESC';
        $('.tri-croissant').removeClass('active');
        $('.tri-decroissant').removeClass('active');        
        $(this).addClass('active');
        filterPhotos();
    });
});
