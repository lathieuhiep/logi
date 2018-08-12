<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_heading extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-heading';
    }

    public function get_title() {
        return esc_html__( 'Heading Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-header';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_heading',
            [
                'label' => esc_html__( 'Heading', 'logi' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Heading', 'logi' ),
                'label_block'   =>  true
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
                    '{{WRAPPER}} .element-heading .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-heading .title',
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label'     =>  __( 'Border Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-heading' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();

    ?>

        <div class="element-heading">
            <h2 class="title">
                <?php echo esc_html( $settings['heading'] ); ?>
            </h2>
        </div>

    <?php
    }

    protected function _content_template() {
    ?>

        <div class="element-heading">
            <h2 class="title">
                {{{ settings.heading }}}
            </h2>
        </div>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_heading );