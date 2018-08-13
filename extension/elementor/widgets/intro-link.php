<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_intro_link extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-intro-link';
    }

    public function get_title() {
        return esc_html__( 'Intro Link Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-link';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'logi' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_image',
            [
                'label'     =>  esc_html__( 'Image', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_title', [
                'label'         =>  esc_html__( 'Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'RETAIL' , 'logi' ),
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label'     =>  esc_html__( 'Content', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  5,
                'default'   =>  'Connect with shoppers and keep them coming back',
            ]
        );

        $repeater->add_control(
            'list_link',
            [
                'label'         =>  esc_html__( 'Link', 'logi' ),
                'type'          =>  Controls_Manager::URL,
                'placeholder'   =>  'https://your-link.com',
                'show_external' =>  false,
                'default' => [
                    'url'           =>  '#',
                ],
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     =>  esc_html__( 'Repeater List', 'logi' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    =>  $repeater->get_controls(),
                'default'   =>  [
                    [
                        'list_title'    =>  esc_html__( 'RETAIL', 'logi' ),
                        'list_content'  =>  esc_html__( 'Connect with shoppers and keep them coming back.', 'logi' ),
                        'list_link'     =>  '#',
                    ],
                    [
                        'list_title'    =>  esc_html__( 'HEALTHCARE', 'logi' ),
                        'list_content'  =>  esc_html__( 'Enhance clinical performance and improves delivery of care.', 'logi' ),
                        'list_link'     =>  '#',
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bk_overlay',
            [
                'label' => esc_html__( 'Background Overlay', 'logi' ),
            ]
        );

        $this->add_control(
            'background_overlay',
            [
                'label' => esc_html__( 'Background Overlay', 'logi' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'logi'),
                'label_off'     =>  esc_html__('No', 'logi'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'background_overlay_color',
            [
                'label' => esc_html__( 'Background Overlay Color', 'logi' ),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.5)',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'background_overlay',
                            'value' => 'yes',
                        ],
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .element-intro-link__item:before' => 'background-color: {{VALUE}}',
                ],
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
            'heading_color',
            [
                'label'     =>  __( 'Title Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-intro-link .element-intro-link__item .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-intro-link .element-intro-link__item .title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__( 'Content', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_content',
            [
                'label'     =>  __( 'Color Content', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-intro-link .element-intro-link__item .content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-intro-link .element-intro-link__item .content',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();

        if ( $settings['list'] ) :
    ?>

        <div class="element-intro-link">
            <?php foreach ( $settings['list'] as $item ) : ?>

                <div class="element-intro-link__item">
                    <a class="item-link" href="<?php echo esc_url( $item['list_link']['url'] ) ?>"></a>

                    <figure class="item-image">
                        <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                    </figure>

                    <div class="element-intro-link__box d-flex justify-content-center flex-column">
                        <h4 class="title">
                            <?php echo esc_html( $item['list_title'] ); ?>
                        </h4>

                        <p class="content">
                            <?php echo wp_kses_post( $item['list_content'] ); ?>
                        </p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    <?php
        endif;

    }

    protected function _content_template() {
    ?>
        <# if ( settings.list.length ) { #>

            <div class="element-intro-link">
                <# _.each( settings.list, function( item ) { #>

                    <div class="element-intro-link__item">
                        <a class="item-link" href="{{{ item.list_link.url }}}"></a>

                        <figure class="item-image">
                            <img src="{{ item.list_image.url }}">
                        </figure>

                        <div class="element-intro-link__box d-flex justify-content-center flex-column">
                            <h4 class="title">
                                {{{ item.list_title }}}
                            </h4>

                            <p class="content">
                                {{{ item.list_content }}}
                            </p>
                        </div>
                    </div>

                <# }); #>
            </div>


        <# } #>
    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_intro_link );