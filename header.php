<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<? bloginfo('charset'); ?>">
		
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
		
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <? wp_head(); ?>
        
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-55950934-1', 'auto');
		  ga('require', 'displayfeatures');
		  ga('send', 'pageview');
		
		</script>
	</head>
	<body <? body_class(); ?>>
	<script type="text/javascript" src="http://xivdb.com/tooltips.js?v=1.6"></script>
	<script>
		// Tooltips for FFXIV DB
		var xivdb_tooltips =
		{
		'language' : 'EN',
		'replaceName' : true,
		'colorName' : true,
		'showIcon' : true,
		}
	</script>
	
	<section class="pageheader parallax">
		<section class="header-nav">
			<div class="header-nav-bg">&nbsp;</div>
			<div class="container">
				<div class="row">
					<div class="col-md-2 text-center logo">
						<img src="http://placehold.it/150x150" height="150" width="150" />
					</div>
					<div class="col-md-8 col-md-offset-1">
						NAV
						
						<!--
						<?php 
							wp_nav_menu(
								array(
									'theme_location'=>'top-header-menu',
									'menu_class'=>'header-menu',
									'container'=>''
								)
							);
						?>
						-->
					</div>
				</div>
			</div>
		</section>
		<section class="header-text">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1>Text appears here</h1>
						<h2>Sub text can be here below it.</h2>
					</div>
				</div>
			</div>
		</section>
	</section>
	
	
