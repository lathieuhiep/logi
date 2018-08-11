<?php

    $logi_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $logi_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $logi_audio ) ) : ?>

                <?php echo wp_oembed_get( $logi_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $logi_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>