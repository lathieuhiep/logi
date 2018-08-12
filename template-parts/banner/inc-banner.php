<?php
global $logi_options;

if ( is_category() ) :

    $logi_banner_upload = $logi_options['logi_banner_blog_upload']['id'];

elseif ( is_tax( 'product_cat' ) || is_singular( 'product' ) ):

    $logi_banner_upload = $logi_options['logi_banner_product_upload']['id'];

endif;

if ( !empty( $logi_banner_upload ) ) :
?>

<div class="site-banner">
    <?php echo wp_get_attachment_image( $logi_banner_upload, 'full' ); ?>

    <div class="banner-title d-flex align-items-center">
        <div class="container">
            <?php if ( is_category() ) : ?>

                <h6 class="banner-title1">
                    <?php esc_html_e( 'Empowering your business', 'logi' ); ?>
                </h6>

                <h2 class="banner-title2">
                    <?php esc_html_e( 'Our Solutions', 'logi' ); ?>
                </h2>

            <?php elseif ( is_tax( 'product_cat' ) || is_singular( 'product' ) ) : ?>

                <h6 class="banner-title1">
                    <?php esc_html_e( 'Smart Innovation', 'logi' ); ?>
                </h6>

                <h2 class="banner-title2">
                    <?php esc_html_e( 'Our Products', 'logi' ); ?>
                </h2>

            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part( 'template-parts/breadcrumb/inc', 'breadcrumb' ); ?>
</div>

<?php
endif;

