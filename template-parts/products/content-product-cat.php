<?php
global $logi_options;

$logi_product_cat_object = get_queried_object();

$logi_sidebar_product_cat = !empty( $logi_options['logi_sidebar_product_cat'] ) ? $logi_options['logi_sidebar_product_cat'] : 'right';
$logi_product_cat_per_row = !empty( $logi_options['logi_product_cat_per_row'] ) ? $logi_options['logi_product_cat_per_row'] : 3;
$logi_class_col_content = logi_col_use_sidebar( $logi_sidebar_product_cat, 'logi-sidebar-product' );

if ( $logi_product_cat_per_row == 3 ) :
    $logi_class_col_product_item = 'col-md-4';
else:
    $logi_class_col_product_item = 'col-md-3';
endif;

?>

<div class="site-container site-product-cat">
    <div class="container">
        <div class="site-product-cat__header d-flex">
            <h2 class="title-product-cat text-uppercase">
                <?php echo esc_html( $logi_product_cat_object->name ); ?>
            </h2>

            <?php logi_pagination(); ?>
        </div>

        <div class="site-product-cat__warp">
            <div class="row">
                <?php

                if( $logi_sidebar_product_cat == 'left' ):
                    get_sidebar( 'product' );
                endif;

                ?>

                <div class="<?php echo esc_attr( $logi_class_col_content ); ?>">
                    <div class="site-product-list">
                        <div class="row">
                            <?php
                            while ( have_posts() ) :
                                the_post();
                            ?>

                                <div class="col-12 col-sm-6 <?php echo esc_attr( $logi_class_col_product_item ) ?> item">
                                    <?php get_template_part( 'template-parts/products/content', 'product-item' ); ?>
                                </div>

                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>

                        <?php logi_pagination(); ?>
                    </div>
                </div>

                <?php

                if( $logi_sidebar_product_cat == 'right' ):
                    get_sidebar( 'product' );
                endif;

                ?>
            </div>
        </div>
    </div>
</div>
