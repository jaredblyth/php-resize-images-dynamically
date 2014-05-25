<?php

// This script is written by Jared Blyth in 2014. 
// This script works in PHP4 & PHP5 and creates a resized copy of an image identified using a URL string.
// It is a good idea to upload your high resolution photos from your digital camera to the cloud for safekeeping, back-up and everywhere access. However, viewing these photos online usually means either downloading each high resolution original (which is a slow process), or viewing a thumbnail copy. Unfortunately, you usually need to pre-create the thumbnails yourself using software, and then upload them to the cloud.
// This script enables you to create a reduced and resized copy of your high resolution photos directly on the server and provide a new URL for the smaller copy to the webpage or device. Large photos do not need to be downloaded which prevents large amounts of data being transferred across the internet connection.
// Because the thumbnails are created on the fly when they are needed, thumbnail copies do not need to be created and pre-stored on the server. In fact, this script allows you to create any sized thumbnail on the fly by providing a percentage parameter in the URL string.
// There a few PHP functions you can use to achieve this photo resizing function. I use "imagecopyresampled" as I find it scales well compared to the other functions.

// Please note that this script is not designed to be inserted directly into HTML as an image. Rather this script creates a new URL to the smaller reduced copy of the photo on the server. This new URL can then be used as the source attribute for an HTML image.


// Retrieve URL parameters to determine file & display size (percent)
$filename = $_GET['photo']; // Note that albums & sub folders can be included in the parameter


// Check if percent parameter included and is a number
if (isset($_GET['percent']) && is_numeric($_GET['percent']) ) {
		$percent = $_GET['percent']; } // Use percentage provided in URL parameter
	else {
		$percent = 0.1;} // Use 10% - a safe option as creates a small image
	
		
// Content type - very important - otherwise server returns gibberish
header('Content-Type: image/jpeg');

// Create new dimensions based on percentage parameter
list($width, $height) = getimagesize($filename);
$new_width = $width * $percent;
$new_height = $height * $percent;

// Resample image for best quality
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// Output image
imagejpeg($image_p, null, 100);

// Destroy images to clear memory
imagedestroy(imagecopyresampled);
imagedestroy($image_p);
imagedestroy($image);
?>