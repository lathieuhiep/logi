<div class="site-blog-post">
    <div class="row">
        <?php
        while (have_posts()) :
            the_post();
        ?>

            <div class="col-12 col-sm-6 col-md-6 col-lg-4 post-item">
                <a class="link-post-popup" data-fancybox="iframe" data-type="iframe" data-src="<?php the_permalink(); ?>" href="javascript:"></a>

                <?php logi_post_formats(); ?>

                <div class="site-blog-post__content">
                    <h2 class="title-post">
                        <?php the_title(); ?>
                    </h2>

                    <p class="excerpt-post">
                        <?php
                        if ( has_excerpt() ) :
                            echo get_the_excerpt();
                        else:
                            echo wp_trim_words( get_the_content(), 30, '' );
                        endif;
                        ?>
                    </p>

                    <span class="link-red-more">
                        <?php esc_html_e( 'Read More', 'logi' ); ?>
                    </span>
                </div>
            </div>

        <?php
        endwhile;

        wp_reset_postdata();
        ?>
    </div>
</div>