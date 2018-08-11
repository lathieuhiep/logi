<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if( !is_admin() ):

        add_action('wp_head','logi_config_theme');

        function logi_config_theme() {

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

                    global $logi_options;
                    $logi_favicon = $logi_options['logi_favicon_upload']['url'];

                    if( $logi_favicon != '' ) :

                        echo '<link rel="shortcut icon" href="' . esc_url($logi_favicon) . '" type="image/x-icon" />';

                    endif;

            endif;
        }

        // Method add custom css, Css custom add here
        // Inline css add here
        /**
         * Enqueues front-end CSS for the custom css.
         *
         * @since Plazart Theme 1.1
         *
         * @see wp_add_inline_style()
         */

        add_action( 'wp_enqueue_scripts', 'logi_custom_css', 99 );

        function logi_custom_css() {

            global $logi_options;

            $logi_typo_selecter_1   =   $logi_options['logi_custom_typography_1_selector'];

            $logi_typo1_font_family   =   $logi_options['logi_custom_typography_1']['font-family'] == '' ? '' : $logi_options['logi_custom_typography_1']['font-family'];

            $logi_css_style = '';

            if ( $logi_typo1_font_family != '' ) :
                $logi_css_style .= ' '.esc_attr( $logi_typo_selecter_1 ).' { font-family: '.balanceTags( $logi_typo1_font_family, true ).' }';
            endif;

            if ( $logi_css_style != '' ) :
                wp_add_inline_style( 'logi-style', $logi_css_style );
            endif;

        }

    endif;
