<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_intro extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-intro';
    }

    public function get_title() {
        return esc_html__( 'Intro Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-id-card-o';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__( 'Image', 'logi' ),
            ]
        );

        $this->add_control(
            'intro_image',
            [
                'label'     =>  esc_html__( 'Background Image', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
                'selectors' => [
                    '{{WRAPPER}} .element-intro' => 'background-image: url({{URL}})',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Text', 'logi' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         =>  esc_html__( 'Heading', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'WELCOME TO', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label'         =>  esc_html__( 'Sub Heading', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'LOGICODE', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     =>  esc_html__( 'Description', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  15,
                'default'   =>  'Founded in 1999 and headquartered in Singapore, Logicode prides itself as one of the leading solutions integrator of AIDC (Automatic Identification and Data Collection) within South East Asia. As a trusted solutions provider, we deploy Barcode, RFID, Wireless and Mobile Computing systems to work alongside our customers with the common aim of achieving seamless business intelligence tracking system.',
            ]
        );

        $this->add_control(
            'text_link',
            [
                'label'         =>  esc_html__( 'Text Link', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'KNOW MORE', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->add_control(
            'link_btn',
            [
                'label'         =>  esc_html__( 'Link Button', 'logi' ),
                'type'          =>  Controls_Manager::URL,
                'placeholder'   =>  'https://your-link.com',
                'show_external' => true,
                'default' => [
                    'url'           =>  '#',
                    'is_external'   =>  true,
                    'nofollow'      =>  true,
                ],
            ]
        );

        $this->end_controls_section();

        /*STYLE TAB*/
        $this->start_controls_section(
            'section_style_heading',
            [
                'label' => esc_html__( 'Heading', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     =>  __( 'Heading Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-intro .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-intro .title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_sub_heading',
            [
                'label' => esc_html__( 'Sub Heading', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_heading_color',
            [
                'label'     =>  __( 'Sub Heading Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-intro .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_heading_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-intro .sub-title',
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
            'description_heading_color',
            [
                'label'     =>  __( 'Description Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-intro .description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-intro .description',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_text_link',
            [
                'label'     =>  __( 'Color Text Link', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-intro .link-intro' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();
        $url_btn    =   $settings['link_btn']['url'];
        $target     =   $settings['link_btn']['is_external'] ? ' target="_blank"' : '';
        $nofollow   =   $settings['link_btn']['nofollow'] ? ' rel="nofollow"' : '';

    ?>

        <div class="element-intro">
            <div class="intro-content-box">
                <h4 class="title">
                    <?php echo esc_html( $settings['heading'] ); ?>
                </h4>

                <h2 class="sub-title">
                    <?php echo esc_html( $settings['sub_heading'] ); ?>
                </h2>

                <p class="description">
                    <?php echo wp_kses_post( $settings['description'] ); ?>
                </p>

                <a class="link-intro" href="<?php echo esc_url( $url_btn ); ?>" title="<?php echo esc_attr( $settings['text_link'] ); ?>"<?php echo esc_attr( $target . $nofollow ); ?>>
                    <?php echo esc_html( $settings['text_link'] ); ?>
                </a>
            </div>
        </div>

    <?php
    }

    protected function _content_template() {

    ?>

        <#
        var target   = settings.link_btn.is_external ? ' target="_blank"' : '';
        var nofollow = settings.link_btn.nofollow ? ' rel="nofollow"' : '';
        #>

        <div class="element-intro">
            <div class="intro-content-box">
                <h4 class="title">
                    {{{ settings.heading }}}
                </h4>

                <h2 class="sub-title">
                    {{{ settings.sub_heading }}}
                </h2>

                <p class="description">
                    {{{ settings.description }}}
                </p>

                <a class="link-intro" href="{{ settings.link_btn.url }}" title="{{{ settings.text_link }}}"{{ target }}{{ nofollow }}>
                    {{{ settings.text_link }}}
                </a>
            </div>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_intro );