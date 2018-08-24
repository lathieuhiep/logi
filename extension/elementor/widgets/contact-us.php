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
            'type_contact',
            [
                'label'     =>  esc_html__( 'Type Contact Us', 'logi' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  1,
                'options'   =>  [
                    '1' =>  esc_html__( 'Type 1', 'logi' ),
                    '2' =>  esc_html__( 'Type 2', 'logi' ),
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label'     =>  esc_html__( 'Image', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
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

        $repeater_phone = new Repeater();

        $repeater_phone->add_control(
            'list_title_phone', [
                'label'         =>  esc_html__( 'Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'T:',
                'label_block'   =>  true,
            ]
        );

        $repeater_phone->add_control(
            'list_number_phone', [
                'label'         =>  esc_html__( 'Number Phone', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  '+(65) 6458 8337',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'list_phone',
            [
                'label'     =>  esc_html__( 'List Phone', 'logi' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    =>  $repeater_phone->get_controls(),
                'default'   =>  [
                    [
                        'list_title_phone'  =>  'T:',
                        'list_number_phone' =>  '+(65) 6458 8337',
                    ],
                    [
                        'list_title_phone'  =>  'F:',
                        'list_number_phone' =>  '+(65) 6458 8553',
                    ],
                ],
                'title_field' => '{{{ list_title_phone }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_email',
            [
                'label' => esc_html__( 'Email', 'logi' ),
            ]
        );

        $repeater_email = new Repeater();

        $repeater_email->add_control(
            'list_title_email', [
                'label'         =>  esc_html__( 'Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'Title Email' , 'logi' ),
                'label_block'   =>  true,
            ]
        );

        $repeater_email->add_control(
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
                'fields'    =>  $repeater_email->get_controls(),
                'default'   =>  [
                    [
                        'list_title_email'  =>  'Email 1',
                    ],
                    [
                        'list_title_email'  =>  'Email 2',
                    ],
                ],
                'title_field' => '{{{ list_title_email }}}',
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

        if ( $settings['type_contact'] == 1 ) :
            $class_type_contact = 'contact-us-type1';
        else:
            $class_type_contact = 'contact-us-type2';
        endif;

    ?>

        <div class="element-contact-us <?php echo esc_attr( $class_type_contact ); ?>">
            <?php if ( !empty( $image_id ) ) : ?>

                <div class="image">
                    <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                </div>

            <?php endif; ?>

            <div class="element-contact-us__box">
                <?php if ( !empty( $settings['title'] ) ): ?>

                    <h2 class="title">
                        <?php echo esc_html( $settings['title'] ); ?>
                    </h2>

                <?php endif; ?>

                <div class="list">
                    <?php if ( !empty( $settings['address'] ) ) : ?>

                        <div class="item address">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>

                            <span class="custom-padding flex-grow-1">
                                <?php echo wp_kses_post( $settings['address'] ); ?>
                            </span>
                        </div>

                    <?php endif; ?>

                    <?php if( !empty( $settings['list_phone'] ) ) : ?>

                        <div class="item phone">
                            <i class="fa fa-phone" aria-hidden="true"></i>

                            <div class="list-phone custom-padding flex-grow-1">
                                <?php foreach ( $settings['list_phone'] as $item ) : ?>
                                    <span>
                                        <?php echo esc_html( $item['list_title_phone'] . $item['list_number_phone'] ); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    <?php endif; ?>

                    <?php if( !empty( $settings['list_email'] ) ) : ?>

                        <div class="item email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>

                            <div class="link-email custom-padding flex-grow-1">

                                <?php foreach ( $settings['list_email'] as $item ) : ?>

                                    <div class="link-email__item d-lg-flex">
                                        <?php if ( !empty( $item['list_title_email'] ) ) : ?>
                                            <span>
                                                <?php echo esc_html( $item['list_title_email'] ); ?>
                                            </span>
                                        <?php endif; ?>

                                        <a href="mailto:<?php echo esc_attr( $item['link_email']['url'] ); ?>">
                                            <?php echo esc_html( $item['link_email']['url'] ); ?>
                                        </a>
                                    </div>

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

        <#
            var type_contact        =   settings.type_contact;
            var class_type_contact  =   'contact-us-type1';

            if ( type_contact == 2 ) {
                class_type_contact = 'contact-us-type2';
            }
        #>

        <div class="element-contact-us {{ class_type_contact }}">
            <# if ( settings.image.url ) { #>

                <div class="image">
                    <img src="{{ settings.image.url }}">
                </div>

            <# } #>

            <div class="element-contact-us__box">
                <# if ( settings.title ) { #>

                    <h2 class="title">
                        {{{ settings.title }}}
                    </h2>

                <# } #>

                <div class="list">
                    <# if ( settings.address ) { #>

                        <div class="item address">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>

                            <span class="custom-padding flex-grow-1">
                                {{{ settings.address }}}
                            </span>
                        </div>

                    <# } #>

                    <# if ( settings.list_phone.length ) { #>

                        <div class="item phone">
                            <i class="fa fa-phone" aria-hidden="true"></i>

                            <div class="list-phone custom-padding flex-grow-1">
                                <# _.each( settings.list_phone, function( item ) { #>

                                    <span>
                                        {{{ item.list_title_phone }}}{{{ item.list_number_phone }}}
                                    </span>

                                <# }); #>
                            </div>
                        </div>

                    <# } #>

                    <# if ( settings.list_email.length ) { #>

                        <div class="item email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>

                            <div class="link-email custom-padding flex-grow-1">

                                <# _.each( settings.list_email, function( item ) { #>

                                    <div class="link-email__item d-lg-flex">
                                        <# if ( item.list_title_email ) { #>
                                            <span>
                                                {{{ item.list_title_email }}}
                                            </span>
                                        <# } #>

                                        <a href="mailto:{{{ item.link_email.url }}}">
                                            {{{ item.link_email.url }}}
                                        </a>
                                    </div>

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