<?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-left' ); ?>
<?php else : ?>
    <p><?php _e('Add your widget!','presspro-original-theme'); ?></p>
<?php endif; ?>
