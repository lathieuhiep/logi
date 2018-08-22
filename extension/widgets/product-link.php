<?php
/**
 * Widget Name: Social Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class logi_product_link_widget extends WP_Widget {

    /**
     * Widget setup.
     */

    public function __construct() {

        $widget_ops = array(
            'classname'     =>  'product-link-widget',
            'description'   =>  'A widget that displays your producc link',
        );

        parent::__construct( 'product-link-widget', 'Logi Theme: Product Link', $widget_ops );

        add_action( 'admin_enqueue_scripts', [$this, 'ctup_wdscript'] );
    }

    function ctup_wdscript() {

        wp_enqueue_script('media-upload');
        wp_enqueue_script('ads_script', get_theme_file_uri( '/extension/assets/js/product-link.js' ), false, '1.0', true );

    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ) {

        echo $args['before_widget'];

    ?>

        <div class="product-link-widget__content">
            <img src="<?php echo esc_url( $instance['image_uri'] ); ?>" />

            <div class="product-link-widget__text">
                <h2 class="title">
                    <?php echo esc_html( $instance['title'] ); ?>
                </h2>

                <a class="product-link-widget__item" href="<?php echo esc_url( $instance['link'] ); ?>">
                    <?php echo esc_html( $instance['text_link'] ); ?>
                </a>
            </div>
        </div>

    <?php

        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    function form( $instance ) {

        $defaults = array(
            'title' => 'Products',
        );

        $instance = wp_parse_args( (array) $instance, $defaults );
    ?>

        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php esc_html_e( 'Title:', 'logi' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />

            <?php
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'text_link' ); ?>">
                <?php esc_html_e( 'Text Link:', 'logi' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'text_link' ); ?>" name="<?php echo $this->get_field_name( 'text_link' ); ?>" value="<?php echo $instance['text_link']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>">
                <?php esc_html_e( 'Link:', 'logi' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
        </p>

        <?php

    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title']      =   strip_tags( $new_instance['title'] );
        $instance['image_uri']  =   $new_instance['image_uri'];
        $instance['text_link']  =   strip_tags( $new_instance['text_link'] );
        $instance['link']       =   $new_instance['link'];

        return $instance;
    }

}

// Register social widget
function logi_register_widget_product_link() {
    register_widget( 'logi_product_link_widget' );
}

add_action( 'widgets_init', 'logi_register_widget_product_link' );