jQuery(document).ready(function($) {
    let order = 'DESC';

    function filterPhotos() {
        let category = $('.select-categories .active').data('slug') || '';
        let format = $('.select-filters .active').data('format') || '';
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
                    attachLightboxListeners();
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
        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-categories').html(categoryText + response);
                filterPhotos();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération du SVG : ', error);
            }
        });
    });

    $('.select-filters li').on('click', function() {
        $('.select-filters li').removeClass('active');
        $(this).addClass('active');
        let formatText = $(this).text();
        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-formats').html(formatText + response);
                filterPhotos();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération du SVG : ', error);
            }
        });
    });

    $('.tri-croissant').on('click', function() {
        order = 'ASC';
        $('.tri-decroissant').removeClass('active');
        $('.tri-croissant').removeClass('active');
        $(this).addClass('active');
        let ascText = $(this).text();
        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-tri').html(ascText + response);
                filterPhotos();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération du SVG : ', error);
            }
        });
    });

    $('.tri-decroissant').on('click', function() {
        order = 'DESC';
        $('.tri-croissant').removeClass('active');
        $('.tri-decroissant').removeClass('active');        
        $(this).addClass('active');
        let descText = $(this).text();
        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-tri').html(descText + response);
                filterPhotos();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération du SVG : ', error);
            }
        });
    });
});
