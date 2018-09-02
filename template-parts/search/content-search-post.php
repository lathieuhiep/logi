
<?php

$logi_post_type = get_post_type( get_the_ID() );

if ( $logi_post_type != 'page' ) :

    get_template_part( 'template-parts/archive/content', 'archive-post' );

else:

?>
    <div class="site-post-image">
        <img src="<?php echo esc_url( get_theme_file_uri( '/images/image_page_search.png' ) ) ?>" alt="page">
    </div>

    <h2 class="title-post">
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>

<?php

endif;