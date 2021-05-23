<?php get_header(); ?>

<?php
    $meta = array();
    if(function_exists('get_field')) {
        $meta['hbg'] = get_field('header-bg-image');
        $meta['hct'] = get_field('header-content');
        $meta['fbg'] = get_field('footer-bg-image');
        $meta['fct'] = get_field('footer-content');
        $meta['pfsc'] = get_field('portfolio-section');
        $meta['eqsc'] = get_field('equipment-section');
        $meta['lgsc'] = get_field('logo-section');
    }
?>

<?php

    if(isset($meta['hbg']) && !empty($meta['hbg'])) :

        $hbg_url = wp_get_attachment_image_url($meta['hbg'],'full');
        $hct = $meta['hct']; ?>

        <div class="site-hero" style="background-image:url(<?php echo $hbg_url; ?>);">
            <div class="site-hero__inner">
                <?php echo $hct; ?>
            </div>
        </div>

    <?php endif;

?>

<section class="main-section">

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


<?php if(isset($meta['pfsc']) && !empty($meta['pfsc'])) : ?>
    <section class="section portfolio-section">
        <h2 class="section-header"><a name="menu5"><?php echo get_the_title($meta['pfsc']); ?></a></h2>
        <div class="section__inner"><?php echo do_blocks($meta['pfsc']->post_content); ?></div>
    </section>
<?php endif; ?>

<?php if(isset($meta['eqsc']) && !empty($meta['eqsc'])) : ?>
    <section class="section equipment-section">
        <h2 class="section-header"><?php echo get_the_title($meta['eqsc']); ?></h2>
        <div class="section__inner"><?php echo do_blocks($meta['eqsc']->post_content); ?></div>
    </section>
<?php endif; ?>

<?php if(isset($meta['lgsc']) && !empty($meta['lgsc'])) : ?>
    <section class="section logo-section">
        <h2 class="section-header"><?php echo get_the_title($meta['lgsc']); ?></h2>
        <div class="section__inner"><?php echo do_blocks(do_shortcode($meta['lgsc']->post_content)); ?></div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
