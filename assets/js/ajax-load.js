let currentPage = 1;
jQuery(document).ready(function($) {
    $('.load-button-photos').on('click', function() {
        currentPage++;

        $.ajax({
            type: 'POST',
            url: mota_js.ajaxurl,
            dataType: 'html',
            data: {
                action: 'mota_load_more',
                paged: currentPage,
            },
            success: function (res) {
                $('.latest-photos').append(res);
            }
        });
    });
});
