<?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-right' ); ?>
<?php else : ?>
    <p><?php _e('Add your widget!','presspro-original-theme'); ?></p>
<?php endif; ?>
