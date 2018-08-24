<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_download_pdf extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-download-pdf';
    }

    public function get_title() {
        return esc_html__( 'Download PDF Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-download';
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

        $this->add_control(
            'text', [
                'label'         =>  esc_html__( 'Text', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  'DOWNLOAD PDF',
                'label_block'   =>  true,
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
                'default'       =>  'Title 1',
                'label_block'   =>  true,
            ]
        );

        $repeater->add_control(
            'list_link', [
                'label'         =>  esc_html__( 'Link', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  '#',
                'label_block'   =>  true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     =>  esc_html__( 'List Download PDF', 'logi' ),
                'type'      =>  Controls_Manager::REPEATER,
                'fields'    =>  $repeater->get_controls(),
                'default'   =>  [
                    [
                        'list_title'    =>  'Title 1',
                        'list_link'     =>  '#',
                    ],
                    [
                        'list_title'    =>  'Title 2',
                        'list_link'     =>  '#',
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();
        $column_number  =   $settings['column_number'];

        if ( $column_number == 4 ) :
            $class_column_number = 'col-lg-3';
        elseif ( $column_number == 3 ) :
            $class_column_number = 'col-lg-4';
        elseif ( $column_number == 2 ) :
            $class_column_number = 'col-lg-6';
        else:
            $class_column_number = 'col-lg-12';
        endif

    ?>

        <div class="element-download-pdf">
            <div class="row">
                <?php foreach ( $settings['list'] as $item ) : ?>

                    <div class="col-12 col-sm-6 col-md-6 <?php echo esc_attr( $class_column_number ); ?> item-col">
                        <div class="item-pdf">
                            <a class="item-pdf-link" href="<?php echo esc_url( $item['list_link'] ); ?>" target="_blank"></a>

                            <div class="item-pdf__content">
                                <figure class="item-pdf__image">
                                    <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                                </figure>

                                <div class="item-download-pdf-btn">
                                    <span>
                                        <i class="fa fa-file-pdf-o"></i>
                                        <?php echo esc_html( $settings['text'] ); ?>
                                    </span>
                                </div>
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

        <div class="element-download-pdf">
            <div class="row">
                <# _.each( settings.list, function( item ) { #>

                    <div class="col-12 col-sm-6 col-md-6 {{ class_column_number }} item-col">
                        <div class="item-pdf">
                            <a class="item-pdf-link" href="{{{ item.list_link }}}" target="_blank"></a>

                            <div class="item-pdf__content">
                                <figure class="item-pdf__image">
                                    <img src="{{ item.list_image.url }}">
                                </figure>

                                <div class="item-download-pdf-btn">
                                    <span>
                                        <i class="fa fa-file-pdf-o"></i>
                                        {{{ settings.text }}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                <# }); #>
            </div>
        </div>

    <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_download_pdf );