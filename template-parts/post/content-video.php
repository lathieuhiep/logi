<?php

$logi_video_post = get_post_meta(  get_the_ID() , 'logi_video_post', true );

if ( !empty( $logi_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $logi_video_post ); ?>
    </div>

<?php endif;?>