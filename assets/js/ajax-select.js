let currentPage = 1;
let order = 'DESC';

jQuery(document).ready(function($) {
    function filterPhotos(paged = 1) {
        let category = $('.select-categories .active').data('slug') || '';
        let format = $('.select-filters .active').data('format') || '';
        
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
                // Optionally show a loading indicator
            },
            success: function(response) {
                let result = JSON.parse(response);
                if (paged === 1) {
                    $('.latest-photos').html(result.html);
                } else {
                    $('.latest-photos').append(result.html);
                }
                attachLightboxListeners();
                
                if (!result.more_posts) {
                    $('.load-button-photos').hide();
                } else {
                    $('.load-button-photos').show();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }

    $('.load-button-photos').on('click', function() {
        currentPage++;
        filterPhotos(currentPage);
    });

    $('.select-categories li').on('click', function() {
        $('.select-categories li').removeClass('active');
        $(this).addClass('active');
        let categoryText = $(this).text();
        currentPage = 1;

        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-categories').html(categoryText + response);
                filterPhotos(currentPage);
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
        currentPage = 1;

        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-formats').html(formatText + response);
                filterPhotos(currentPage);
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
        currentPage = 1;

        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-tri').html(ascText + response);
                filterPhotos(currentPage);
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
        currentPage = 1;

        $.ajax({
            url: mota_js.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_chevron_svg'
            },
            success: function(response) {
                $('.title-filters-tri').html(descText + response);
                filterPhotos(currentPage);
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération du SVG : ', error);
            }
        });
    });

});
