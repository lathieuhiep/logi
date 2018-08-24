<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_video_popup extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-video-popup';
    }

    public function get_title() {
        return esc_html__( 'Video Popup Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-play';
    }

    public function get_script_depends() {
        return ['lity'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'logi' ),
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
                'label'     =>  esc_html__( 'Background Video', 'logi' ),
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
                'default'       =>  'Cipherlab RS30 Mobile Computer',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_link',
            [
                'label'         =>  esc_html__( 'Link', 'logi' ),
                'type'          =>  Controls_Manager::URL,
                'placeholder'   =>  '//www.youtube.com/watch?v=XSGBVzeBUbk',
                'show_external' =>  false,
                'default' => [
                    'url'   =>  '//www.youtube.com/watch?v=XSGBVzeBUbk',
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
                        'list_title'    =>  'Cipherlab RS30 Mobile Computer',
                        'list_link'     =>  '//www.youtube.com/watch?v=XSGBVzeBUbk',
                    ],
                    [
                        'list_title'    =>  'TSC TE200 Desktop Barcode Printer',
                        'list_link'     =>  '//www.youtube.com/watch?v=XSGBVzeBUbk',
                    ],
                    [
                        'list_title'    =>  'Opticon Stationery Scanner',
                        'list_link'     =>  '//www.youtube.com/watch?v=XSGBVzeBUbk',
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings       =   $this->get_settings_for_display();
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

        if ( $settings['list'] ) :
    ?>

        <div class="element-video-popup">
            <div class="row">
                <?php foreach ( $settings['list'] as $item ) : ?>

                    <div class="col-12 col-sm-6 col-md-4 <?php echo esc_attr( $class_column_number ); ?> item">
                        <div class="video-popup-item">
                            <figure class="image-item">
                                <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                            </figure>

                            <div class="video-popup-content d-flex align-items-center justify-content-center flex-column">
                                <h4 class="title">
                                    <?php echo esc_html( $item['list_title'] ); ?>
                                </h4>

                                <a class="link-video" href="<?php echo esc_url( $item['list_link']['url'] ) ?>" data-lity>
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                </a>
                            </div>
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

        if ( settings.list.length ) {
        #>
            <div class="element-video-popup">
                <div class="row">
                    <# _.each( settings.list, function( item ) { #>

                        <div class="col-12 col-sm-6 col-md-4 {{ class_column_number }} item">
                            <div class="video-popup-item">
                                <figure class="image-item">
                                    <img src="{{ item.list_image.url }}">
                                </figure>

                                <div class="video-popup-content d-flex align-items-center justify-content-center flex-column">
                                    <h4 class="title">
                                        {{{ item.list_title }}}
                                    </h4>

                                    <a class="link-video" href="{{{ item.list_link.url }}}" data-lity>
                                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <# }); #>
                </div>
            </div>
        <# } #>

    <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_video_popup );