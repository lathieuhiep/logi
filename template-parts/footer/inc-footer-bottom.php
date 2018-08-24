<?php
//Global variable redux
global $logi_options;

$logi_copyright = $logi_options ['logi_footer_copyright_editor'] == '' ? 'Copyright &amp; Templaza' : $logi_options ['logi_footer_copyright_editor'];

?>

<div class="site-footer__bottom">
    <div class="container">
        <div class="site-copyright-menu d-flex align-items-lg-center flex-column flex-lg-row">

            <div class="site-copyright order-2 order-lg-1">
                <?php echo wp_kses_post( $logi_copyright ); ?>
            </div>

            <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>

                <div class="site-footer__menu order-1 order-lg-2">
                    <nav>
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'footer-menu',
                                'menu_class'        => 'menu-footer',
                                'container'         =>  false,
                            ));
                        ?>
                    </nav>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>