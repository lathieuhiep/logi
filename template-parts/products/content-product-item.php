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