<?php
//Global variable redux
global $logi_options;

$logi_footer_col     =   $logi_options ["logi_footer_column_col"];
$logi_footer_widthl  =   $logi_options ["logi_footer_column_w1"];
$logi_footer_width2  =   $logi_options ["logi_footer_column_w2"];
$logi_footer_width3  =   $logi_options ["logi_footer_column_w3"];
$logi_footer_width4  =   $logi_options ["logi_footer_column_w4"];

if( is_active_sidebar( 'logi-footer-1' ) || is_active_sidebar( 'logi-footer-2' ) || is_active_sidebar( 'logi-footer-3' ) || is_active_sidebar( 'logi-footer-4' ) ) :

?>

    <div class="site-footer__top">
        <div class="container">
            <div class="row">
                <?php
                for( $logi_i = 0; $logi_i < $logi_footer_col; $logi_i++ ):

                    $logi_j = $logi_i +1;

                    if ( $logi_i == 0 ) :
                        $logi_col = $logi_footer_widthl;
                    elseif ( $logi_i == 1 ) :
                        $logi_col = $logi_footer_width2;
                    elseif ( $logi_i == 2 ) :
                        $logi_col = $logi_footer_width3;
                    else :
                        $logi_col = $logi_footer_width4;
                    endif;

                    if( is_active_sidebar( 'logi-footer-'.$logi_j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $logi_col ); ?>">

                        <?php dynamic_sidebar( 'logi-footer-'.$logi_j ); ?>

                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>