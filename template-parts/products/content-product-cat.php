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

                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 item">
                                    <div class="site-product-list__item">
                                        <a class="link-product" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>

                                        <figure class="item-image">
                                            <?php the_post_thumbnail( array( 179, 179 ) ); ?>
                                        </figure>

                                        <div class="info-product">
                                            <h4 class="title-item-product">
                                                <?php the_title(); ?>
                                            </h4>

                                            <div class="description">
                                                <?php
                                                if( has_excerpt() ):
                                                    the_excerpt();
                                                else:
                                                ?>

                                                    <p>
                                                        <?php echo wp_trim_words( get_the_content(), 30, '...' ); ?>
                                                    </p>

                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="view-product-btn text-uppercase">
                                            <i class="fa fa-eye"></i>
                                            <?php esc_html_e( 'View Product', 'logi' ); ?>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
