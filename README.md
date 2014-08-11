php-resize-images-dynamically
=============================

It is a good idea to upload your high resolution photos from your digital camera to the cloud for safekeeping, back-up and everywhere access. However, viewing these photos online usually means either downloading each high resolution original (which is a slow process), or viewing a thumbnail copy. Unfortunately, you usually need to pre-create the thumbnails yourself using software, and then upload them to the cloud. This script enables you to create a reduced and resized copy of your high resolution photos directly on the server and provide a new URL for the smaller copy to the webpage or device. Large photos do not need to be downloaded which prevents large amounts of data being transferred across the internet connection.

Because the thumbnails are created on the fly when they are needed, thumbnail copies do not need to be created and pre-stored on the server. In fact, this script allows you to create any sized thumbnail on the fly by providing a percentage parameter in the URL string.

This script works in PHP4 & PHP5 and creates a resized copy of an image identified using a URL string.

There a few PHP functions you can use to achieve this photo resizing function. I use "imagecopyresampled" as I find it scales well compared to the other functions.

Please note that this script is not designed to be inserted directly into HTML as an image. Rather this script creates a new URL to the smaller reduced copy of the photo on the server. This new URL can then be used as the source attribute for an HTML image.

Compare these two examples - 

http://jaredblyth.com/photos/adelaide/DSC00110.JPG

http://jaredblyth.com/photos/photo.php?photo=adelaide/DSC00110.JPG&percent=0.1

The first link downloads the original high resolution photo from the server (2.24MB). The second link downloads a copy that is only 10% of the original size. No second copy exists, but instead is created on the server when requested. Try changing the percentage parameter in the URL to create a different sized thumbnail. These thumbnail copies are smaller file sizes than the original, which means that the bigger original photo and its 2.24MB don't need to be downloaded.


Included also are files to list the folders that are in a directory, and also display all the photos in each directory as thumbnails with links to open larger versions of the photos. One set of files uses plain HTML5 with the JQuery fancybox plug-in. The other set of files (portfolio) uses the Bootstrap theme Colorsy with a more colorful and responsive design. These files can be controlled via URL parameters to set the number of photos per page, the size of the thumbnails, and the size of the larger versions (as percentages of the original photos in the directory).