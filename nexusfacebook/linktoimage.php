<?php
     // Initiate the images array.
    $images = array();

// Wrap it all in an exception so you can just dump a white background image if it all goes wrong

try {
    // Open the image directory
    $dir = dir('static');

    // Read through the diriectory
   while (false !== ($file = $dir->read())):

   // Check the file extension to see if it's a jp(e)g, png or gif
   if (preg_match('/.(jpeg|jpg|gif|png)$/i', $file)) {
       // If it is, add it to the images array
       $images[] = $file;
    }

   endwhile;

   // Now we have an array of the filenames inside of the chosen directory that are images
   // We need to select one and then output it to the buffer with the correct content-type

    // first check there are any images
    if (!count($images))
        throw new Exception('No images found in the directory');

    // get a random entry
    $image = array_rand($images);
    $image = $images[$image];

    // Now we'll get some info on this file, if it turns out it's not an image (due to MIME type), the exception will catch it
    if (!$details = getimagesize($dir->path . '/' .  $image))
        throw new Exception('Could not get image details');

    // Now we have everything we need

   // Set the content type
   header ('Content-Type: ' . $details['mime']);

   // Dumpe the image

   echo  file_get_contents($dir->path . '/' . $image);

   // Clean up
   $dir->close();

   exit();

} catch (Exception $e) {

     //If there was an error, we'll just create a new image on the fly and dump that to the screen

     $img = imagecreate(600, 600);

     // Black text to show the error
     $font = imagecolorallocate($img, 0, 0, 0);

    // Add the exception message to the string
    imagestring($img, 0, 0, 0, $e->getMessage(), $font);

    // now send to the browser

   header('Content-Type: IMAGE/PNG');
   imagepng($img);
   imagedestroy($img);
   exit();
}

?>
