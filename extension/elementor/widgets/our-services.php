<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_our_services extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-our-services';
    }

    public function get_title() {
        return esc_html__( 'Our Services Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-cogs';
    }

    protected function _register_controls() {

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
                'default'       =>  'Know more about',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'         =>  esc_html__( 'Sub Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'OUR SERVICES',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'     =>  esc_html__( 'Description', 'logi' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  10,
                'default'   =>  'SOME OF THE PROFESSIONAL SERVICE WE RENDER IN SUPPORT OF THE PRODUCTS AND SOLUTIONS THAT WE OFFER INCLUDE:',
            ]
        );

        $repeater_list_text = new Repeater();

        $repeater_list_text->add_control(
            'text_item', [
                'label'         =>  esc_html__( 'Text', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Consulting',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'list_text',
            [
                'label'     =>  esc_html__( 'List Text', 'logi' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    =>  $repeater_list_text->get_controls(),
                'default'   =>  [
                    [
                        'text_item'    =>  'Consulting',
                    ],
                    [
                        'text_item'    =>  'Project management',
                    ],
                    [
                        'text_item'    =>  'System Integration',
                    ],
                    [
                        'text_item'    =>  'and many more',
                    ],
                ],
                'title_field' => '{{{ text_item }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_services',
            [
                'label' => esc_html__( 'Services', 'logi' ),
            ]
        );

        $this->add_control(
            'column_number',
            [
                'label'     =>  esc_html__( 'Column', 'logi' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  3,
                'options'   =>  [
                    4   =>  esc_html__( '4 Column', 'logi' ),
                    3   =>  esc_html__( '3 Column', 'logi' ),
                    2   =>  esc_html__( '2 Column', 'logi' ),
                    1   =>  esc_html__( '1 Column', 'logi' ),
                ],
            ]
        );

        $repeater_services = new Repeater();

        $repeater_services->add_control(
            'list_image_services',
            [
                'label'     =>  esc_html__( 'Image', 'logi' ),
                'type'      =>  Controls_Manager::MEDIA,
                'default'   =>  [
                    'url'   =>  Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater_services->add_control(
            'list_title_services', [
                'label'         =>  esc_html__( 'Title Service', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__( 'WARRANTY SUPPORT' , 'logi' ),
                'label_block'   =>  true,
            ]
        );

        $repeater_services->add_control(
            'list_content_services',
            [
                'label'     =>  esc_html__( 'Content', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  10,
                'default'   =>  'Logicode provides in-house warranty support and out-of-warranty repairs.',
            ]
        );

        $this->add_control(
            'list_services',
            [
                'label'     =>  esc_html__( 'List Services', 'logi' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    =>  $repeater_services->get_controls(),
                'default'   =>  [
                    [
                        'list_title_services'    =>  'WARRANTY SUPPORT',
                        'list_content_services'  =>  'Logicode provides in-house warranty support and out-of-warranty repairs.',
                    ],
                    [
                        'list_title_services'    =>  'TECHNICAL SUPPORT',
                        'list_content_services'  =>  'From time to time, you may need technical advise on our products.',
                    ],
                    [
                        'list_title_services'    =>  'MAINTENANCE SUPPORT',
                        'list_content_services'  =>  'Logicode provides a comprehensive maintenance support for our products.',
                    ],
                ],
                'title_field' => '{{{ list_title_services }}}',
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
                    '{{WRAPPER}} .element-our-services .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-our-services .title',
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
                    '{{WRAPPER}} .element-our-services .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-our-services .sub-title',
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
                    '{{WRAPPER}} .element-our-services .description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-our-services .description',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_list_text',
            [
                'label' => esc_html__( 'List Text', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_text_color',
            [
                'label'     =>  __( 'List Text Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-our-services .list-text .list-text__item' => 'color: {{VALUE}}; border-right-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_text_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-our-services .list-text .list-text__item',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_title_services',
            [
                'label' => esc_html__( 'Title Services', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_services_color',
            [
                'label'     =>  esc_html__( 'Title Services Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-our-services .list-box-services .title-services' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_services_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-our-services .list-box-services .title-services',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content_services',
            [
                'label' => esc_html__( 'Content Services', 'logi' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_services_color',
            [
                'label'     =>  esc_html__( 'Content Services Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-our-services .list-box-services .description-services' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_services_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-our-services .list-box-services .description-services',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();
        $column_number  =   $settings['column_number'];

        if ( $column_number == 4 ) :
            $class_column_number = 'col-md-3';
        elseif ( $column_number == 3 ) :
            $class_column_number = 'col-md-4';
        elseif ( $column_number == 2 ) :
            $class_column_number = 'col-md-6';
        else:
            $class_column_number = 'col-md-12';
        endif;

    ?>

        <div class="element-our-services">
            <h4 class="title">
                <?php echo esc_html( $settings['title'] ); ?>
            </h4>

            <h2 class="sub-title">
                <?php echo esc_html( $settings['sub_title'] ); ?>
            </h2>

            <p class="description">
                <?php echo wp_kses_post( $settings['description'] ); ?>
            </p>

            <?php if ( $settings['list_text'] ) : ?>
                <div class="list-text">
                    <?php foreach ( $settings['list_text'] as $item ) : ?>

                        <div class="list-text__item">
                            <?php echo esc_html( $item['text_item'] ); ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( $settings['list_services'] ) : ?>
                <div class="list-box-services">
                    <div class="row">
                        <?php foreach ( $settings['list_services'] as $item ) : ?>

                            <div class="col-12 col-sm-6 <?php echo esc_attr( $class_column_number ); ?> item-col d-flex">
                                <div class="item d-flex">
                                    <div class="icon-services">
                                        <?php echo wp_get_attachment_image( $item['list_image_services']['id'], 'full' ); ?>
                                    </div>

                                    <div class="content-services">
                                        <h4 class="title-services">
                                            <?php echo esc_html( $item['list_title_services'] ); ?>
                                        </h4>

                                        <p class="description-services">
                                            <?php echo wp_kses_post( $item['list_content_services'] ); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    <?php

    }

    protected function _content_template() {

    ?>

        <#
        var column_number  =   settings.column_number;
        var class_column_number = '';

        if ( column_number == 4 ) {
            class_column_number = 'col-md-3';
        }else if ( column_number == 3 ) {
            class_column_number = 'col-md-4';
        }else if ( column_number == 2 ) {
            class_column_number = 'col-md-6';
        }else {
            class_column_number = 'col-md-12';
        }
        #>

        <div class="element-our-services">
            <h4 class="title">
                {{{ settings.title }}}
            </h4>

            <h2 class="sub-title">
                {{{ settings.sub_title }}}
            </h2>

            <p class="description">
                {{{ settings.description }}}
            </p>

            <# if ( settings.list_text.length ) { #>
                <div class="list-text">
                    <# _.each( settings.list_text, function( item ) { #>

                        <div class="list-text__item">
                            {{{ item.text_item }}}
                        </div>

                    <# }); #>
                </div>
            <# } #>

            <# if ( settings.list_services.length ) { #>

                <div class="list-box-services">
                    <div class="row">
                        <# _.each( settings.list_services, function( item ) { #>

                            <div class="col-12 col-sm-6 {{ class_column_number }} item-col d-flex">
                                <div class="item d-flex">
                                    <div class="icon-services">
                                        <img src="{{ item.list_image_services.url }}">
                                    </div>

                                    <div class="content-services">
                                        <h4 class="title-services">
                                            {{{ item.list_title_services }}}
                                        </h4>

                                        <p class="description-services">
                                            {{{ item.list_content_services }}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <# }); #>
                    </div>
                </div>

            <# } #>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_our_services );