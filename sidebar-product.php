<?php if( is_active_sidebar( 'logi-sidebar-product' ) ): ?>

    <aside class="<?php echo esc_attr( logi_col_sidebar() ); ?> site-sidebar">
        <?php dynamic_sidebar( 'logi-sidebar-product' ); ?>
    </aside>

<?php endif; ?>