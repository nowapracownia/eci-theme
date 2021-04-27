<?php get_header(); ?>

<section id="sidebar-left" class="sidebar sidebar__left">
    <?php get_sidebar( 'left' ); ?>
</section>
<section id="main">

    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                    <h1><?php the_title(); ?></h1>
                    <article><?php the_content(); ?></article>
                <?php
            }
        }
    ?>

</section>
<section id="sidebar-right" class="sidebar sidebar__right">
    <?php get_sidebar( 'right' ); ?>
</section>

<?php get_footer(); ?>
