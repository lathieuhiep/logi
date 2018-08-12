<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_services extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-services';
    }

    public function get_title() {
        return esc_html__( 'Services Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-cog';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__( 'Image', 'logi' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label'     =>  esc_html__( 'Image Services', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'logi' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Warranty Support',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'         =>  esc_html__( 'Description', 'logi' ),
                'type'          =>  Controls_Manager::TEXTAREA,
                'default'       =>  'Logicode provides in-house warranty support and out-of-warranty repairs. We keep common spare parts so that we can turnaround your problem units in the shortest time. We also provide on-site repair services. When you purchase our products, you can be always be assured of our quality services.',
                'show_label'    =>  false,
            ]
        );

        $this->end_controls_section();

        /*STYLE TAB*/
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => esc_html__( 'Title', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     =>  __( 'Title Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-services .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-services .title',
            ]
        );

        $this->add_control(
            'line_color',
            [
                'label'     =>  __( 'Title Line Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-services .title:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_description',
            [
                'label' => esc_html__( 'Description', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     =>  __( 'Description Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-services .description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-services .description',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();
        $image_id   =   $settings['image']['id'];

    ?>

        <div class="element-services">
            <div class="image-services">
                <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
            </div>

            <h2 class="title">
                <?php echo esc_html( $settings['title'] ); ?>
            </h2>

            <p class="description">
                <?php echo esc_html( $settings['description'] ); ?>
            </p>
        </div>

    <?php

    }

    protected function _content_template() {
    ?>

        <div class="element-services">
            <div class="image-services">
                <img src="{{ settings.image.url }}">
            </div>

            <h2 class="title">
                {{{ settings.title }}}
            </h2>

            <p class="description">
                {{{ settings.description }}}
            </p>
        </div>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_services );