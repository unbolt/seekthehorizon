<?php
/*****
 *  SEEKTHEHORIZON.COM
 *  Wordpress Theme Functions
 *
 */

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('preview', 500, 500, true); //

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
}
