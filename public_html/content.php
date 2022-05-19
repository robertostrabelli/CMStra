<?php
define('config', true);
require_once __DIR__.'/../CMStra_db/config.php';
define('site_config', true);
require_once __DIR__.'/site_config.inc.php';

try {
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $sql = "SELECT * FROM contents WHERE id=?";
  $result = $db->prepare($sql);
  $result->bindValue(1, $id, PDO::PARAM_INT);
  $result->execute();
} catch (Exception $e) {
  $message = "<p style='color:#FFC107;'>Error: " . $e->getMessage() . "</p>";
  exit;
}

while($row = $result->fetch(PDO::FETCH_ASSOC)) {

  // DEFINE SPIDERBOTS INDEXING
  if ($row['content_spiderbot_index'] == 0){
    $content_spiderbot_index = "noindex";
  }else{
    $content_spiderbot_index = "index";
  }
  if ($row['content_spiderbot_follow'] == 0){
    $content_spiderbot_follow = "nofollow";
  }else{
    $content_spiderbot_follow = "follow";
  }
  if ($row['content_spiderbot_imageindex'] == 0){
    $content_spiderbot_imageindex = "noimageindex";
  }else{
    $content_spiderbot_imageindex = "imageindex";
  }
  if ($row['content_spiderbot_archive'] == 0){
    $content_spiderbot_archive = "noarchive";
  }else{
    $content_spiderbot_archive = "archive";
  }
  if ($row['content_spiderbot_snippet'] == 0){
    $content_spiderbot_snippet = "nosnippet";
  }else{
    $content_spiderbot_snippet = "nippet";
  }
  if ($row['content_spiderbot_cache'] == 0){
    $content_spiderbot_cache = "nocache";
  }else{
    $content_spiderbot_cache = "cache";
  }
  if ($row['content_spiderbot_sitelinkssearchbox'] == 0){
    $content_spiderbot_sitelinkssearchbox = "nositelinkssearchbox";
  }else{
    $content_spiderbot_sitelinkssearchbox = "sitelinkssearchbox";
  }
  if ($row['content_spiderbot_pagereadaloud'] == 0){
    $content_spiderbot_pagereadaloud = "nopagereadaloud";
  }else{
    $content_spiderbot_pagereadaloud = "pagereadaloud";
  }
  if ($row['content_spiderbot_translate'] == 0){
    $content_spiderbot_translate = "notranslate";
  }else{
    $content_spiderbot_translate = "translate";
  }
  if ($row['content_spiderbot_odp'] == 0){
    $content_spiderbot_odp = "noodp";
  }else{
    $content_spiderbot_odp = "odp";
  }
  if ($row['content_spiderbot_ydir'] == 0){
    $content_spiderbot_ydir = "noydir";
  }else{
    $content_spiderbot_ydir = "ydir";
  }
  if ($row['content_spiderbot_yaca'] == 0){
    $content_spiderbot_yaca = "noyaca";
  }else{
    $content_spiderbot_yaca = "yaca";
  }
  // HEADER META DATA
  $SpiderBot = "$content_spiderbot_index, $content_spiderbot_follow, $content_spiderbot_imageindex, $content_spiderbot_archive, $content_spiderbot_snippet, $content_spiderbot_cache, $content_spiderbot_sitelinkssearchbox, $content_spiderbot_pagereadaloud, $content_spiderbot_translate, $content_spiderbot_odp, $content_spiderbot_ydir, $content_spiderbot_yaca";
  $MetaRating = $row['content_meta_rating'];
  $Author = $row['content_author'];
  $Desc = $row['content_abstract'];
  $Keys = $row['content_tags'];
  $title_page = $row['content_title'];
  $Uri = ($_SERVER['REQUEST_URI']);
  
  define('cabeca', true);
  require_once __DIR__.'/header.inc.php';
  echo '<meta itemprop="mainEntityOfPage" content="' . htmlentities($SiteURL_G, ENT_QUOTES, "utf-8") . htmlentities($Uri, ENT_QUOTES, "utf-8") . '">';

  // HIDE OR SHOW CONTENT
  if ($row['content_status'] == "0"){
    echo "<p>$SiteOffContentMsg</p>";
  }else{
    echo "<h1 itemprop=\"name headline\">".$row['content_title']."</h1>";
    if (empty($row['content_subtitle'])) {
      echo "";
    }
    else {
      echo "<h2>".$row['content_subtitle']."</h2>";
    };
    if (empty($row['content_author'])) {
      echo "";
    }
    else {
      if (empty($row['content_author_page'])) {
        echo "<div itemprop=\"author\" itemscope itemtype=\"https://schema.org/Person\">";
        echo "<h4><span itemprop=\"name\">".$row['content_author']."</span></h4>";
        echo "<meta itemprop=\"jobTitle\" content=\"\">";
        echo "<meta itemprop=\"worksFor\" content=\"\">";
        echo "</div>";
      }
      else {
        echo "<div itemprop=\"author\" itemscope itemtype=\"https://schema.org/Person\">";
        echo "<h4><a rel=\"author\" itemprop=\"url\" href=\"content.php?id=".$row['content_author_page']."\" title=\"View author biography\"><span itemprop=\"name\">".$row['content_author']."</span></a></h4>";
        echo "<meta itemprop=\"jobTitle\" content=\"\">";
        echo "<meta itemprop=\"worksFor\" content=\"\">";
        echo "</div>";

      }
     
    };

    if (empty($row['content_featured_image'])) {
      echo "";
    }
    else {
    echo "<figure><img src=\"assets/images/".$row['content_featured_image']."\" alt=\"".$row['content_featured_image_desc']."\">
    <figcaption>".$row['content_featured_image_desc']."</figcaption>
    </figure>";
    }

    echo "<div itemprop=\"contentBody\">".$row['content_content']."</div>";

    // HIDE OR SHOW TAGS AND DATE    
    if ($row['content_hide_dt'] == "1"){
      echo "";
    }else{
    if (empty($row['content_tags'])) {
      echo "<p class='content_info'><small><time datetime=\"".$row['content_date']."\" itemprop=\"datePublished\">".$SiteContentCreated." ".$row['content_date']."</time>, ".$SiteContentEdited." ".$row['content_date_ed']."</small></p>
      <meta itemprop=\"dateModified\" content=\"".$row['content_date_ed']."\">
      <meta itemprop=\"description\" content=\"".$row['content_abstract']."\">
      ";
    }
    else {
      echo "<p class='content_info'><small><time datetime=\"".$row['content_date']."\" itemprop=\"datePublished\">".$SiteContentCreated." ".$row['content_date']."</time>, ".$SiteContentEdited." ".$row['content_date_ed']." - ";      
      //https://www.tutorialkart.com/php/php-split-string-into-words/
      $delimiter = ', ';
      $words = explode($delimiter, $row['content_tags']);
      echo "<span itemprop=\"keywords\">";
      foreach ($words as $word) {
        echo "<a title=\"tag search\" rel=\"category tag\" href='contents.php?tag=". htmlspecialchars(rawurlencode($word)) ."'>".$word."</a>";
      }
      echo "</span>";
      echo "</small></p>";
      echo "<meta itemprop=\"dateModified\" content=\"".$row['content_date_ed']."\">";
      echo "<meta itemprop=\"description\" content=\"".$row['content_abstract']."\">";
    };
 }

 echo "<span itemprop=\"publisher\" itemscope itemtype=\"https://schema.org/Organization\">";
 echo "<meta itemprop=\"name\" content=\"Strabelli\">";

 echo "<span itemprop=\"logo\" itemscope itemtype=\"https://schema.org/ImageObject\">";
 echo "<meta itemprop=\"url\" content=\"icon512.png\">";
 echo "<meta itemprop=\"width\" content=\"512\">";
 echo "<meta itemprop=\"height\" content=\"512\">";
 echo "</span>";

 echo "</span>";

 echo "<span itemprop=\"image\" itemscope itemtype=\"https://schema.org/ImageObject\">";
 echo "<meta itemprop=\"url\" content=\"icon512.png\">";
 echo "<meta itemprop=\"width\" content=\"512\">";
 echo "<meta itemprop=\"height\" content=\"512\">";
 echo "</span>";


echo '

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "' . htmlentities($title_page, ENT_QUOTES, "utf-8") . '",
    "image": "' . htmlentities($SiteURL_H, ENT_QUOTES, "utf-8") .'/assets/images/'. htmlentities($row['content_featured_image'], ENT_QUOTES, "utf-8") . '",
    "publisher": {
      "@type": "Organization",
      "name": "' . htmlentities($SiteName, ENT_QUOTES, "utf-8") . '",
      "url": "' . htmlentities($SiteURL_G, ENT_QUOTES, "utf-8") . '",
      "logo": {
        "@type": "ImageObject",
        "url": "' . htmlentities($SiteURL_H, ENT_QUOTES, "utf-8") .'/'. htmlentities($SiteHeaderImage, ENT_QUOTES, "utf-8") . '",
        "width": "' . htmlentities($NAOEXISTE, ENT_QUOTES, "utf-8") . '",
        "height": "' . htmlentities($NAOEXISTE, ENT_QUOTES, "utf-8") . '"
      }
    },
    "url": "' . htmlentities($SiteURL_G, ENT_QUOTES, "utf-8") . htmlentities($Uri, ENT_QUOTES, "utf-8") . '",
    "datePublished": "' . htmlentities($row['content_date'], ENT_QUOTES, "utf-8") . '",
    "dateCreated": "' . htmlentities($row['content_date'], ENT_QUOTES, "utf-8") . '",
    "dateModified": "' . htmlentities($row['content_date_ed'], ENT_QUOTES, "utf-8") . '",
    "description": "' . htmlentities($Desc, ENT_QUOTES, "utf-8") . '",
    "author": {
      "@type": "Person",
      "name": "' . htmlentities($row['content_author'], ENT_QUOTES, "utf-8") . '",
      "url": "' . htmlentities($SiteURL_H, ENT_QUOTES, "utf-8") .'/content.php?id='. htmlentities($row['content_author_page'], ENT_QUOTES, "utf-8") . '"
    },
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "' . htmlentities($SiteURL_H, ENT_QUOTES, "utf-8") . '"
    }
  }
</script>

';

}
}

define('rodape', true);
require_once __DIR__.'/footer.inc.php';
