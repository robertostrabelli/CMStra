<?php
defined('cabeca') or die ("Error" . htmlentities($Error_header, ENT_QUOTES, "utf-8"));
$Error_header = 'Error';
//https://www.brunodulcetti.com/o-que-e-e-como-resolver-o-content-security-policy/
$parte_header1 = '<!doctype html>
<html lang="'.htmlentities($SiteLang, ENT_QUOTES, "utf-8").'">
<head>
<title>'.htmlentities($title_page, ENT_QUOTES, "utf-8").' &bull; '. htmlentities($SiteName, ENT_QUOTES, "utf-8") .'</title>
<meta charset="utf-8">
<meta http-equiv="Content-Security-Policy" content="'.htmlentities($Site_CSP, ENT_HTML5, "utf-8").'">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="assets/css/normalize.css" type="text/css">
<link rel="stylesheet" href="assets/css/mobile.css" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<meta name="description" content="'.htmlentities($Desc, ENT_QUOTES, "utf-8").'">
<meta name="keywords" content="'.htmlentities($Keys, ENT_QUOTES, "utf-8").'">
<meta name="robots" content="'. htmlentities($SpiderBot, ENT_QUOTES, "utf-8") .'">
<link rel="canonical" href="' . htmlentities($SiteURL_G, ENT_QUOTES, "utf-8") . htmlentities($Uri, ENT_QUOTES, "utf-8") . '">
<link rel="shortcut icon" type="image/ico" href="favicon.ico">
<link rel="icon" type="image/png" href="icon512.png" sizes="512x512">
<link rel="apple-touch-icon" href="icon512.png">
<meta name="author" content="'.htmlentities($Author, ENT_QUOTES, "utf-8").'">
<meta name="copyright" content="'.htmlentities($SiteCopyright, ENT_QUOTES, "utf-8").'">
<meta name="rating" content="'.htmlentities($MetaRating, ENT_QUOTES, "utf-8").'">
'.htmlentities($SiteHeaderCode, ENT_QUOTES, "utf-8").'
<link rel="manifest" href="manifest.php">
<meta name="theme-color" content="#347d56">
</head>
<body itemscope itemtype="https://schema.org/WebPage">
<meta itemprop="accessibilityControl" content="fullKeyboardControl">
<meta itemprop="accessibilityControl" content="fullMouseControl">
<meta itemprop="accessibilityHazard" content="noFlashingHazard">
<meta itemprop="accessibilityHazard" content="noMotionSimulationHazard">
<meta itemprop="accessibilityHazard" content="noSoundHazard">
<meta itemprop="accessibilityAPI" content="ARIA">
<div class="borda" id="top">
<header itemscope itemtype="https://schema.org/Organization">
<div class="header">
<h2 itemprop="name"><a rel="home" itemprop="url" href="index.php">'; 

$parte_header2 = '</a></h2>
<meta itemprop="logo" content="assets/images/'.$SiteHeaderImage.'">
</div>
</header>
<nav aria-label="Navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
<div class="nav">
';

$parte_header3 = '
<form class="search" method="POST" action="search.php">
<label for="search"><small style="letter-spacing:-1px;">'.htmlentities($SearchLabel, ENT_QUOTES, "utf-8").'</small> <input id="search" size="7" type="search" name="keyword" placeholder="" required="required"></label>
<input type="submit" name="search" value="S">
</form>
</div>
</nav>
</div>
<main aria-label="Main content" itemscope itemtype="https://schema.org/Blog">
<div class="main">
<article itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
<div class="article">
<meta itemprop="thumbnailUrl" content="icon512.png">
<meta itemprop="image" content="icon512.png">

'.htmlentities($SiteContentCode, ENT_QUOTES, "utf-8").'
';


echo html_entity_decode($parte_header1, ENT_HTML5, "utf-8");

if(empty($SiteHeaderImage)){
    echo $SiteName;
}
else {
    echo '<img height="48" src="assets/images/'.$SiteHeaderImage.'" alt="'.$SiteName.'">';
};
echo html_entity_decode($parte_header2, ENT_HTML5, "utf-8");
require_once __DIR__.'/menu.inc.php';
echo html_entity_decode($parte_header3, ENT_HTML5, "utf-8");
