<?php
// https://www.portugal-a-programar.pt/forums/topic/66849-resolvido-upload-e-resize-a-assets/img/
namespace abeautifulsite;
use Exception;

require 'simpleimage.php';

try {

   $img = new SimpleImage();
   $image = $_FILES['ImageFile']['name'];
   $img->load($_FILES['ImageFile']['tmp_name']);  
   //$img->thumbnail(700, 525);
   //$img->thumbnail(700,934);
   $img->fit_to_width(700);
   $img->save('../assets/images/'.$image.'');
   echo '<h1 style="text-align:center;color:green;">Image processed and saved!<br><a href="images_management.php">Back</a></h1>';
   header( "Refresh:5; url=images_management.php", true, 303);

} catch (Exception $e) {
   echo '<h1 style="text-align:center;color:red;">'.$e->getMessage().'<br><a href="images_management.php">Back</a></h1>';
   // header('location: images_management.php');
   header( "Refresh:5; url=images_management.php", true, 303);
}
