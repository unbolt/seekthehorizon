<?php get_header(); ?>

<main role="main">
    <section>
        <?php get_template_part('loop'); ?>

        <?php get_template_part('pagination'); ?>
        
        <?php comments_template(); ?> 

    </section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
