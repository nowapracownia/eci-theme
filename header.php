<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php bloginfo('description'); ?>" />
        <title><?php bloginfo( 'name' ); ?></title>
        <?php wp_head(); ?>
    </head>

    <body>

        <div class="site-wrapper"> <!-- begin site wrapper -->

        <header>
            <p><a href="<?php echo home_url(); ?>"><?php _e('presspro::dev starter','presspro-original-theme'); ?></a></p>
            <?php wp_nav_menu(); ?>
        </header>
