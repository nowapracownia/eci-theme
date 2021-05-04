<?php get_header(); ?>

<?php
    $meta = array();
    if(function_exists('get_field')) {
        $meta['hbg'] = get_field('header-bg-image');
        $meta['fbg'] = get_field('footer-bg-image');
    }
?>

<?php

    if(isset($meta['hbg']) && !empty($meta['hbg'])) :

        $hbg_url = wp_get_attachment_image_url($meta['hbg'],'full'); ?>

        <div class="site-hero" style="background-image:url(<?php echo $hbg_url; ?>);"></div>

    <?php endif;

?>

<section>

    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                    <?php the_content(); ?>
                <?php
            }
        }
    ?>

</section>

<?php get_footer(); ?>
