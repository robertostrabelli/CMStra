<?php
define('config', true);
require_once __DIR__ . '/../CMStra_db/config.php';
define('site_config', true);
require_once __DIR__ . '/site_config.inc.php';


try {
  $result = $db->query("SELECT COUNT(id) FROM contents");
  // https://stackoverflow.com/questions/12297403/sqlite-pagination-with-pdo
  $per_page = '12';
  $rows = $result->fetchAll();
  $total_records = count($rows);
  $pages = ceil($total_records / $per_page);
  $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
  $start = ($page - 1) * $per_page;
  $query = $db->query("SELECT * FROM contents ORDER BY id DESC LIMIT $start , $per_page");


  // HEADER META DATA
  $SpiderBot = "$site_spiderbot_index, $site_spiderbot_follow, $site_spiderbot_imageindex, $site_spiderbot_archive, $site_spiderbot_snippet, $site_spiderbot_cache, $site_spiderbot_sitelinkssearchbox, $site_spiderbot_pagereadaloud, $site_spiderbot_translate, $site_spiderbot_odp, $site_spiderbot_ydir, $site_spiderbot_yaca";
  $title_page = $SiteMainTitle;
  $MetaRating = $SiteMetaRating;
  $Author = $SiteAuth;
  $Desc = $SiteDesc;
  $Keys = $SiteKeys;
  $Uri = ($_SERVER['REQUEST_URI']);


  define('cabeca', true);
  require_once __DIR__ . '/header.inc.php';
  echo "<h1>$title_page</h1>";

  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

    // DEFINE IF CONTENT IS PAGE OR NOT AND IF IS ONLINE
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
  echo "Unable to get records. <br />";
  echo "Error: " . $e->getMessage() . "<br />";
  exit;
}
?>

<div class="navlinks">
  <p>&nbsp;
    <?php
    //https://stackoverflow.com/questions/50853032/how-to-start-with-page-number-in-php-pagination
    if ($page > 1) { ?>
      <span><a href="?page=<?php echo $page - 1 ?>"><?php echo $site_previuspage ?></a></span>
    <?php } ?>
    <?php for ($i = 1; $i <= $total_pages; $i++) {
      //if its active page add active variable
      if ($page == $i) {
        $class = 'active';
      } else {
        $class = '';
      }
    ?>
      <span class="<?php echo $class; ?>"><a href='?page=<?php echo $i ?>'><?php echo $i ?></a></span>
    <?php } ?>
    <span class="navnext"><a href="?page=<?php echo $page + 1 ?>"> <?php echo $site_nextpage ?></a>&nbsp;</span>
  </p>
</div>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php'; ?>