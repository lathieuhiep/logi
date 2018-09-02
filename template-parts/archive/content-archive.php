<?php

global $logi_options;

$logi_blog_sidebar_archive = !empty( $logi_options['logi_blog_sidebar_archive'] ) ? $logi_options['logi_blog_sidebar_archive'] : 'right';

$logi_class_col_content = logi_col_use_sidebar( $logi_blog_sidebar_archive, 'logi-sidebar' );

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <?php
            if ( $logi_blog_sidebar_archive == 'left' ) :
                get_sidebar();
            endif;
            ?>

            <div class="<?php echo esc_attr( $logi_class_col_content ); ?>">
                <?php
                if ( is_category() ) :

                    $logi_category          =   get_queried_object();
                    $logi_name_cat          =   $logi_category->name;
                    $logi_description_cat   =   $logi_category->description;

                ?>
                    <div class="site-cat-top">
                        <div class="element-heading">
                            <h2 class="title">
                                <?php echo esc_html( $logi_name_cat ); ?>
                            </h2>
                        </div>

                        <?php if ( function_exists( 'z_taxonomy_image' ) ) : ?>

                            <div class="cat-image">
                                <?php z_taxonomy_image( $logi_category->term_id ); ?>
                            </div>

                        <?php
                        endif;

                        if ( !empty( $logi_description_cat ) ) :

                        ?>

                            <p class="cat-description">
                               <?php echo esc_html( $logi_description_cat ); ?>
                            </p>

                        <?php endif; ?>
                    </div>

                <?php
                endif;

                if ( have_posts() ) :
                ?>

                    <div class="site-blog-post">
                        <div class="row">
                            <?php
                            while (have_posts()) :
                            the_post();
                            ?>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 post-item">
                                    <?php
                                        if ( ! is_search() ):
                                            get_template_part( 'template-parts/archive/content', 'archive-post' );
                                        else:
                                            get_template_part( 'template-parts/search/content', 'search-post' );
                                        endif;
                                    ?>
                                </div>

                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>

                <?php

                    logi_pagination();

                else:

                    if ( is_search() ) :
                        get_template_part( 'template-parts/search/content', 'search-no-data' );
                    endif;

                endif; // end if ( have_posts )
                ?>
            </div>

            <?php if ( $logi_blog_sidebar_archive == 'right' ) :
                get_sidebar();
            endif;
            ?>

        </div>
    </div>
</div>