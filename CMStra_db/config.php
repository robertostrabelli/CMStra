<?php

//////////////////////////////////////////////////////////////////////////////
/////////////////////////////// DB CONNECTION ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

defined('config') or die ("Error" . htmlentities($Erro1, ENT_QUOTES, "utf-8"));
$Erro1 = 'Error';
// https://github.com/deeheber/book-inventory
try {
    $db = new PDO("sqlite:".__DIR__."/base/CMStra_SQLite.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to connect db. <br>";
    echo $e->getMessage();
    exit;
}



?>
