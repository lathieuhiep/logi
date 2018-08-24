<?php

$logi_product_cat = get_the_terms( get_the_ID(), 'product_cat' );
$logi_product_tag = get_the_terms( get_the_ID(), 'product_tag' );

?>

<div class="site-container site-single-product">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            $logi_product_file_upload = rwmb_meta( 'logi_product_file_upload', array( 'limit' => 1 ) );
            $logi_product_file_upload = reset( $logi_product_file_upload );
        ?>

            <div class="product-item">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="product-item-image">
                            <?php the_post_thumbnail( array( 360, 360 ) ); ?>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="product-item-info">
                            <h1 class="title">
                                <?php the_title(); ?>
                            </h1>

                            <div class="product-item-content">
                                <?php
                                the_content();

                                wp_link_pages( array(
                                    'before'      => '<div class="page-links">' . __( 'Pages:', 'logi' ),
                                    'after'       => '</div>',
                                    'link_before' => '<span class="page-number">',
                                    'link_after'  => '</span>',
                                ) );

                                ?>
                            </div>

                            <div class="product-item-box d-sm-flex">

                                <?php if ( !empty( $logi_product_file_upload ) ) : ?>

                                    <div class="product-item-link-btn text-uppercase">
                                        <a href="<?php echo esc_url( $logi_product_file_upload['url'] ); ?>" target="_blank">
                                            <i class="fa fa-file-pdf-o"></i>
                                            <?php esc_html_e( ' Download PDF', 'logi' ); ?>
                                        </a>
                                    </div>

                                <?php endif; ?>

                                <div class="product-item-meta">
                                    <?php if ( !empty( $logi_product_cat ) ) : ?>

                                        <div class="meta-cat">
                                            <strong>
                                                <?php esc_html_e( 'Categories:', 'logi' ); ?>
                                            </strong>

                                            <?php foreach ( $logi_product_cat as $item ) : ?>
                                                <a href="<?php echo esc_url( get_term_link( $item->term_id, 'product_cat' ) ); ?>" title="<?php echo esc_html( $item->name ); ?>">
                                                    <?php echo esc_html( $item->name ); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>

                                    <?php endif; ?>

                                    <?php if ( !empty( $logi_product_tag ) ) : ?>

                                        <div class="meta-cat">
                                            <strong>
                                                <?php esc_html_e( 'TAG:', 'logi' ); ?>
                                            </strong>

                                            <?php foreach ( $logi_product_tag as $item ) : ?>
                                                <a href="<?php echo esc_url( get_term_link( $item->term_id, 'product_tag' ) ); ?>" title="<?php echo esc_html( $item->name ); ?>">
                                                    <?php echo esc_html( $item->name ); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endwhile;

        get_template_part( 'template-parts/products/inc', 'related-product' );
        ?>
    </div>
</div>