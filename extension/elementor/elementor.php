<?php

namespace Elementor;

class logi_plugin_elementor_widgets {

    /**
     * Plugin constructor.
     */
    public function __construct() {

        $this->logi_elementor_add_actions();
    }

    function logi_elementor_add_actions() {

        add_action( 'elementor/elements/categories_registered', [ $this, 'logi_elementor_widget_categories' ] );

        add_action( 'elementor/widgets/widgets_registered', [ $this, 'logi_elementor_widgets_registered' ] );

        add_action( 'elementor/frontend/after_enqueue_styles', [$this, 'logi_elementor_script'] );

    }

    function logi_elementor_widget_categories() {

        Plugin::instance()->elements_manager->add_category(
            'logi_widgets',
            [
                'title' => esc_html__( 'Logi theme Widgets', 'logi' ),
                'icon'  => 'icon-goes-here'
            ]
        );

    }

    function logi_elementor_widgets_registered() {
        foreach(glob( get_parent_theme_file_path( '/extension/elementor/widgets/*.php' ) ) as $file){
            require $file;
        }
    }

    function logi_elementor_script() {
        wp_register_script( 'logi-elementor-custom', get_theme_file_uri( '/js/elementor-custom.js' ), array(), '1.0.0', true );
    }

}

new logi_plugin_elementor_widgets();


/* Start get Category check box */
function logi_check_get_cat( $type_taxonomy ) {

    $cat_check    =   array();
    $category     =   get_terms(
        array(
            'taxonomy'      =>  $type_taxonomy,
            'hide_empty'    =>  false
        )
    );

    if ( isset( $category ) && !empty( $category ) ):

        foreach( $category as $item ) {

            $cat_check[$item->term_id]  =   $item->name.'('. $item->count .')';

        }

    endif;

    return $cat_check;

}
/* End get Category check box */