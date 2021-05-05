<?php

// BASIC CONFIG

add_theme_support( 'post-thumbnails' );

function load_theme_assets() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() , array( 'main' ) );
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/style.css', array(), time() );
}
add_action( 'wp_enqueue_scripts', 'load_theme_assets' );

function load_theme_fonts() {
    echo '<link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">';
}
add_action( 'wp_head', 'load_theme_fonts' );

register_nav_menu('main', 'Primary Menu');
load_theme_textdomain('presspro-original-theme', get_stylesheet_directory() . '/languages');

// REGISTER SIDEBARS

function presspro_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Left sidebar', 'presspro-original-theme' ),
		'id' => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Right sidebar', 'presspro-original-theme' ),
		'id' => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Header sidebar', 'presspro-original-theme' ),
		'id' => 'sidebar-header',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '',
		'after_title' => '',
	) );

}
add_action( 'widgets_init', 'presspro_widgets_init' );

// REGISTER POST TYPE

function presspro_post_type() {
    register_post_type('custom-post',
        array(
            'labels'      => array(
                'name'          => __('Custom Posts', 'presspro-original-theme'),
                'singular_name' => __('Custom Post', 'presspro-original-theme'),
            ),
                'public'      => true,
                'has_archive' => true,
        )
    );
}
add_action('init', 'presspro_post_type');

add_action( 'after_switch_theme', 'presspro_rewrite_flush' );
function presspro_rewrite_flush() {
    flush_rewrite_rules(); // rewrite rules after switching theme to make post types work
}

?>
