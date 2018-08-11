<?php

global $logi_options;

$logi_show_loading = $logi_options['logi_general_show_loading'] == '' ? '0' : $logi_options['logi_general_show_loading'];

if(  $logi_show_loading == 1 ) :

    $logi_loading_url  = $logi_options['logi_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $logi_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $logi_loading_url ); ?>" alt="<?php esc_attr_e('loading...','logi') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','logi') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>