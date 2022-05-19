<?php
defined('cabeca') or die ("Error" . htmlentities($Erro1, ENT_QUOTES, "utf-8"));
$Erro1 = 'Error';
$CSP = "connect-src 'self'; font-src 'self'; frame-src 'self'; object-src 'none'; prefetch-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'";

$conteudo1 = '<!DOCTYPE html>
<html lang="en-US">
<head>
<meta http-equiv="Content-Security-Policy" content="'.htmlentities($CSP, ENT_HTML5, "utf-8").'">
<meta name="robots" content="noindex, nofollow, noimageindex, noarchive, nosnippet, nocache, nositelinkssearchbox, nopagereadaloud, notranslate, noodp, noydir, noyaca">
<title>'.htmlentities($PageTitle, ENT_HTML5, "utf-8").' &bull; CMStra</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="assets/css/normalize.css" type="text/css">
<link rel="stylesheet" href="assets/css/mobile.css" type="text/css">
<link rel="shortcut icon" type="image/ico" href="favicon.ico">
<link rel="icon" type="image/png" href="icon512.png" sizes="512x512">
<link rel="apple-touch-icon" href="icon512.png">
</head>
<body>
<div class="borda" id="toptop">
<header>
<div class="header">
<h2><a href="index.php"><img src="logo.png" alt="CMStra Dashboard"></a><br><small>Creative Dashboard</small></h2>
</div>
</header>
<nav>
<div class="nav">
<ul class="menu">
<li><a href="index.php">&#11091;</a></li>
  <li><a href="add_content.php">Add new</a></li>
  <li><a href="contents_management.php">Contents</a></li>
  <li><a href="images_management.php">Images</a></li>
  <li><a href="base_management.php">Database</a></li>
  <li><a href="site_config.php?id=1">Settings</a></li>
  <li><a href="site_config_style.php">Custom styles</a></li>
  <li><a href="../index.php" target="_blank">See your site</a></li>
  <li><a href="logout.php">Logout</a></li>
  </ul>
  </div>
</nav>
</div>
<main>
<div class="main">
<article>
<div class="article">
  ';

  echo html_entity_decode($conteudo1, ENT_HTML5, "utf-8");
