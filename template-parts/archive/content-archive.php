<?php

global $logi_options;

$logi_blog_sidebar_archive = !empty( $logi_options['logi_blog_sidebar_archive'] ) ? $logi_options['logi_blog_sidebar_archive'] : 'right';

if ( ( $logi_blog_sidebar_archive == 'left' || $logi_blog_sidebar_archive == 'right' ) && is_active_sidebar( 'logi-sidebar' ) ):

    $logi_col_class_blog = 'col-md-9';

else:

    $logi_col_class_blog = 'col-md-12';

endif;

?>

<div class="site-container site-blog">
    <div class="container">
        <div class="row">
            <?php
            if ( $logi_blog_sidebar_archive == 'left' ) :
                get_sidebar();
            endif;
            ?>

            <div class="<?php echo esc_attr( $logi_col_class_blog ); ?>">
                <?php
                if ( have_posts() ) :

                    if ( ! is_search() ):
                        get_template_part( 'template-parts/archive/content', 'archive-post' );
                    else:
                        get_template_part( 'template-parts/search/content', 'search-post' );
                    endif;

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