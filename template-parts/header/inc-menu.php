<?php
    global $logi_options;

    $logi_logo_image_id    =   $logi_options['logi_logo_image']['id'];
    $logi_information_show_hide = $logi_options['logi_information_show_hide'] == '' ? 1 : $logi_options['logi_information_show_hide'];
?>

<header id="home" class="header">
    <nav id="navigation" class="navbar-expand-lg d-flex">
        <div class="header-bottom flex-grow-1">
            <div class="header-bottom_warp d-lg-flex">
                <div class="site-logo">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                            if ( !empty( $logi_logo_image_id ) ) :
                                echo wp_get_attachment_image( $logi_logo_image_id, 'full' );
                            else :
                                echo'<img src="'.esc_url( get_theme_file_uri( '/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';
                            endif;
                        ?>
                    </a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target=".site-menu">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="site-menu collapse navbar-collapse d-lg-flex">

                    <?php

                    if ( has_nav_menu('primary') ) :

                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav flex-lg-grow-1 justify-content-lg-end',
                            'container'      => false,
                        ) ) ;

                    else:

                    ?>

                        <ul class="main-menu flex-lg-grow-1">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','logi' ); ?>
                                </a>
                            </li>
                        </ul>

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php
        if ( $logi_information_show_hide == 1 ) :
            get_template_part( 'template-parts/header/inc', 'information' );
        endif;
        ?>
    </nav>
</header>