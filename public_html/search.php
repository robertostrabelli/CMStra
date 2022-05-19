<?php
define('config', true);
require_once __DIR__.'/../CMStra_db/config.php';
define('site_config', true);
require_once __DIR__.'/site_config.inc.php';

// HEADER META DATA
$SpiderBot = "$site_spiderbot_index, $site_spiderbot_follow, $site_spiderbot_imageindex, $site_spiderbot_archive, $site_spiderbot_snippet, $site_spiderbot_cache, $site_spiderbot_sitelinkssearchbox, $site_spiderbot_pagereadaloud, $site_spiderbot_translate, $site_spiderbot_odp, $site_spiderbot_ydir, $site_spiderbot_yaca";
$title_page = "$SiteSearchTitle $keyword";
$MetaRating = $SiteMetaRating;
$Author = $SiteAuth;
$Desc = $SiteDesc;
$Keys = $SiteKeys;
$Uri = ($_SERVER['REQUEST_URI']);


define('cabeca', true);
require_once __DIR__.'/header.inc.php';


if(ISSET($_POST['search'])){
	$keyword = $_POST['keyword'];
	
echo "<h1>$SiteSearchTitle $keyword</h1>";
//https://phpdelusions.net/pdo_examples/select
$stmt = $db->query("SELECT * FROM `contents` WHERE `id` LIKE '%$keyword%' OR `content_tags` LIKE '%$keyword%' OR `content_title` LIKE '%$keyword%' OR `content_subtitle` LIKE '%$keyword%' OR `content_author` LIKE '%$keyword%' OR `content_content` LIKE '%$keyword%'") or die("Error");



while ($row = $stmt->fetch()) {

	// HIDE OR SHOW CONTENT
	if ($row['content_status'] == "0"){
		echo "";
	}else{
		echo "<div class=\"listlinkscontents\"><p><a href=\"content.php?id=$row[id]\">".$row['content_title']."</a></p></div>";
	}
}

echo "<div class=\"navlinks\">:)</div>";
}

define('rodape', true);
require_once __DIR__.'/footer.inc.php';
