<?php
/*****
 *  SEEKTHEHORIZON.COM
 *  Wordpress Theme Functions
 *
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('preview', 500, 500, true); // Preview image
    add_image_size('featured', 850, 500, true); // Featured image

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
}

// Remove admin bar from the site
function remove_admin_bar()
{
    return true;
}

// Javascripts to be included in the header
function seekthehorizon_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', false, '3.2.0'); // Bootstrap
        wp_enqueue_script('bootstrap');

        wp_register_script('seekthehorizonscripts', get_template_directory_uri() . '/js/seekthehorizon.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('seekthehorizonscripts');
    }
}

// Pagination for paged posts
function seekthehorizon_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}


// Stylesheets to be included in the header
function seekthehorizon_styles()
{
    wp_register_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', array(), '3.2.0', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0', 'all');
    wp_enqueue_style('fontawesome');
    
    wp_register_style('googlefonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,900|Roboto:400,300,700|Pacifico', array(), '1.0.0', 'all');
    wp_enqueue_style('googlefonts');
    
    wp_register_style('seekthehorizon', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('seekthehorizon');
}

// Exclude category from the front page loops 
function seekthehorizon_modify_main_query($query) {
	if ( $query->is_home() ) { // Run only on the homepage
		$query->query_vars['cat'] = -9; // Exclude photos
		// $query->query_vars['posts_per_page'] = 5; // Show only 5 posts on the homepage only
	}
}

// Remove 'text/css' from enqueued stylesheets
function seekthehorizon_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail height and width
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}


function change_avatar_css($class) {
	$class = str_replace('class="avatar ', 'class="img-circle poster-avatar ', $class) ;
	return $class;
}

/*
 * ACTIONS + FILTERS + SHORTCODES
 */

// Add actions
add_action('init', 'seekthehorizon_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'seekthehorizon_styles'); // Add Theme Stylesheet
add_action('init', 'seekthehorizon_pagination'); // Add our Pagination
add_action('pre_get_posts', 'seekthehorizon_modify_main_query'); // Remove categories from homepage

// Remove actions

// Add filters
add_filter('style_loader_tag', 'seekthehorizon_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('get_avatar','change_avatar_css');