<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widgets-top')) ?>
	</div>
	
	<div class="sidebar-menu">
		Standard menu
	</div>
	
	<div class="sidebar-featured-menu">
		Featured menu
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widgets-bottom')) ?>
	</div>

</aside>
<!-- /sidebar -->