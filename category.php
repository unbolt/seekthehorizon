<?php get_header(); ?>

<main role="main">
    <section>

        <h1>Category Title (todo)</h1>

        <?php get_template_part('loop'); ?>

        <?php get_template_part('pagination'); ?>

    </section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
