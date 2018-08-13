<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_partners extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-partners';
    }

    public function get_title() {
        return esc_html__( 'Partners Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-window-restore';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Heading', 'logi' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Our', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label'         =>  esc_html__( 'Sub Heading', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'PARTNERS', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'description',
            [
                'label'         =>  esc_html__( 'Description', 'logi' ),
                'type'          =>  Controls_Manager::TEXTAREA,
                'row'           =>  15,
                'default'       =>  'Logicode partners with world class leading industry companies to provide your customers with the ultimate services, products and innovation for enterprise mobility.',
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'text_link',
            [
                'label'         =>  esc_html__( 'Text Link', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'VIEW MORE', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'link',
            [
                'label'         =>  esc_html__( 'Link', 'logi' ),
                'type'          =>  Controls_Manager::URL,
                'placeholder'   =>  'https://your-link.com',
                'show_external' =>  true,
                'default' => [
                    'url'           =>  '#',
                    'is_external'   =>  false,
                    'nofollow'      =>  false,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_logo',
            [
                'label' => esc_html__( 'Logo Partners', 'logi' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title_partner', [
                'label'         =>  esc_html__( 'Title Partner', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Partner' , 'logi' ),
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_logo',
            [
                'label'     =>  esc_html__( 'Logo Partner', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'list_link_partner',
            [
                'label'         =>  esc_html__( 'Link Partner', 'logi' ),
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
                'label'     =>  esc_html__( 'Logo Partner List', 'logi' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    =>  $repeater->get_controls(),
                'default'   =>  [
                    [
                        'list_title_partner'    =>  esc_html__( 'Partner 1', 'logi' ),
                        'list_link'     =>  '#',
                    ],
                    [
                        'list_title_partner'    =>  esc_html__( 'Partner 2', 'logi' ),
                        'list_link'     =>  '#',
                    ],
                ],
                'title_field' => '{{{ list_title_partner }}}',
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
                    '{{WRAPPER}} .element-partners .element-partners__content .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-partners .element-partners__content .title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label'     =>  __( 'Sub Title Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-partners .element-partners__content .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-partners .element-partners__content .sub-title',
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
                    '{{WRAPPER}} .element-partners .element-partners__content .description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-partners .element-partners__content .description',
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
                'label'     =>  __( 'Text Link Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-partners .element-partners__content .link-text' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_link_hover_color',
            [
                'label'     =>  __( 'Text Link Hover Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-partners .element-partners__content .link-text:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_link_hover_background',
            [
                'label'     =>  __( 'Text Link Hover Background', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-partners .element-partners__content .link-text:hover' => 'border-color: {{VALUE}}; background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_link_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-partners .element-partners__content .link-text',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();
        $target     =   $settings['link_btn']['is_external'] ? ' target="_blank"' : '';
        $nofollow   =   $settings['link_btn']['nofollow'] ? ' rel="nofollow"' : '';

    ?>

        <div class="element-partners">
            <div class="row align-items-center">
                <div class="col-12 col-sm-5 col-md-5">
                    <div class="element-partners__content">
                        <h4 class="title">
                            <?php echo esc_html( $settings['heading'] ); ?>
                        </h4>

                        <h2 class="sub-title">
                            <?php echo esc_html( $settings['sub_heading'] ); ?>
                        </h2>

                        <p class="description">
                            <?php echo wp_kses_post( $settings['description'] ); ?>
                        </p>

                        <a class="link-text" href="<?php echo esc_url( $settings['link']['url'] ); ?>" title="<?php echo esc_attr( $settings['text_link'] ); ?>"<?php echo esc_attr( $target . $nofollow ); ?>>
                            <?php echo esc_html( $settings['text_link'] ); ?>
                        </a>
                    </div>
                </div>

                <?php if ( $settings['list'] ) : ?>

                    <div class="col-12 col-sm-7 col-md-7">
                        <div class="element-partners__logo">
                            <?php foreach ( $settings['list'] as $item ) : ?>

                                <div class="logo-item">
                                    <a href="<?php echo esc_url( $item['list_link_partner']['url'] ); ?>">
                                        <?php echo wp_get_attachment_image( $item['list_logo']['id'], array( 178, 66 ) ); ?>
                                    </a>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </div>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_partners );