<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<? bloginfo('charset'); ?>">
		
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
		
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <? wp_head(); ?>
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
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="header">
						<a href="<?php echo site_url(); ?>" alt="Seek the Horizon - Home">
						<h1>seek<span>the</span>horizon</h1>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					Social
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-md-9 col-md-offset-1">