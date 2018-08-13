<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_banner extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-banner';
    }

    public function get_title() {
        return esc_html__( 'Banner Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-bars';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__( 'Image', 'logi' ),
            ]
        );

        $this->add_control(
            'banner_image',
            [
                'label'     =>  esc_html__( 'Image Banner', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading',
            [
                'label' => esc_html__( 'Text', 'logi' ),
            ]
        );

        $this->add_control(
            'heading_1',
            [
                'label'         =>  esc_html__( 'Heading 1', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Heading 1', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'heading_2',
            [
                'label'         =>  esc_html__( 'Heading 2', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Heading 2', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

        /*STYLE TAB*/
        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__( 'Text', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color_1',
            [
                'label'     =>  __( 'Heading 1 Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .site-banner .banner-title .banner-title1' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'heading_color_2',
            [
                'label'     =>  __( 'Heading 2 Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .site-banner .banner-title .banner-title2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings           =   $this->get_settings();
        $banner_image_id    =   $settings['banner_image']['id'];

    ?>

        <div class="element-banner site-banner">
            <?php
            if ( !empty( $banner_image_id ) ) :
                echo wp_get_attachment_image( $banner_image_id, 'full' );
            else:
            ?>
                <img src="<?php echo esc_url( get_theme_file_uri( '/images/no-image-large.png' ) ); ?>" alt="no-image">
            <?php endif; ?>

            <div class="banner-title d-flex align-items-center">
                <div class="container">
                    <h6 class="banner-title1">
                        <?php echo esc_html( $settings['heading_1'] ); ?>
                    </h6>

                    <h2 class="banner-title2">
                        <?php echo esc_html( $settings['heading_2'] ); ?>
                    </h2>
                </div>
            </div>

            <?php if ( function_exists( 'bcn_display' ) ) : ?>

                <div class="site-breadcrumb">
                    <div class="container">
                        <div class="site-breadcrumb__inline">
                            <?php bcn_display(); ?>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        </div>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_banner );