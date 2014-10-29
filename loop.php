<?php
	// Variable for alternating row styles
	$row = "even";
?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php
		if($row === "odd") {
		
			$push = "col-md-push-8";
			$pull = "col-md-pull-2";
		
			$row = "even";	
		} else {
			
			$push = "";
			$pull = "";
			
			$row = "odd";
		}
	?>


	<?php 
    if (has_post_thumbnail()):
    	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	endif;
    ?>

	<!-- inline styles? what a joker... -->
	<style type="text/css">
		#post-<?php the_ID(); ?> .loop-thumbnail-container:after, #post-<?php the_ID(); ?> .loop-thumbnail-image {
    		background-image: url('<?php echo $feat_image; ?>'); 
		}
	</style>
	<!-- unfortunately, it's the only way I can think of achieving this properly at the moment -->

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

<?php endwhile; ?>

<?php else: ?>

    <article>
        <h2>Nothing here!</h2>
    </article>

<?php endif; ?>
