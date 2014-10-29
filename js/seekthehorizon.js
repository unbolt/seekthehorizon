/**
 * SEEKTHEHORIZON.COM
 * Javascript madness
 */

jQuery(document).ready(function() {
	var $ = jQuery;
	console.log('Document ready, jQuery sorted.');
	$('.tooltipme').tooltip();

	var lfmsocket = io('http://cdng.io:3000');

	lfmsocket.on('lastplayed', function(data) {
		console.log('LAST PLAYED');
		console.log(data);
	});

	lfmsocket.on('nowplaying', function(data) {
		console.log('NOW PLAYING');
		console.log(data);
	});

	lfmsocket.on('scrobbled', function(data) {
		console.log('SCROBBLED');
		console.log(data);
	});

	var tweetsocket = io('http://cdng.io:3030');

	tweetsocket.on('tweet', function(data) {
		console.log('TWEET');
		console.log(data);
	});
});
