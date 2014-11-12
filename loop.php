<?php
	// Variable for alternating row styles
	$row = "even";
?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php 
    if (has_post_thumbnail()):
    	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	endif;
    ?>

	<!--
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			<div class="row">
				<div class="col-md-4 <?php echo $push; ?>">
					<div class="loop-thumbnail-container">
						<div class="loop-thumbnail-image">
						</div>
						<div class="loop-thumbnail-post-title">
							<h2>
                				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            				</h2>
						</div>
					</div>
				</div>
				<div class="col-md-6 <?php echo $pull; ?>">
					<?php the_excerpt();?>
				</div>
			</div>
		</div>
	</article>
	-->

<?php endwhile; ?>

<?php else: ?>

    <article>
        <h2>Nothing here!</h2>
    </article>

<?php endif; ?>
