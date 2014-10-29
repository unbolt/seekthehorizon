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
	<section class="pageheader">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="header">
						<a href="<?php echo site_url(); ?>" alt="Seek the Horizon - Home">
						<h1>seek<span>the</span>horizon</h1>
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<img src="<?php echo get_template_directory_uri(); ?>/img/ffxiv.png" /> Final Fantasy XIV
					<img src="<?php echo get_template_directory_uri(); ?>/img/cactuar.png" /> Coding
					<img src="<?php echo get_template_directory_uri(); ?>/img/moogle.png" /> Photos
				</div>
			</div>
		</div>
		<div class="pageheaderborder">
		
		</div>
	</section>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 text-right">
					<?php 
					/*
						wp_nav_menu(
							array(
								'theme_location'=>'top-social-menu',
								'menu_class'=>'social-links',
								'container'=>''
							)
						);
						*/
					?>
				</div>
			</div>
		</div>