<?php wp_head(); ?>
<div class="site-container site-single">
    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

        <div class="site-single__post">
            <div class="row item-row">
                <div class="col-12 col-sm-6 col-md-4 item-col">
                    <?php logi_post_formats(); ?>
                </div>

                <div class="col-12 col-sm-6 col-md-8 item-col">
                    <div class="site-post-content">
                        <h1 class="title-post">
                            <?php the_title(); ?>
                        </h1>

                        <div class="site-post__detail">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        endwhile;
    endif;
    ?>
</div>

