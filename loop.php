<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <?php the_tags('<span class="badge">', '</span><span class="badge">', '</span>'); // Separated by commas with a line break at the end ?>
                    <br />
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>

                <span class="date"><?php the_time('F j, Y'); ?></span>
                <span class="author">by <?php the_author_posts_link(); ?></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="pull-left">
                        <?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
                    </a>
                <?php endif; ?>

                <?php the_excerpt();  ?>
            </div>
        </div>
    </article>


<?php endwhile; ?>

<?php else: ?>

    <article>
        <h2>Nothing here!</h2>
    </article>

<?php endif; ?>
