<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';

//https://www.codexworld.com/export-data-to-csv-file-using-php-mysql/
// Fetch records from database 
$query = $db->query("SELECT * FROM contents ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "teste.csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('id', 'content_status', 'content_title', 'content_subtitle', 'content_author', 'content_author_page', 'content_featured_image', 'content_featured_image_desc', 'content_abstract', 'content_content', 'content', 'content_tags', 'content_date', 'content_date_ed', 'content_is_page', 'content_is_page_nomenu', 'content_hide_dt', 'content_meta_rating', 'content_spiderbot_index', 'content_spiderbot_follow', 'content_spiderbot_imageindex', 'content_spiderbot_archive', 'content_spiderbot_snippet', 'content_spiderbot_cache', 'content_spiderbot_sitelinkssearchbox', 'content_spiderbot_pagereadaloud', 'content_spiderbot_translate', 'content_spiderbot_odp', 'content_spiderbot_ydir', 'content_spiderbot_yaca'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['content_status'], $row['content_title'], $row['content_subtitle'], $row['content_author'], $row['content_author_page'], $row['content_featured_image'], $row['content_featured_image_desc'], $row['content_abstract'], $row['content_content'], $row['content'], $row['content_tags'], $row['content_date'], $row['content_date_ed'], $row['content_is_page'], $row['content_is_page_nomenu'], $row['content_hide_dt'], $row['content_meta_rating'], $row['content_spiderbot_index'], $row['content_spiderbot_follow'], $row['content_spiderbot_imageindex'], $row['content_spiderbot_archive'], $row['content_spiderbot_snippet'], $row['content_spiderbot_cache'], $row['content_spiderbot_sitelinkssearchbox'], $row['content_spiderbot_pagereadaloud'], $row['content_spiderbot_translate'], $row['content_spiderbot_odp'], $row['content_spiderbot_ydir'], $row['content_spiderbot_yaca']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>

