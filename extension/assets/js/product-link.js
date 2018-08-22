( function( $ ) {

    "use strict";

    $( document ).ready( function () {

        media_upload('.custom_media_button.button');

    });

    function media_upload(button_class) {
        let _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

        $('body').on('click', button_class, function(e) {
            let button_id ='#'+$(this).attr('id'),
                self = $(button_id),
                send_attachment_bkp = wp.media.editor.send.attachment,
                button = $(button_id),
                id = button.attr('id').replace('_button', '');
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media  ) {
                    $('.custom_media_id').val(attachment.id);
                    $('.custom_media_url').val(attachment.url);
                    $('.custom_media_image').attr('src',attachment.url).css('display','block');
                } else {
                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                }
            };
            wp.media.editor.open(button);
            return false;
        });
    }

} )( jQuery );