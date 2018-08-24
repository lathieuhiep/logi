<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_offices extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-offices';
    }

    public function get_title() {
        return esc_html__( 'Offices Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-building-o';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_offices',
            [
                'label' => esc_html__( 'Content', 'logi' ),
            ]
        );

        $this->add_control(
            'title', [
                'label'         =>  esc_html__( 'Title Offices', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Our other offices',
                'label_block'   =>  true,
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
                'default'       =>  'THAILAND',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_sub_title', [
                'label'         =>  esc_html__( 'Sub Title', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'LOGICODE (T) LTD',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_address',
            [
                'label'     =>  esc_html__( 'Address', 'plugin-name' ),
                'type'      =>  Controls_Manager::TEXTAREA,
                'rows'      =>  5,
                'default'   =>  'Nirvana@Work <br /> 343/7-8 Khlongkamchiak Road Nuanchan Subdistrict Buengkum District Bangkok 10230',
            ]
        );

        $repeater->add_control(
            'list_tel_text', [
                'label'         =>  esc_html__( 'Tel', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Tel:',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_tel_number', [
                'label'         =>  esc_html__( 'Tel Number', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  '(+66) 02-106-5999',
                'show_label'    =>  false,
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_fax_text', [
                'label'         =>  esc_html__( 'Fax', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Fax:',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_fax_number', [
                'label'         =>  esc_html__( 'Fax Number', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  '(+66) 02-106-5998',
                'show_label'    =>  false,
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_email_text_1', [
                'label'         =>  esc_html__( 'Email 1', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Email:',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_email_address_1', [
                'label'         =>  esc_html__( 'Email Address 1', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'sales@logicode.co.th',
                'show_label'    =>  false,
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_email_text_2', [
                'label'         =>  esc_html__( 'Email 2', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'Technical Support:',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_email_address_2', [
                'label'         =>  esc_html__( 'Email Address 2', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'support@logicode.co.th',
                'show_label'    =>  false,
                'label_block'   =>  true,
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
                        'list_title'            =>  'THAILAND',
                        'list_sub_title'        =>  'LOGICODE (T) LTD',
                        'list_address'          =>  'Nirvana@Work <br /> 343/7-8 Khlongkamchiak Road Nuanchan Subdistrict Buengkum District Bangkok 10230',
                        'list_tel_text'         =>  'Tel:',
                        'list_tel_number'       =>  '(+66) 02-106-5999',
                        'list_fax_text'         =>  'Fax:',
                        'list_fax_number'       =>  '(+66) 02-106-5998',
                        'list_email_text_1'     =>  'Email:',
                        'list_email_address_1'  =>  'sales@logicode.co.th',
                        'list_email_text_2'     =>  'Technical Support:',
                        'list_email_address_2'  =>  'support@logicode.co.th'
                    ],
                    [
                        'list_title'            =>  'MALAYSIA',
                        'list_sub_title'        =>  'INCODE SOLUTIONS SDN BHD',
                        'list_address'          =>  'No. 8S-12A-10, FIRST SUBANG, LEVEL12A, JALAN SS15/4G 47500 SUBANG JAYA SELANGOR MALAYSIA',
                        'list_tel_text'         =>  'Tel:',
                        'list_tel_number'       =>  '(+60)3 8601 5380',
                        'list_fax_text'         =>  'Fax:',
                        'list_fax_number'       =>  '(+60)3 8601 5380',
                        'list_email_text_1'     =>  'Email:',
                        'list_email_address_1'  =>  'sales@incodesolutions.com.my',
                        'list_email_text_2'     =>  'Technical Support:',
                        'list_email_address_2'  =>  'support@incodesolutions.com.my'
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings();
        $column_number  =   $settings['column_number'];

        if ( $column_number == 4 ) :
            $class_column_number = 'col-lg-3';
        elseif ( $column_number == 3 ) :
            $class_column_number = 'col-lg-4';
        elseif ( $column_number == 2 ) :
            $class_column_number = 'col-lg-6';
        else:
            $class_column_number = 'col-lg-12';
        endif;

    ?>

        <div class="element-offices">
            <?php if ( !empty( $settings['title'] ) ) : ?>

                <h2 class="title-offices">
                    <?php echo esc_html( $settings['title'] ); ?>
                </h2>

            <?php endif; ?>

            <div class="row element-offices__row">
                <?php foreach ( $settings['list'] as $item ) : ?>

                    <div class="col-12 col-sm-6 col-md-4 <?php echo esc_attr( $class_column_number ); ?> item">
                        <div class="image-item">
                            <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                        </div>

                        <h2 class="title-item">
                            <?php echo esc_html( $item['list_title'] ); ?>
                        </h2>

                        <h4 class="sub-title-item">
                            <?php echo esc_html( $item['list_sub_title'] ); ?>
                        </h4>

                        <div class="offices-content">
                            <div class="offices-content__item address">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>

                                <p>
                                    <?php echo wp_kses_post( $item['list_address'] ); ?>
                                </p>
                            </div>

                            <div class="offices-content__item">
                                <i class="fa fa-phone" aria-hidden="true"></i>

                                <p>
                                    <?php echo esc_html( $item['list_tel_text'] ) . esc_html( $item['list_tel_number'] ); ?>
                                </p>
                            </div>

                            <div class="offices-content__item">
                                <i class="fa fa-fax" aria-hidden="true"></i>

                                <p>
                                    <?php echo esc_html( $item['list_fax_text'] ) . esc_html( $item['list_fax_number'] ); ?>
                                </p>
                            </div>

                            <div class="offices-content__item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>

                                <p>
                                    <span>
                                        <?php echo esc_html( $item['list_email_text_1'] ); ?>

                                        <a href="mailto:<?php echo esc_attr( $item['list_email_address_1'] ); ?>">
                                            <?php echo esc_html( $item['list_email_address_1'] ); ?>
                                        </a>
                                    </span>

                                    <span>
                                        <?php echo esc_html( $item['list_email_text_2'] ); ?>

                                        <a href="mailto:<?php echo esc_attr( $item['list_email_address_2'] ); ?>">
                                            <?php echo esc_html( $item['list_email_address_2'] ); ?>
                                        </a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php
    }

    protected function _content_template() {

    ?>

        <#
            var column_number  =   settings.column_number;
            var class_column_number = '';

            if ( column_number == 4 ) {
                class_column_number = 'col-lg-3';
            }else if ( column_number == 3 ) {
                class_column_number = 'col-lg-4';
            }else if ( column_number == 2 ) {
                class_column_number = 'col-lg-6';
            }else {
                class_column_number = 'col-lg-12';
            }
        #>

        <div class="element-offices">
            <# if ( settings.title ) { #>

                <h2 class="title-offices">
                    {{{ settings.title }}}
                </h2>

            <# } #>

            <# if ( settings.list.length ) { #>

                <div class="row element-offices__row">
                    <# _.each( settings.list, function( item ) { #>

                        <div class="col-12 col-sm-6 col-md-4 {{ class_column_number }} item">
                            <div class="image-item">
                                <img src="{{ item.list_image.url }}">
                            </div>

                            <h2 class="title-item">
                                {{{ item.list_title }}}
                            </h2>

                            <h4 class="sub-title-item">
                                {{{ item.list_sub_title }}}
                            </h4>

                            <div class="offices-content">
                                <div class="offices-content__item address">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>

                                    <p>
                                        {{{ item.list_address }}}
                                    </p>
                                </div>

                                <div class="offices-content__item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>

                                    <p>
                                        {{{ item.list_tel_text }}}{{{ item.list_tel_number }}}
                                    </p>
                                </div>

                                <div class="offices-content__item">
                                    <i class="fa fa-fax" aria-hidden="true"></i>

                                    <p>
                                        {{{ item.list_fax_text }}}{{{ item.list_fax_number }}}
                                    </p>
                                </div>

                                <div class="offices-content__item">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>

                                    <p>
                                        <span>
                                            {{{ item.list_email_text_1 }}}

                                            <a href="mailto:{{{ item.list_email_address_1 }}}">
                                                {{{ item.list_email_address_1 }}}
                                            </a>
                                        </span>

                                        <span>
                                            {{{ item.list_email_text_2 }}}

                                            <a href="mailto:{{{ item.list_email_address_2 }}}">
                                                {{{ item.list_email_address_2 }}}
                                            </a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    <# }); #>
                </div>

            <# } #>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_offices );