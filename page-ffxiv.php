<?php
/*
Template Name: FFXIV Character
*/

// IMPORTANT
// This page uses memcache
// If you have cloned this and are trying to get it to work, it has that requirement to work 
// at any decent kind of speed.

// See if we can connect to memcache
define('MEMCACHED_HOST', '127.0.0.1'); // localhost
define('MEMCACHED_PORT', '11211'); // default memcache port

define('CHARACTER_NAME', 'Ritual Morvant');
define('CHARACTER_SERVER', 'Ragnarok');
 
// Connection creation
$memcache = new Memcache;
$cacheAvailable = $memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT);

// Set cache to false by default
$cache = false;

// Check if the cache is available via memcache
if($cacheAvailable) {
	$cache = true;
	
	$character = $memcache->get('ffxivcharacter');
	
	if(!$character) {
		$cache = false;
	} else {
		echo "<!-- Character has been read from cache -->";
	}
}

if($cache === false) {
	// We don't have a character cache, fetch it and cache it if the cache is available
	
	// Include the FFXIV Lodestone API
	// Documentation available here - https://github.com/viion/XIVPads-LodestoneAPI
	require('scripts/XIVPads-LodestoneAPI/api.php');
	
	// Initiate the API
	$Lodestone = new LodestoneAPI();
	
	// Get our character information
	$Character = $Lodestone->get(array(
	  "name" => CHARACTER_NAME, 
	  "server" => CHARACTER_SERVER
	));
	
	// Set all our variables from the functions
	$character['name'] = $Character->getName();
	$character['level'] = $Character->getActiveLevel();
	$character['class'] = $Character->getActiveClass();
	$character['job'] = $Character->getActiveJob();
	$character['portrait'] = $Character->getPortrait();
	$character['minions'] = $Character->getMinions();
	$character['mounts'] = $Character->getMounts();
	$character['levels'] = $Character->getClassJobsOrdered('named');
	$character['gear'] = $Character->getGear();
	$character['lodestone'] = $Character->getLodestone();
	
	if($cacheAvailable) {
		// Set character variables to the cache
		$cachetime = 86400; // 24 hrs
		
		$memcache->set('ffxivcharacter', $character, MEMCACHE_COMPRESSED, $cachetime); // This is set to expire in 24 hours
		
		echo "<!-- Character has been cached. -->";
	}
	
}

get_header();
?>

<?php 
if (has_post_thumbnail()):
	
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="featured-image" style="background-image: url('<? echo $feat_image; ?>');">
	<div class="post-title">
    	<h2>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    	</h2>
	</div>
</div>

<?php 
// End the featured image check statement
endif; 
?>

<div class="row">
	<div class="col-md-6">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<? the_content(); ?>
	<?php
		endwhile;
		endif;
	?>
	</div>
	<div class="col-md-6">
		<!--
		Array ( 
		[class] => gladiator 
		[icon] => http://img.finalfantasyxiv.com/lds/pc/global/images/class/24/ec5d264e53ea7749d916d7d8bc235ec9c8bb7b51.png 
		[level] => 50 
		[exp] => Array ( 
			[current] => 0
			[max] => 0 
		) 
		[exp-current] => 0 
		[exp-max] => 0 )
		-->
		
		<div class="row">
		<?
		$count = 1;
		foreach($character['levels'] as $class) {
			?>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-2">
						<div class="class-level">
						<?=$class['level']; ?>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="class-name">
						<?=$class['class'];?>
						</div>
						<?
							// Work out the percentages
							$percentage = round(($class['exp']['current'] / $class['exp']['max'])*100);
							$toggleclass = 'tooltipme';
							
							if($class['level'] == 50) {
								$percentage = 100;
								$toggleclass = '';	
							}
						?>
						<div class="progress <?=$toggleclass;?>" data-toggle="tooltip" data-placement="top" title="<?=$class['exp']['current'];?> / <?=$class['exp']['max'];?>">
						  <div class="progress-bar" role="progressbar" aria-valuenow="<?=$percentage;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$percentage;?>%;">
						  </div>
						</div>
					</div>
				</div>
				
			</div>
			<?
			$count++;
			
			if($count % 2 != 0) {
				$count = 1;
				?>
				</div>
				<div class="row">
				<?
			} 
			
		}
		?>
		</div>
	</div>
</div>

<?
get_footer();