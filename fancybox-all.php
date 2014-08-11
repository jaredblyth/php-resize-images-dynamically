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

</head>

<body>

<?php // 
/* This script lists the directories and files in a directory and then creates images from the files. */

// Set the time zone:
date_default_timezone_set('Australia/Brisbane');


// Set the directory name and scan it:
$search_dir = $_GET['album'];
if (is_dir($search_dir)) {$search_dir = $_GET['album'];} else {$search_dir = 'hongkong';} // Check that album exists otherwise display default album

$contents = scandir($search_dir);


// Check if percent parameter included and is a number
if (isset($_GET['percent']) && is_numeric($_GET['percent']) ) {
		$percent = $_GET['percent']; } // Use percentage provided in URL parameter
	else {
		$percent = 0.1;} // Use 10% - a safe option as creates a small image
		

// Check if fancybox size parameter included and is a number - this determines file size of fancybox display photo
if (isset($_GET['fancybox']) && is_numeric($_GET['fancybox']) ) {
		$fancybox = $_GET['fancybox']; } // Use percentage provided in URL parameter
	else {
		$fancybox = 0.2;} // Use 20% - a safe option as creates a small image



// Create Fancy Box gallery div:
print '<div class="wrapper"><div class="content"><div class="main"><div id="gallery">';



// List the files:
foreach ($contents as $item) {
	if ( (is_file($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) { // Checks for existance & validity of files
	
		// Create a valid photo URL
		$photo = $search_dir . '/' . $item;

		// Print the information:
		print "<a href=\"photo.php?photo=$photo&percent=$fancybox\" rel=\"gallery\" title=\"$item\" class=\"thumbnail\"><img src=\"photo.php?photo=$photo&percent=$percent\"></a>";
	
	} // Close the IF.

} // Close the FOREACH.


print '</div></div></div></div><hr/>'; // Close the Fancy Box gallery divs.

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