<?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-header' ); ?>
<?php else : ?>
    <p><?php _e('Add your widget!','presspro-original-theme'); ?></p>
<?php endif; ?>
