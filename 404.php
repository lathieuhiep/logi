<?php
get_header();

global $logi_options;

$logi_title = $logi_options['logi_404_title'];
$logi_content = $logi_options['logi_404_editor'];
$logi_background = $logi_options['logi_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $logi_background ) ):
                        echo wp_get_attachment_image( $logi_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $logi_title != '' ):
                        echo esc_html( $logi_title );
                    else:
                        esc_html_e( 'Awww...Don’t Cry', 'logi' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $logi_content != '' ) :
                        echo wp_kses_post( $logi_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( "It's just a 404 Error!", "logi" ); ?>
                            <br />
                            <?php esc_html_e( "What you’re looking for may have been misplaced", "logi" ); ?>
                            <br />
                            <?php esc_html_e( "in Long Term Memory.", "logi" ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'logi'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'logi'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>