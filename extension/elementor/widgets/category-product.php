<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class logi_widget_product_cat extends Widget_Base {

    public function get_categories() {
        return array( 'logi_widgets' );
    }

    public function get_name() {
        return 'logi-product-cat';
    }

    public function get_title() {
        return esc_html__( 'Product Category Theme', 'logi' );
    }

    public function get_icon() {
        return 'fa fa-shopping-bag';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_product_cat',
            [
                'label' => esc_html__( 'Category Product', 'logi' ),
            ]
        );

        $this->add_control(
            'type_select_cat',
            [
                'label' =>  esc_html__('Type Select Catrgory', 'logi'),
                'type'  =>  Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    1   =>  esc_html__( 'Select Category', 'plugin-domain' ),
                    2   =>  esc_html__( 'Input ID Category', 'plugin-domain' ),
                ],
            ]
        );

        $this->add_control(
            'select_cat_product',
            [
                'label'         =>  esc_html__( 'Select Category Product', 'event_conference' ),
                'type'          =>  Controls_Manager::SELECT2,
                'options'       =>  logi_check_get_cat( 'product_cat' ),
                'multiple'      =>  true,
                'label_block'   =>  true,
                'condition' => [
                    'type_select_cat!' => '2',
                ],
            ]
        );

        $this->add_control(
            'input_id_cat',
            [
                'label'         =>  esc_html__( 'Input ID Category', 'logi' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  '',
                'description'   =>  'EX: 6,7,8',
                'label_block'   =>  true,
                'condition' => [
                    'type_select_cat!' => '1',
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
            'title_color',
            [
                'label'     =>  __( 'Title Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-product_cat .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .element-product_cat .title',
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label'     =>  __( 'Border Color', 'logi' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-product_cat' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings   =   $this->get_settings();

        if ( $settings['type_select_cat'] == 1 ) :
            $product_cat_ids = $settings['select_cat_product'];
        else:
            $product_cat_ids = explode(",", $settings['input_id_cat'] );
        endif;

        if ( !empty( $product_cat_ids ) ) :

    ?>

        <div class="element-product-cat">
            <div class="row">
                <?php
                foreach ( $product_cat_ids as $item ) :
                    $term = get_term( $item, 'product_cat' );
                ?>

                    <div class="col-12 col-md-6 item">
                        <a class="link-item" href="<?php echo esc_url( get_term_link( $term->term_id, 'product_cat' ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>"></a>

                        <?php if (function_exists('z_taxonomy_image')) : ?>

                            <figure class="image">
                                <?php z_taxonomy_image( $term->term_id, 'full' ); ?>
                            </figure>

                        <?php endif; ?>

                        <div class="element-product-cat__content">
                            <h2 class="title">
                                <?php echo esc_html( $term->name ); ?>
                            </h2>

                            <p class="description">
                                <?php echo esc_html( $term->description ); ?>
                            </p>

                            <p class="text-more">
                                <span>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <?php esc_html_e( 'Learn More', 'logi' ); ?>
                                </span>

                                <span>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <?php esc_html_e( 'Learn More', 'logi' ); ?>
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

}

Plugin::instance()->widgets_manager->register_widget_type( new logi_widget_product_cat );