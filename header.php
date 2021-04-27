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

        <header class="site-header">
            <div class="site-header__logo"><a href="<?php echo home_url(); ?>"><?php _e('presspro::dev starter','presspro-original-theme'); ?></a></div>
            <label for="site-header-trigger">&times;</label>
            <input type="checkbox" id="site-header-trigger" class="site-header__trigger" />
            <div class="site-header__inner">
                <div class="site-header__menu"><?php wp_nav_menu(); ?></div>
                <div class="site-header__widget"><?php get_template_part('template-parts/header','widget'); ?></div>
            </div>
        </header>
