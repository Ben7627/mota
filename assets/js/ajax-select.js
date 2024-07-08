jQuery(document).ready(function($) {
    function filterPhotos() {
        let category = $('.select-categories .active').data('slug') || '';
        let format = $('.select-filters .active').data('format') || '';
        let paged = 1; 
        let data = {
            action: 'mota_filters_select',
            category: category,
            format: format,
            paged: paged
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
        filterPhotos();
    });

    $('.select-filters li').on('click', function() {
        $('.select-filters li').removeClass('active');
        $(this).addClass('active');
        filterPhotos();
    });
});
