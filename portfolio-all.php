<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>

  <!-- Stylesheets -->
  <link href="/themes/colorsy/css/bootstrap.css" rel="stylesheet">
  
  <link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
  
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="/themes/colorsy/css/font-awesome.css">
  <!-- Flexslider -->
  <link rel="stylesheet" href="/themes/colorsy/css/flexslider.css">  
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="/themes/colorsy/css/prettyPhoto.css">
  <!-- Main stylesheet -->
  <link href="/themes/colorsy/css/style.css" rel="stylesheet">

  <!-- Bootstrap responsive -->
  <link href="/themes/colorsy/cssbootstrap-responsive.css" rel="stylesheet">
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="/themes/colorsy/scripts/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="/img/design/header/favicon.png">
</head>

<body>

  <!-- Mainbar starts -->
  <div class="mainbar">

    <div class="matter">
      <div class="container-fluid">

                    <div id="portfolio-one">

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



// Create Fancy Box gallery div: - Note that for this bootstrap template, the id of gallery is already being used by fancybox so needs to be changed to gallery2
print '<div class="wrapper"><div class="content"><div class="main"><div id="gallery2">';



// List the files:
foreach ($contents as $item) {
	if ( (is_file($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) { // Checks for existance & validity of files
	
		// Create a valid photo URL
		$photo = $search_dir . '/' . $item;

		// Print the information:
		print "<div class=\"element\"><a href=\"photo.php?photo=$photo&percent=$fancybox\" rel=\"gallery\" title=\"$item\" class=\"thumbnail\"><img src=\"photo.php?photo=$photo&percent=$percent\"></a></div>";
	
	} // Close the IF.

} // Close the FOREACH.


print '</div></div></div></div><hr/>'; // Close the Fancy Box gallery divs.

?>


                    </div>
      </div>
    </div>
                     

  </div>
  <!-- Mainbar ends -->
  <div class="clearfix"></div>
  
  <!-- Main content ends -->

	

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<script src="/themes/colorsy/scripts/jquery.js"></script>
<script src="/themes/colorsy/scripts/bootstrap.js"></script> <!-- Bootstrap -->
<script src="/themes/colorsy/scripts/imageloaded.js"></script> <!-- Imageloaded -->
<script src="/themes/colorsy/scripts/jquery.isotope.js"></script> <!-- Isotope -->
<script src="/themes/colorsy/scripts/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="/themes/colorsy/scripts/jquery.flexslider-min.js"></script> <!-- Flexslider -->
<script src="/themes/colorsy/scripts/custom.js"></script> <!-- Main js file -->


<!-- Fancy Box Scripts -->
<script src="fancybox/_js/jquery.easing.1.3.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.min.js"></script>

<script>
$(document).ready(function() {
	$('#gallery2 a').fancybox({
		overlayColor: 'pink',
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

<script src="/scripts/hide-address-bar.js"></script>

</body>
</html>