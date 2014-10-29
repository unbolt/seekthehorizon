<?php get_header(); ?>

<main role="main">
    <section>
        <?php get_template_part('loop'); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php get_template_part('pagination'); ?>
        
		        <?php comments_template(); ?> 
			</div>
		</div>
	</div>

    </section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
