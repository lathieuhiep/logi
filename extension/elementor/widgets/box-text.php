<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_box_text extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-box-text';
    }

    public function get_title() {
        return esc_html__( 'Box Text Link', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-cubes';
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
                'default'       =>  esc_html__( 'MOBILITY' , 'logi' ),
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label'     =>  esc_html__( 'Content', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  5,
                'default'   =>  'Our rugged mobile computers drives productivity for mobile workers',
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
                    'url'   =>  '#',
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
                        'list_title'    =>  'MOBILITY',
                        'list_content'  =>  'Our rugged mobile computers drives productivity for mobile workers',
                        'list_link'     =>  '#',
                    ],
                    [
                        'list_title'    =>  'PRINTING',
                        'list_content'  =>  'Our device management software optimise functionality and performance',
                        'list_link'     =>  '#',
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_text_link',
            [
                'label' => esc_html__( 'Text Link', 'logi' ),
            ]
        );

        $this->add_control(
            'text_link', [
                'label'         =>  esc_html__( 'Text Link', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'LEARN MORE' , 'logi' ),
                'label_block'   =>  true,
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
                    '{{WRAPPER}} .element-product-cat .item .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-product-cat .item .title',
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
                'label'     =>  esc_html__( 'Description Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-product-cat .item .description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-product-cat .item .description',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_text_link',
            [
                'label' => esc_html__( 'Text Link', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_link_color',
            [
                'label'     =>  esc_html__( 'Text Link Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-product-cat .item .text-more' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_link_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-product-cat .item .text-more',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_bk_overlay',
            [
                'label' => esc_html__( 'Background Overlay', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_overlay_color_1',
            [
                'label' => esc_html__( 'Color 1', 'logi' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .element-product-cat .item:nth-child(4n+1) .element-product-cat__content, {{WRAPPER}} .element-product-cat .item:nth-child(4n+2) .element-product-cat__content' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'background_overlay_color_2',
            [
                'label' => esc_html__( 'Color 2', 'logi' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .element-product-cat .item:nth-child(4n+3) .element-product-cat__content, {{WRAPPER}} .element-product-cat .item:nth-child(4n+4) .element-product-cat__content' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();

        if ( $settings['list'] ) :
    ?>

        <div class="element-product-cat">
            <div class="row">
                <?php foreach ( $settings['list'] as $item ) : ?>

                    <div class="col-12 col-md-6 item">
                        <a class="link-item" href="<?php echo esc_url( $item['list_link']['url'] ) ?>"></a>

                        <figure class="image">
                            <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                        </figure>

                        <div class="element-product-cat__content">
                            <h2 class="title">
                                <?php echo esc_html( $item['list_title'] ); ?>
                            </h2>

                            <p class="description">
                                <?php echo wp_kses_post( $item['list_content'] ); ?>
                            </p>

                            <p class="text-more">
                                <span>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <?php echo esc_html( $settings['text_link'] ); ?>
                                </span>

                                <span>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <?php echo esc_html( $settings['text_link'] ); ?>
                                </span>
                            </p>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php
        endif;
    }

    protected function _content_template() {
    ?>
        <# if ( settings.list.length ) { #>

            <div class="element-product-cat">
                <div class="row">
                    <# _.each( settings.list, function( item ) { #>

                    <div class="col-12 col-md-6 item">
                        <a class="link-item" href="{{{ item.list_link.url }}}"></a>

                        <figure class="image">
                            <img src="{{ item.list_image.url }}">
                        </figure>

                        <div class="element-product-cat__content">
                            <h2 class="title">
                                {{{ item.list_title }}}
                            </h2>

                            <p class="description">
                                {{{ item.list_content }}}
                            </p>

                            <p class="text-more">
                                <span>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    {{{ settings.text_link }}}
                                </span>

                                <span>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    {{{ settings.text_link }}}
                                </span>
                            </p>
                        </div>
                    </div>

                    <# }); #>
                </div>
            </div>

        <# } #>
    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_box_text );