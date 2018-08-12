<?php
/**
 * Breadcrumb file
 */

if ( function_exists( 'bcn_display' ) ) :
?>

<div class="site-breadcrumb">
    <div class="container">
        <div class="site-breadcrumb__inline">
            <?php bcn_display(); ?>
        </div>
    </div>
</div>

<?php
endif;