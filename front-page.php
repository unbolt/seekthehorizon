<?php get_header(); ?>

<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="box">
					Left
				</div>
				
				<div class="box">
					Alternate content<br/><br /><br/><br/><br/>
					Here
				</div>
				
				<?php get_sidebar(); ?>
			</div>
			<div class="col-md-9">
				<div class="box">
				Right
				<br />
				<br />
				<br />
				<br />
				<br />
				Content
				<br />
				<br />
				<br />
				<br />
				Here
				<br />
				<br />
				</div>
				
				<?php get_template_part('loop'); ?>
				
				<?php get_template_part('pagination'); ?>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>
