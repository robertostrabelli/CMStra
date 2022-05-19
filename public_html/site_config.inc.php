<?php
defined('site_config') or die ("Error" . htmlentities($Error_site_config, ENT_QUOTES, "utf-8"));
$Error_site_config = 'Error';
define('config', true);
require_once __DIR__.'/../CMStra_db/config.php';


try {
  $query_s = $db->query("SELECT * FROM site_config");
  while($row_s = $query_s->fetch(PDO::FETCH_ASSOC)){

  $SiteName = $row_s['site_name'];
  $SiteDesc = $row_s['site_description'];
  $SiteKeys = $row_s['site_keys'];
  $SiteAuth = $row_s['site_author'];
  $SiteCopyright = $row_s['site_meta_copyright'];
  $SiteURL_G = $row_s['site_url_global'];
  $SiteURL_H = $row_s['site_url_home'];
  $SiteHeaderImage = $row_s['site_header_img'];
  $SiteHeaderCode = $row_s['site_header_code'];
  $SiteBodyCode = $row_s['site_body_code'];
  $SiteContentCode = $row_s['site_content_code'];
  $SiteFooterCode = $row_s['site_footer_code'];
  $SiteFooterCopy = $row_s['site_footer_copyright'];
  $SiteLang = $row_s['site_lang'];
  $SiteOffContentMsg = $row_s['site_offline_content_msg'];
  $SiteIndexTitle = $row_s['site_title_index_page'];
  $SiteByTagTitle = $row_s['site_title_bytag_page'];
  $SiteMainTitle = $row_s['site_title_main_page'];
  $SiteSearchTitle = $row_s['site_title_search_page'];
  $SiteContentCreated = $row_s['site_content_created_in'];
  $SiteContentEdited = $row_s['site_content_edited_in'];
  $site_nextpage = $row_s['site_nextpage'];
  $site_previuspage = $row_s['site_previuspage'];  
  $SiteMetaRating = $row_s['site_meta_rating'];
  $SearchLabel = $row_s['site_search_label'];
  $LinkAllContents = $row_s['site_see_all_contents'];
  
  if ($row_s['site_spiderbot_index'] == 0){
    $site_spiderbot_index = "noindex";
  }else{
    $site_spiderbot_index = "index";
  }
  if ($row_s['site_spiderbot_follow'] == 0){
    $site_spiderbot_follow = "nofollow";
  }else{
    $site_spiderbot_follow = "follow";
  }
  if ($row_s['site_spiderbot_imageindex'] == 0){
    $site_spiderbot_imageindex = "noimageindex";
  }else{
    $site_spiderbot_imageindex = "imageindex";
  }
  if ($row_s['site_spiderbot_archive'] == 0){
    $site_spiderbot_archive = "noarchive";
  }else{
    $site_spiderbot_archive = "archive";
  }
  if ($row_s['site_spiderbot_snippet'] == 0){
    $site_spiderbot_snippet = "nosnippet";
  }else{
    $site_spiderbot_snippet = "nippet";
  }
  if ($row_s['site_spiderbot_cache'] == 0){
    $site_spiderbot_cache = "nocache";
  }else{
    $site_spiderbot_cache = "cache";
  }
  if ($row_s['site_spiderbot_sitelinkssearchbox'] == 0){
    $site_spiderbot_sitelinkssearchbox = "nositelinkssearchbox";
  }else{
    $site_spiderbot_sitelinkssearchbox = "sitelinkssearchbox";
  }
  if ($row_s['site_spiderbot_pagereadaloud'] == 0){
    $site_spiderbot_pagereadaloud = "nopagereadaloud";
  }else{
    $site_spiderbot_pagereadaloud = "pagereadaloud";
  }
  if ($row_s['site_spiderbot_translate'] == 0){
    $site_spiderbot_translate = "notranslate";
  }else{
    $site_spiderbot_translate = "translate";
  }
  if ($row_s['site_spiderbot_odp'] == 0){
    $site_spiderbot_odp = "noodp";
  }else{
    $site_spiderbot_odp = "odp";
  }
  if ($row_s['site_spiderbot_ydir'] == 0){
    $site_spiderbot_ydir = "noydir";
  }else{
    $site_spiderbot_ydir = "ydir";
  }
  if ($row_s['site_spiderbot_yaca'] == 0){
    $site_spiderbot_yaca = "noyaca";
  }else{
    $site_spiderbot_yaca = "yaca";
  }

  $Site_CSP = $row_s['site_csp'];
      
    
}
}
catch (Exception $e) {
echo "<p>Unable to get records:".$e->getMessage()."</p>";
exit;
}
