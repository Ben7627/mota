let currentPage = 1;
jQuery(document).ready(function($) {
    $('.load-button-photos').on('click', function() {
        currentPage++;

        $.ajax({
            type: 'POST',
            url: mota_js.ajaxurl,
            dataType: 'json',
            data: {
                action: 'mota_load_more',
                paged: currentPage,
            },
            success: function(res) {
                if (res.html.trim() === '') {
                    $('.load-button-photos').hide();
                } else {
                    $('.latest-photos').append(res.html);
                    attachLightboxListeners();
                }
                if (!res.more_posts) {
                    $('.load-button-photos').hide();
                }
            }
        });
    });
});
