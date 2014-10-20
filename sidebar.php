<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widgets-top')) ?>
	</div>
	
	<div class="sidebar-menu">
		<?php 
		wp_nav_menu(
			array(
				'theme_location'=>'sidebar-top-menu',
				'menu_class'=>'page-links',
				'container'=>''
			)
		);
		?>
	</div>
	
	<div class="sidebar-featured-menu">
		<?php 
		wp_nav_menu(
			array(
				'theme_location'=>'sidebar-bottom-menu',
				'menu_class'=>'featured-links',
				'container'=>''
			)
		);
		?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widgets-bottom')) ?>
	</div>

</aside>
<!-- /sidebar -->