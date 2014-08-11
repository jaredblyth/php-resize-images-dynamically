<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Albums - Portfolio</title>
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
		print "<h3><a href=\"portfolio.php?album=$item\">$item</p></h3>";
	
	} // Close the IF.

} // Close the FOREACH.


		// Print special links (i.e. the excludes)
		print "<h3><a href=\"portfolio.php?album=xxx&percent=0.3&fancybox=0.5\">xxx</p></h3>";
		
		print "<h3><a href=\"portfolio.php?album=yyy&percent=0.3&fancybox=0.5\">yyy</p></h3>";


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