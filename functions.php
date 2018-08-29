<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*
 *constants
 */
if( !function_exists('logi_setup') ):

    function logi_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'logi', get_parent_theme_file_path( '/languages' ) );

        /**
         * plazart theme setup.
         *
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        //Enable support for Header (tz-demo)
        add_theme_support( 'custom-header' );

        //Enable support for Background (tz-demo)
        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menu('primary','Primary Menu');
        register_nav_menu('footer-menu','Footer Menu');

        // add theme support title-tag
        add_theme_support( 'title-tag' );

        /*  Post Type   */
        add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

        /*
	    * This theme styles the visual editor to resemble the theme style,
	    * specifically font, colors, icons, and column width.
	    */
        add_editor_style( array( 'css/editor-style.css', logi_fonts_url()) );
    }

    add_action( 'after_setup_theme', 'logi_setup' );

endif;

/*
 * post formats
 * */
function logi_post_formats() {

    if( has_post_format('audio') || has_post_format('video') ):
        get_template_part( 'template-parts/post/content','video' );
    elseif ( has_post_format('gallery') ):
        get_template_part( 'template-parts/post/content','gallery' );
    else:
        get_template_part( 'template-parts/post/content','image' );
    endif;

}

/*
* Required: include plugin theme scripts
*/
require get_parent_theme_file_path( '/extension/tz-process-option.php' );

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_parent_theme_file_path( '/extension/option-reudx/theme-options.php' );
}

if ( class_exists( 'RW_Meta_Box' ) ) {
    /*
     * Required: Meta Box Framework
     */
    require get_parent_theme_file_path( '/extension/meta-box/meta-box-options.php' );
}

if ( ! function_exists( 'logi_check_rwmb_meta' ) ) {
    function logi_check_rwmb_meta( $logi_rwmb_metakey, $logi_opt_args = '', $logi_rwmb_post_id = null ) {
        return false;
    }
}

if ( did_action( 'elementor/loaded' ) ) :
    /*
     * Required: Elementor
     */
    require get_parent_theme_file_path( '/extension/elementor/elementor.php' );

endif;

/* Require Post Type */
require get_parent_theme_file_path( '/extension/post-type/products.php' );

/* Require Widgets */
foreach(glob( get_parent_theme_file_path( '/extension/widgets/*.php' ) ) as $logi_file_widgets ) {
    require $logi_file_widgets;
}

/* Require HTML Compression */
require get_parent_theme_file_path( '/extension/WP-HTML-Compression.php' );

/**
 * Register Sidebar
 */
add_action( 'widgets_init', 'logi_widgets_init');

function logi_widgets_init() {

    $logi_widgets_arr  =   array(

        'logi-sidebar'    =>  array(
            'name'              =>  esc_html__( 'Sidebar', 'logi' ),
            'description'       =>  esc_html__( 'Display sidebar right or left on all page.', 'logi' )
        ),

        'logi-sidebar-product' =>  array(
            'name'              =>  esc_html__( 'Sidebar Product', 'logi' ),
            'description'       =>  esc_html__( 'Display sidebar on product.', 'logi' )
        ),

        'logi-footer-1'   =>  array(
            'name'              =>  esc_html__( 'Footer 1', 'logi' ),
            'description'       =>  esc_html__('Display footer column 1 on all page.', 'logi' )
        ),

        'logi-footer-2'   =>  array(
            'name'              =>  esc_html__( 'Footer 2', 'logi' ),
            'description'       =>  esc_html__('Display footer column 2 on all page.', 'logi' )
        ),

        'logi-footer-3'   =>  array(
            'name'              =>  esc_html__( 'Footer 3', 'logi' ),
            'description'       =>  esc_html__('Display footer column 3 on all page.', 'logi' )
        ),

        'logi-footer-4'   =>  array(
            'name'              =>  esc_html__( 'Footer 4', 'logi' ),
            'description'       =>  esc_html__('Display footer column 4 on all page.', 'logi' )
        )

    );

    foreach ( $logi_widgets_arr as $logi_widgets_id => $logi_widgets_value ) :

        register_sidebar( array(
            'name'          =>  esc_attr( $logi_widgets_value['name'] ),
            'id'            =>  esc_attr( $logi_widgets_id ),
            'description'   =>  esc_attr( $logi_widgets_value['description'] ),
            'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
            'after_widget'  =>  '</section>',
            'before_title'  =>  '<h2 class="widget-title">',
            'after_title'   =>  '</h2>'
        ));

    endforeach;

}

// Remove jquery migrate
add_action( 'wp_default_scripts', 'logi_remove_jquery_migrate' );
function logi_remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}

// Load jquery script in footer
add_action( 'init', 'logi_init_scripts'  );
function logi_init_scripts() {

    if ( !is_admin() ) :
        wp_deregister_script('jquery');

        // Load the copy of jQuery that comes with WordPress
        // The last parameter set to TRUE states that it should be loaded
        // in the footer.
        wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js', false, '', true );

        wp_enqueue_script('jquery');
    endif;

}

// Check deregister styles
add_action( 'wp_print_styles', 'logi_deregister_styles', 100 );
function logi_deregister_styles() {
    global $post;

    wp_deregister_style('font-awesome');

    if ( ! empty( $post ) && is_a( $post, 'WP_Post' ) ) :
        $plugin_photo = $post->post_content;

        if ( !has_shortcode( $plugin_photo, 'contact-form-7' ) ) :

            wp_deregister_style( 'contact-form-7' );
            wp_dequeue_script('contact-form-7');

        endif;

    endif;

}

// Register Back-End script
add_action( 'admin_enqueue_scripts', 'logi_register_back_end_scripts' );

function logi_register_back_end_scripts(){

    /* Start Get CSS Admin */
    wp_enqueue_style( 'logi-admin-styles', get_theme_file_uri( '/extension/assets/css/admin-styles.css' ) );

}

//Register Front-End Styles
add_action( 'wp_enqueue_scripts', 'logi_register_front_end' );

function logi_register_front_end() {

    /*
    * Start Get Css Front End
    * */

    /* Start Font */
    wp_enqueue_style( 'logi-fonts', logi_fonts_url(), array(), null );
    /* End Font */

    wp_enqueue_style( 'logi-main', get_theme_file_uri( '/css/main.css' ), array(), '' );

    /*  Start Style Css   */
    wp_enqueue_style( 'logi-style', get_stylesheet_uri() );
    /*  Start Style Css   */

    /*
    * End Get Css Front End
    * */


    /*
    * Start Get Js Front End
    * */

    // Load the html5 shiv.

    wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'logi-main-js', get_theme_file_uri( '/js/main.min.js' ), array(), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'logi-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.0.0', true );

    /*
   * End Get Js Front End
   * */

}

/**
 * Show full editor
 */
if ( !function_exists('logi_ilc_mce_buttons') ) :

    function logi_ilc_mce_buttons( $logi_buttons_TinyMCE ) {

        array_push( $logi_buttons_TinyMCE,
                "backcolor",
                "anchor",
                "hr",
                "sub",
                "sup",
                "fontselect",
                "fontsizeselect",
                "styleselect",
                "cleanup"
            );

        return $logi_buttons_TinyMCE;

    }

    add_filter("mce_buttons_2", "logi_ilc_mce_buttons");

endif;

// Start Customize mce editor font sizes
if ( ! function_exists( 'logi_mce_text_sizes' ) ) :

    function logi_mce_text_sizes( $logi_font_size_text ){
        $logi_font_size_text['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $logi_font_size_text;
    }

    add_filter( 'tiny_mce_before_init', 'logi_mce_text_sizes' );

endif;
// End Customize mce editor font sizes

/* callback comment list */
function logi_comments( $logi_comment, $logi_comment_args, $logi_comment_depth ) {

    if ( 'div' === $logi_comment_args['style'] ) :

        $logi_comment_tag       = 'div';
        $logi_comment_add_below = 'comment';

    else :

        $logi_comment_tag       = 'li';
        $logi_comment_add_below = 'div-comment';

    endif;

?>
    <<?php echo $logi_comment_tag ?> <?php comment_class( empty( $logi_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $logi_comment_args['style'] ) : ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    <?php endif; ?>

    <div class="comment-author vcard">
        <?php if ( $logi_comment_args['avatar_size'] != 0 ) echo get_avatar( $logi_comment, $logi_comment_args['avatar_size'] ); ?>

    </div>

    <?php if ( $logi_comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation">
            <?php esc_html_e( 'Your comment is awaiting moderation.', 'logi' ); ?>
        </em>
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
            <span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

            <?php edit_comment_link( esc_html__( 'Edit ', 'logi' ) ); ?>

            <?php comment_reply_link( array_merge( $logi_comment_args, array( 'add_below' => $logi_comment_add_below, 'depth' => $logi_comment_depth, 'max_depth' => $logi_comment_args['max_depth'] ) ) ); ?>

        </div>
        <div class="comment-text-box">
            <?php comment_text(); ?>
        </div>
    </div>

    <?php if ( 'div' != $logi_comment_args['style'] ) : ?>
        </div>
    <?php endif; ?>

<?php
}
/* callback comment list */

if ( ! function_exists( 'logi_fonts_url' ) ) :

    function logi_fonts_url() {
        $logi_fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $logi_font_google = _x( 'on', 'Google font: on or off', 'logi' );

        if ( 'off' !== $logi_font_google ) {
            $logi_font_families = array();

            if ( 'off' !== $logi_font_google ) {
                $logi_font_families[] = 'Roboto Condensed:400,700';
            }

            $logi_query_args = array(
                'family' => urlencode( implode( '|', $logi_font_families ) ),
                'subset' => urlencode( 'vietnamese' ),
            );

            $logi_fonts_url = add_query_arg( $logi_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $logi_fonts_url );
    }

endif;

/*
 * Content Nav
 */

if ( ! function_exists( 'logi_comment_nav' ) ) :

    function logi_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text">
                    <?php _e( 'Comment navigation', 'logi' ); ?>
                </h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'logi' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'logi' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->

    <?php
        endif;
    }

endif;

/*
 * TWITTER AMPERSAND ENTITY DECODE
 */
if( ! function_exists( 'logi_social_title' )):

    function logi_social_title( $logi_title ) {

        $logi_title = html_entity_decode( $logi_title );
        $logi_title = urlencode( $logi_title );

        return $logi_title;

    }

endif;

/****************************************************************************************************************
 * Fuction override post_class()
 * */

if ( ! function_exists( 'logi_post_classes' ) ) :

    function logi_post_classes( $logi_body_class ) {

        if ( is_category() || is_tag() || is_search() || is_author() || is_archive() || is_home() ) {
            $logi_body_class[] = 'site-post-item';
        }

        if ( is_single() ) {
            $logi_body_class[] = 'site-post-single-item';
        }
        return $logi_body_class;

    }

    add_filter( 'post_class', 'logi_post_classes' );

endif;

/**
 * Include the TGM_Plugin_Activation class.
 */
require get_parent_theme_file_path( '/plugins/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'logi_register_required_plugins' );
function logi_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $logi_plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Redux Framework',
            'slug'      =>  'redux-framework',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Meta Box',
            'slug'      =>  'meta-box',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Elementor',
            'slug'      =>  'elementor',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Breadcrumb Navxt',
            'slug'      =>  'breadcrumb-navxt',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Contact Form 7',
            'slug'      =>  'contact-form-7',
            'required'  =>  true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      =>  'Categories Images',
            'slug'      =>  'categories-images',
            'required'  =>  true,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $logi_config = array(
        'id'           => 'logi',          // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $logi_plugins, $logi_config );
}

/* Start Social Network */
function logi_get_social_url() {

    global $logi_options;
    $logi_social_networks = logi_get_social_network();

?>

        <?php
        foreach( $logi_social_networks as $logi_social ) :

            $logi_social_url = $logi_options['logi_social_network_' . $logi_social['id']];

            if( $logi_social_url ) :

        ?>

                <div class="social-network-item">
                    <a href="<?php echo esc_url( $logi_social_url ); ?>">
                        <i class="fa fa-<?php echo esc_attr( $logi_social['id'] ); ?>" aria-hidden="true"></i>
                    </a>
                </div>

        <?php
            endif;

        endforeach;
        ?>

<?php

}

function logi_get_social_network() {
    return array(

        array('id' => 'facebook', 'title' => 'Facebook'),
        array('id' => 'twitter', 'title' => 'Twitter'),
        array('id' => 'google-plus', 'title' => 'Google Plus'),
        array('id' => 'linkedin', 'title' => 'linkedin'),
        array('id' => 'pinterest', 'title' => 'Pinterest'),
        array('id' => 'youtube', 'title' => 'Youtube'),
        array('id' => 'instagram', 'title' => 'instagram'),
        array('id' => 'vimeo', 'title' => 'Vimeo'),

    );
}
/* End Social Network */

/* Start pagination */
function logi_pagination() {

    the_posts_pagination( array(
        'type' => 'list',
        'mid_size' => 2,
        'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        'screen_reader_text' => esc_html__( '&nbsp;', 'logi' ),
    ) );

}

// pagination nav query
function logi_paging_nav_query( $logi_querry ) {

    $logi_pagination_args  =   array(

        'prev_text' => '<i class="fa fa-angle-double-left"></i>' . esc_html__(' Previous', 'logi' ),
        'next_text' => esc_html__('Next', 'logi' ) . '<i class="fa fa-angle-double-right"></i>',
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $logi_querry -> max_num_pages,
        'type'      => 'list',

    );

    $logi_paginate_links = paginate_links( $logi_pagination_args );

    if ( $logi_paginate_links ) :

    ?>
        <nav class="pagination">

            <?php echo $logi_paginate_links; ?>

        </nav>

    <?php

    endif;

}

/* End pagination */
function logi_sanitize_pagination( $logi_content ) {
    // Remove role attribute
    $logi_content = str_replace('role="navigation"', '', $logi_content);

    // Remove h2 tag
    $logi_content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $logi_content);

    return $logi_content;
}

add_action('navigation_markup_template', 'logi_sanitize_pagination');

/* Posts per page taxonomy */
$logi_option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'logi_posts_per_page_taxonomy', 0);

function logi_posts_per_page_taxonomy() {
    add_filter( 'option_posts_per_page', 'logi_option_posts_per_page_taxonomy' );
}

function logi_option_posts_per_page_taxonomy() {

    global $logi_option_posts_per_page, $logi_options;

    $logi_product_limit = $logi_options['logi_product_limit'];

    if ( is_tax( 'product_cat') ) :
        return $logi_product_limit;
    else :
        return $logi_option_posts_per_page;
    endif;

}

/* Start Get col global */
function logi_col_use_sidebar( $option_sidebar, $active_sidebar ) {

    if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):
        $class_col_content = 'col-12 col-md-8 col-lg-9';
    else:
        $class_col_content = 'col-md-12';
    endif;

    return $class_col_content;
}

function logi_col_sidebar() {
    $class_col_sidebar = 'col-12 col-md-4 col-lg-3';

    return $class_col_sidebar;
}
/* End Get col global */