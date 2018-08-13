<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_contact_us extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-contact-us';
    }

    public function get_title() {
        return esc_html__( 'Contact Us Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-envelope';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_global',
            [
                'label' => esc_html__( 'Global', 'logi' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label'     =>  esc_html__( 'Image', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         =>  esc_html__( 'Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'CONTACT US', 'logi' ),
                'label_block'   =>  true
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_address',
            [
                'label' => esc_html__( 'Address', 'logi' ),
            ]
        );

        $this->add_control(
            'address',
            [
                'label'     =>  esc_html__( 'Address', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  10,
                'default'   =>  'Logicode Pte Ltd <br /> No. 8 Ubi Road 2, #05-23 Zervex, Singapore 408538',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_phone',
            [
                'label' => esc_html__( 'Phone', 'logi' ),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label'     =>  esc_html__( 'Phone', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  10,
                'default'   =>  'T: +(65) 6458 8337 <br /> F: +(65) 6458 8553',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_email',
            [
                'label' => esc_html__( 'Email', 'logi' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label'         =>  esc_html__( 'Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Title Email' , 'logi' ),
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'link_email',
            [
                'label'         =>  esc_html__( 'Link Email', 'logi' ),
                'type'          =>  Controls_Manager::URL,
                'label_block'   =>  true,
                'show_external' =>  false,
                'default'       =>  [
                    'url' => 'https://your-link.com',
                ],
                'placeholder'   =>  esc_html__( 'https://your-link.com', 'logi' ),
            ]
        );

        $this->add_control(
            'list_email',
            [
                'label'     =>  esc_html__( 'Email List', 'logi' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    =>  $repeater->get_controls(),
                'default'   =>  [
                    [
                        'list_title'    =>  'Email 1',
                    ],
                    [
                        'list_title'    =>  'Email 2',
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
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
                    '{{WRAPPER}} .element-contact_us .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-contact_us .title',
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label'     =>  __( 'Border Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-contact_us' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();
        $image_id   =   $settings['image']['id'];

    ?>

        <div class="element-contact-us">
            <?php if ( !empty( $image_id ) ) : ?>

                <div class="image">
                    <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                </div>

            <?php endif; ?>

            <div class="element-contact-us__box">
                <h2 class="title">
                    <?php echo esc_html( $settings['title'] ); ?>
                </h2>

                <div class="list">
                    <div class="item address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>

                        <span>
                            <?php echo wp_kses_post( $settings['address'] ); ?>
                        </span>
                    </div>

                    <div class="item phone">
                        <i class="fa fa-phone" aria-hidden="true"></i>

                        <span>
                            <?php echo wp_kses_post( $settings['phone'] ); ?>
                        </span>
                    </div>

                    <?php if( !empty( $settings['list_email'] ) ) : ?>

                        <div class="item email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>

                            <div class="link-email">
                                <?php foreach ( $settings['list_email'] as $item ) : ?>
                                    <a href="mailto:<?php echo esc_attr( $item['link_email']['url'] ); ?>">
                                        <?php echo esc_html( $item['link_email']['url'] ); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php
    }

    protected function _content_template() {
?>

        <div class="element-contact-us">
            <# if ( settings.image.url ) { #>

                <div class="image">
                    <img src="{{ settings.image.url }}">
                </div>

            <# } #>

            <div class="element-contact-us__box">
                <h2 class="title">
                    {{{ settings.title }}}
                </h2>

                <div class="list">
                    <div class="item address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>

                        <span>
                            {{{ settings.address }}}
                        </span>
                    </div>

                    <div class="item phone">
                        <i class="fa fa-phone" aria-hidden="true"></i>

                        <span>
                            {{{ settings.phone }}}
                        </span>
                    </div>

                    <# if ( settings.list_email.length ) { #>

                        <div class="item email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>

                            <div class="link-email">

                                <# _.each( settings.list_email, function( item ) { #>

                                    <a href="mailto:{{{ item.link_email.url }}}">
                                        {{{ item.link_email.url }}}
                                    </a>

                                <# }); #>
                            </div>
                        </div>

                    <# } #>
                </div>
            </div>
        </div>

<?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_contact_us );