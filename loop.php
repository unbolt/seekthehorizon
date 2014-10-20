<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-md-12">
                
                <?php 
                // If the post has a featured image, we want to show it nicely
                // at the top of the post.
                
                if (has_post_thumbnail()):
                	
                	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>
                <div class="featured-image" style="background-image: url('<? echo $feat_image; ?>');">
                	<div class="post-title">
	                	<h2>
	                    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	                	</h2>
                	</div>
                	
                	<div class="post-tags">
                		<?php the_tags('<span class="badge">', '</span><span class="badge">', '</span>'); ?>
                	</div>
                </div>
                
                <?php 
                // End the featured image check statement
                endif; 
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php the_content();  ?>
            </div>
        </div>
        
        <div class="row">
        	<div class="col-md-12">
        		<? echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?> &nbsp; <em>Posted <?php the_date('F j, Y'); ?>, <?php comments_number( 'No Horizon Seekers', 'One Saught the Horizon', '% Horizon Seekers' ); ?></em>
        	</div>
        </div>
    </article>


<?php endwhile; ?>

<?php else: ?>

    <article>
        <h2>Nothing here!</h2>
    </article>

<?php endif; ?>
