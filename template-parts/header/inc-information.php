<?php
global $logi_options;

$logi_information_address   =   $logi_options['logi_information_address'];
$logi_information_mail      =   $logi_options['logi_information_mail'];
$logi_information_phone     =   $logi_options['logi_information_phone'];
?>

<div class="information">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if ( $logi_information_address != '' ) : ?>

                    <span>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $logi_information_address ); ?>
                    </span>

                <?php
                endif;

                if ( $logi_information_mail != '' ) :
                ?>

                    <span>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <?php echo esc_html( $logi_information_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $logi_information_phone != '' ) :
                ?>

                    <span>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <?php echo esc_html( $logi_information_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-md-5">
                <div class="information__social-network social-network-toTopFromBottom d-flex justify-content-end">
                    <?php logi_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>