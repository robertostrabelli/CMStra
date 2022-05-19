<?php
require '3-protect.php';
define('config', true);
require_once __DIR__.'/../../CMStra_db/config.php';
//http://naveendalmeida.blogspot.com/2014/07/connecting-to-sqlite-databases-and.html
try {
  $sth = $db->prepare("VACUUM");
  $sth->execute();
  $message = "<br><h3 style='color:green;text-align:center;'>Database Optimized with Sucess!<br>wait...</h3>";
} catch(Exception $e){
    $message = "<br><h3 style='color:red;text-align:center;'>Error: " . $e->getMessage() . "</h3>";
    exit;
}
if(isset($message)){
  echo "$message";
  header( "Refresh:3; url=base_management.php", true, 303);
}
