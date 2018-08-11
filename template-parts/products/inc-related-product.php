<?php

$logi_related_product_cat = get_the_terms( get_the_ID(), 'product_cat' );

if ( !empty( $logi_related_product_cat ) ) :

    $logi_related_product_cat_ids = array();

    foreach( $logi_related_product_cat as $item ) $logi_related_product_cat_ids[] = $item->term_id;

    $logi_product_related_arg = array(
        'post_type'         =>  'product',
        'post__not_in'      => array( get_the_ID() ),
        'posts_per_page'    =>  4,
        'tax_query'         =>  array(

            array(
                'taxonomy'  =>  'product_cat',
                'field'     =>  'id',
                'terms'     =>  $logi_related_product_cat_ids
            ),

        )
    );

    $logi_product_related_query = new WP_Query( $logi_product_related_arg );

    if ( $logi_product_related_query->have_posts() ) :
?>

    <div class="site-product-related">
        <div class="title-box text-center">
            <h2 class="title text-uppercase">
                <?php esc_html_e( 'RELATED PRODUCTS', 'logi' ); ?>
            </h2>
        </div>

        <div class="site-product-related__list">
            <div class="site-product-list">
                <div class="row">
                    <?php
                    while ( $logi_product_related_query->have_posts() ) :
                        $logi_product_related_query->the_post();
                    ?>

                        <div class="col-12 col-sm-6 col-md-3 item">
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
    </div>

<?php
    endif;

endif;