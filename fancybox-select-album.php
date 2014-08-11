<!DOCTYPE html>
<html>
<head>

<style>
.thumbnail {
	border:none;
	display: inline-table;
	vertical-align: middle;
	text-align: center;
	padding:10px;
	margin:5px;}
</style>

<title>Albums - Fancybox</title>
</head>

<body>

<?php // 
/* This script lists the directories and files in a directory and then creates hyperlinks */

// Print heading

print "<h1>Photo Albums</h1>";

// Set the time zone:
date_default_timezone_set('Australia/Brisbane');


// Set the directory name and scan it:
$search_dir = '.';
$contents = scandir($search_dir);

// Exclude specific directories (because they are not photo albums or albums for inclusion in list)
$excludes = array("xxx", "yyy");

// List the directories (but not files):
foreach ($contents as $item) {
	if ( 
	
		(is_dir($search_dir . '/' . $item)) // Checks that item is a directory
		
		AND 
		
		(substr($item, 0, 1) != '.') 
		
		AND 
		
		(in_array($item, $excludes) !== true) // Checks that item is not included in the excludes array
		
		)
		
		{ // Checks for existance & validity of directory
	

		// Print the links (HTML with directories as variables):
		print "<h3><a href=\"fancybox.php?album=$item\">$item</p></h3>";
	
	} // Close the IF.

} // Close the FOREACH.


		// Print special links (i.e. the excludes)
		print "<h3><a href=\"portfolio.php?album=xxx&percent=0.3&fancybox=0.5\">xxx</p></h3>";
		
		print "<h3><a href=\"portfolio.php?album=yyy&percent=0.3&fancybox=0.5\">yyy</p></h3>";


?>


<!-- Fancy Box Scripts -->

<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="fancybox/_js/jquery.easing.1.3.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.min.js"></script>

<script>
$(document).ready(function() {
	$('#gallery a').fancybox({
		overlayColor: '#060',
		overlayOpacity: .3,
		transitionIn: 'elastic',
		transitionOut: 'elastic',
		easingIn: 'easeInSine',
		easingOut: 'easeOutSine',
		titlePosition: 'outside' ,		
		cyclic: true
	});
}); // end ready
</script>

<!-- End of Fancy Box Scripts -->

</body>
</html>