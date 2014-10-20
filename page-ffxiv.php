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
<div class="row">
	<div class="col-md-6">
		<h1><?=$character['name'];?></h1>
		<h2><?=$character['level'];?> <?=$character['class'];?></h2>
	</div>
	<div class="col-md-6">
		<? echo '<img src="'. $character['portrait'].'" />'; ?>
	</div>
</div>


<?
// Minions
foreach($character['minions'] as $minion) {
	echo '<img src="'.$minion['icon'].'" class="tooltipme" data-toggle="tooltip" data-placement="top" title="'.$minion['name'].'" />';
}

print_r($character['levels']);

print_r($character['gear']);

?>


<?
get_footer();