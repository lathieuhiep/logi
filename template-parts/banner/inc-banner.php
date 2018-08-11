<?php
global $logi_options;

if ( is_category() ) :

    $logi_banner_upload = $logi_options['logi_banner_blog_upload']['id'];

elseif (is_tax( 'product_cat' ) || is_singular( 'product' ) ):

    $logi_banner_upload = $logi_options['logi_banner_product_upload']['id'];

endif;

if ( !empty( $logi_banner_upload ) ) :
?>

<div class="site-banner">
    <?php echo wp_get_attachment_image( $logi_banner_upload, 'full' ); ?>
</div>

<?php
endif;

