<?php

$logi_product_cat_object = get_queried_object();

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
                <?php get_sidebar(); ?>

                <div class="col-md-9">
                    <div class="site-product-list">
                        <div class="row">
                            <?php
                            while ( have_posts() ) :
                                the_post();
                            ?>

                                <div class="col-12 col-sm-6 col-md-4 item">
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
        </div>
    </div>
</div>
