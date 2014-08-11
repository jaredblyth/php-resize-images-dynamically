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
/* This script lists the directories and files in a directory and then creates images from the files. The images can be viewed using fancybox*/

// Set the time zone:
date_default_timezone_set('Australia/Brisbane');


// CREATE ALBUM
// Set the directory name and scan it:
$search_dir = $_GET['album'];
// Check that album exists otherwise display default album
	if (is_dir($search_dir)) 
		{$search_dir = $_GET['album'];} 
	else {$search_dir = 'hongkong';}


// COLLECT ALL CONTENT FROM DIRECTORY
$contents_all = scandir($search_dir, 0); // Change last parameter to 1 to reverse the order

// Determine total number of files in directory
$contents_total = count($contents_all);


// DETERMINE WHAT AND HOW MUCH CONTENT TO DISPLAY ON CURRENT PAGE
// Create current page number
// Check if page parameter included and is a number
	if (isset($_GET['page']) && is_numeric($_GET['page']) ) {
		$page = $_GET['page']; } // Use page provided in URL parameter
	else {
		$page = 1;} // Default page
			
// Determine the maximum files to be shown per page
	if (isset($_GET['max']) && is_numeric($_GET['max']) ) {
		$max_per_page = $_GET['max']; } // Use maximum number provided in URL parameter
	else {
		$max_per_page = 30; } // Default maximum number
		
// Determine number of pages based on max per page
$number_of_pages = ceil($contents_total / $max_per_page);

//  Determine which files in list to use to create photos on current page
$first_file = ($max_per_page * $page) - $max_per_page; // The first file to be shown
$last_file = $max_per_page; // The last file to be shown

$contents = array_slice($contents_all, $first_file, $last_file); // The files that will be shown on this page


// DETERMINE SIZE OF THUMBNAILS
// Check if percent parameter included and is a number
	if (isset($_GET['percent']) && is_numeric($_GET['percent']) ) {
		$percent = $_GET['percent']; } // Use percentage provided in URL parameter to determine thumbnail size
	else {
		$percent = 0.1;} // Use 10% - a safe option as creates a small image
	
		
// DETERMINE SIZE OF FANCYBOX IMAGES
// Check if fancybox size parameter included and is a number - this determines file size of fancybox display photo (it is passed to photo.php as a percent parameter
	if (isset($_GET['fancybox']) && is_numeric($_GET['fancybox']) ) {
		$fancybox = $_GET['fancybox']; } // Use percentage provided in URL parameter
	else {
		$fancybox = 0.2;} // Use 20% - a safe option as creates a mid-sized image


// CREATE PHOTOS
// Create Fancy Box gallery div: - Note that for this bootstrap template, the id of gallery is already being used so needs to be changed to gallery2 for fancybox
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


// LINK ALBUM PAGES TOGETHER	
// Create a hyperlink loop through the pages

print "<div style=\"background-color:#F3E5AB;\">";

// Grab current file name to include in hyperlink name
$filename = $_SERVER["SCRIPT_NAME"];
$hyperlink = $filename.'?album='.$search_dir.'&max='.$max_per_page.'&percent='.$percent.'&fancybox='.$fancybox;
		
// Calculate previous page, loop back to last page if reached first page
$previous_page = $page - 1; 
	if ($previous_page < 1) 
		{$previous_page = $number_of_pages;}
		
// Print link to previous page
print "<strong><a href=\"$hyperlink&page=$previous_page\" style=\"clear:all; padding:10px;\">&lt; Prev</a></strong>";

// Create direct links to each page (remember that number of pages is a variable affected by both $contents_total and $_GET['max']
foreach (range(1,$number_of_pages) as $page_number) {// Start at 1 as 0 (which is actually first value in an array) is not useful in this process as there is no page 0

	print "<strong><a href=\"$hyperlink&page=$page_number\" style=\"clear:all; padding:10px;\">$page_number</a></strong>";
}

// Calculate next page, loop back to 1 if reached max/last page
$nextpage = $page + 1; 
	if ($nextpage > $number_of_pages) 
		{$nextpage = 1;}

// Print link to next page
print "<strong><a href=\"$hyperlink&page=$nextpage\" style=\"clear:all; padding:10px;\">Next &gt;</a></strong>";

print "</div>";

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