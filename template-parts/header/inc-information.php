<?php
global $logi_options;

$logi_information_address   =   $logi_options['logi_information_address'];
$logi_information_mail      =   $logi_options['logi_information_mail'];
$logi_information_phone     =   $logi_options['logi_information_phone'];
?>

<div class="information d-flex align-items-center justify-content-center">
    <p>
        <strong>
            <?php echo esc_html( $logi_information_phone ); ?>
        </strong>

        <a href="mailto:<?php echo esc_attr( $logi_information_mail ); ?>">
            <?php echo esc_html( $logi_information_mail ); ?>
        </a>
    </p>
</div>