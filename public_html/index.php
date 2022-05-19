<?php
define('config', true);
require_once __DIR__ . '/../CMStra_db/config.php';
define('site_config', true);
require_once __DIR__ . '/site_config.inc.php';

// HEADER META DATA
$SpiderBot = "$site_spiderbot_index, $site_spiderbot_follow, $site_spiderbot_imageindex, $site_spiderbot_archive, $site_spiderbot_snippet, $site_spiderbot_cache, $site_spiderbot_sitelinkssearchbox, $site_spiderbot_pagereadaloud, $site_spiderbot_translate, $site_spiderbot_odp, $site_spiderbot_ydir, $site_spiderbot_yaca";
$title_page = $SiteIndexTitle;
$MetaRating = $SiteMetaRating;
$Author = $SiteAuth;
$Desc = $SiteDesc;
$Keys = $SiteKeys;
$Uri = ($_SERVER['REQUEST_URI']);

try {
  $query = $db->query("SELECT * FROM contents ORDER BY id DESC LIMIT 20");


  define('cabeca', true);
  require_once __DIR__ . '/header.inc.php';
  echo "<h1>" . $title_page . "</h1>";

  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

    // DEFINE IF cCONTENT IS PAGE OR NOT AND IF IS ONLINE
    if ($row['content_is_page'] == "1" && $row['content_status'] == "1") {
      echo "";
    } else {

      if ($row['content_status'] == "0") {
        echo "";
      } else {
        echo "<div class=\"listlinkscontents\"><p><a href=\"content.php?id=$row[id]\">" . $row['content_title'] . "</a></p></div>";
      }
    };
  }
  $db = NULL;
} catch (Exception $e) {
  echo "<p>Unable to get records:" . $e->getMessage() . "</p>";
  exit;
}

echo "<div class=\"navlinks\"><p><a href=\"main.php\">" . $LinkAllContents . "</a></p></div>";


define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
