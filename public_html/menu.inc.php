<?php
define('config', true);
require_once __DIR__.'/../CMStra_db/config.php';


try {
  $query_p = $db->query("SELECT * FROM contents");
echo "<ul class='menu'>";
echo "<li><a aria-hidden=\"true\" title=\"Home\" href=\"$SiteURL_H\">&#11091;</a></li>";
  while($row_p = $query_p->fetch(PDO::FETCH_ASSOC)){
    
    if ($row_p['content_is_page'] == "1" && $row_p['content_status'] == "1" && $row_p['content_is_page_nomenu'] == "0"){
      echo "<li><a itemprop=\"url\" href=\"content.php?id=$row_p[id]\">".$row_p['content_title']."</a></li>";
    }
    else{
      echo "";
    };
    
}
echo "</ul>";
}
catch (Exception $e) {
echo "<p>Unable to get records:".$e->getMessage()."</p>";
exit;
}
