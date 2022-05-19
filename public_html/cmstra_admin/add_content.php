<?php
require '3-protect.php';

$content_status = $content_title = $content_subtitle = $content_author = $content_author_page = $content_featured_image = $content_featured_image_desc = $content_abstract = $content_content = $content_tags = $content_date = $content_date_ed = $content_is_page = $content_is_page_nomenu = $content_hide_dt = $content_meta_rating = $content_spiderbot_index = $content_spiderbot_follow = $content_spiderbot_imageindex = $content_spiderbot_archive = $content_spiderbot_snippet = $content_spiderbot_cache = $content_spiderbot_sitelinkssearchbox = $content_spiderbot_pagereadaloud = $content_spiderbot_translate = $content_spiderbot_odp = $content_spiderbot_ydir = $content_spiderbot_yaca  = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $content_status = trim(filter_input(INPUT_POST, 'content_status', FILTER_VALIDATE_BOOLEAN));
  $content_title = trim(filter_input(INPUT_POST, 'content_title', FILTER_SANITIZE_STRING));
  $content_subtitle = trim(filter_input(INPUT_POST, 'content_subtitle', FILTER_SANITIZE_STRING));
  $content_author = trim(filter_input(INPUT_POST, 'content_author', FILTER_SANITIZE_STRING));
  $content_author_page = trim(filter_input(INPUT_POST, 'content_author_page', FILTER_SANITIZE_STRING));
  $content_featured_image = trim(filter_input(INPUT_POST, 'content_featured_image', FILTER_SANITIZE_STRING));
  $content_featured_image_desc = trim(filter_input(INPUT_POST, 'content_featured_image_desc', FILTER_SANITIZE_STRING));
  $content_abstract = trim(filter_input(INPUT_POST, 'content_abstract', FILTER_SANITIZE_STRING));
  $content_content = trim(filter_input(INPUT_POST, 'content_content', FILTER_UNSAFE_RAW));
  $content_tags = trim(filter_input(INPUT_POST, 'content_tags', FILTER_SANITIZE_STRING));
  $content_date = trim(filter_input(INPUT_POST, 'content_date', FILTER_SANITIZE_STRING));
  $content_date_ed = trim(filter_input(INPUT_POST, 'content_date_ed', FILTER_SANITIZE_STRING));
  $content_is_page = trim(filter_input(INPUT_POST, 'content_is_page', FILTER_VALIDATE_BOOLEAN));
  $content_is_page_nomenu = trim(filter_input(INPUT_POST, 'content_is_page_nomenu', FILTER_VALIDATE_BOOLEAN));
  $content_hide_dt = trim(filter_input(INPUT_POST, 'content_hide_dt', FILTER_VALIDATE_BOOLEAN));
  $content_meta_rating = trim(filter_input(INPUT_POST, 'content_meta_rating', FILTER_SANITIZE_STRING));
  $content_spiderbot_index = trim(filter_input(INPUT_POST, 'content_spiderbot_index', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_follow = trim(filter_input(INPUT_POST, 'content_spiderbot_follow', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_imageindex = trim(filter_input(INPUT_POST, 'content_spiderbot_imageindex', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_archive = trim(filter_input(INPUT_POST, 'content_spiderbot_archive', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_snippet = trim(filter_input(INPUT_POST, 'content_spiderbot_snippet', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_cache = trim(filter_input(INPUT_POST, 'content_spiderbot_cache', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_sitelinkssearchbox = trim(filter_input(INPUT_POST, 'content_spiderbot_sitelinkssearchbox', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_pagereadaloud = trim(filter_input(INPUT_POST, 'content_spiderbot_pagereadaloud', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_translate = trim(filter_input(INPUT_POST, 'content_spiderbot_translate', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_odp = trim(filter_input(INPUT_POST, 'content_spiderbot_odp', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_ydir = trim(filter_input(INPUT_POST, 'content_spiderbot_ydir', FILTER_VALIDATE_BOOLEAN));
  $content_spiderbot_yaca  = trim(filter_input(INPUT_POST, 'content_spiderbot_yaca', FILTER_VALIDATE_BOOLEAN));

  //if(empty($content_status) || empty($content_title)){
  if (empty($content_content)) {
    $message = "<br><h2 style='color:red;'>Need a content, at least!</h2>";
  } else {
    define('config', true);
    require_once __DIR__ . '/../../CMStra_db/config.php';

    $sql = 'INSERT into contents(content_status, content_title, content_subtitle, content_author, content_author_page, content_featured_image, content_featured_image_desc, content_abstract, content_content, content_tags, content_date, content_date_ed, content_is_page, content_is_page_nomenu, content_hide_dt, content_meta_rating, content_spiderbot_index, content_spiderbot_follow, content_spiderbot_imageindex, content_spiderbot_archive, content_spiderbot_snippet, content_spiderbot_cache, content_spiderbot_sitelinkssearchbox, content_spiderbot_pagereadaloud, content_spiderbot_translate, content_spiderbot_odp, content_spiderbot_ydir, content_spiderbot_yaca) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $content_status, PDO::PARAM_BOOL);
      $results->bindValue(2, $content_title, PDO::PARAM_STR);
      $results->bindValue(3, $content_subtitle, PDO::PARAM_STR);
      $results->bindValue(4, $content_author, PDO::PARAM_STR);
      $results->bindValue(5, $content_author_page, PDO::PARAM_STR);
      $results->bindValue(6, $content_featured_image, PDO::PARAM_STR);
      $results->bindValue(7, $content_featured_image_desc, PDO::PARAM_STR);
      $results->bindValue(8, $content_abstract, PDO::PARAM_STR);
      $results->bindValue(9, $content_content, PDO::PARAM_STR);
      $results->bindValue(10, $content_tags, PDO::PARAM_STR);
      $results->bindValue(11, $content_date, PDO::PARAM_STR);
      $results->bindValue(12, $content_date_ed, PDO::PARAM_STR);
      $results->bindValue(13, $content_is_page, PDO::PARAM_BOOL);
      $results->bindValue(14, $content_is_page_nomenu, PDO::PARAM_BOOL);
      $results->bindValue(15, $content_hide_dt, PDO::PARAM_BOOL);
      $results->bindValue(16, $content_meta_rating, PDO::PARAM_STR);
      $results->bindValue(17, $content_spiderbot_index, PDO::PARAM_BOOL);
      $results->bindValue(18, $content_spiderbot_follow, PDO::PARAM_BOOL);
      $results->bindValue(19, $content_spiderbot_imageindex, PDO::PARAM_BOOL);
      $results->bindValue(20, $content_spiderbot_archive, PDO::PARAM_BOOL);
      $results->bindValue(21, $content_spiderbot_snippet, PDO::PARAM_BOOL);
      $results->bindValue(22, $content_spiderbot_cache, PDO::PARAM_BOOL);
      $results->bindValue(23, $content_spiderbot_sitelinkssearchbox, PDO::PARAM_BOOL);
      $results->bindValue(24, $content_spiderbot_pagereadaloud, PDO::PARAM_BOOL);
      $results->bindValue(25, $content_spiderbot_translate, PDO::PARAM_BOOL);
      $results->bindValue(26, $content_spiderbot_odp, PDO::PARAM_BOOL);
      $results->bindValue(27, $content_spiderbot_ydir, PDO::PARAM_BOOL);
      $results->bindValue(28, $content_spiderbot_yaca, PDO::PARAM_BOOL);
      $results->execute();
      $message = "<br><h2 style='color:green;'>Great Sucess!</h2>";
      $content_status = $content_title = $content_subtitle = $content_author = $content_author_page = $content_featured_image = $content_featured_image_desc = $content_abstract = $content_content = $content_tags = $content_date = $content_date_ed = $content_is_page = $content_is_page_nomenu = $content_hide_dt = $content_meta_rating = $content_spiderbot_index = $content_spiderbot_follow = $content_spiderbot_imageindex = $content_spiderbot_archive = $content_spiderbot_snippet = $content_spiderbot_cache = $content_spiderbot_sitelinkssearchbox = $content_spiderbot_pagereadaloud = $content_spiderbot_translate = $content_spiderbot_odp = $content_spiderbot_ydir = $content_spiderbot_yaca  = '';
    } catch (Exception $e) {
      $message = "<br><h2 style='color:red;'>Error: " . $e->getMessage() . "</h2>";
      exit;
    }
  }
}
?>

<?php
define('cabeca', true);
$PageTitle = "Add Content";
require_once __DIR__ . '/header.inc.php';
?>
<h1>Composing a new content</h1>


<form method="post">
  <?php
  if (isset($message)) {
    echo "$message";
    header("Refresh:3; url=add_content.php", true, 303);
  }
  ?>

  <fieldset id="contentbody">
    <legend>Content</legend>
    <p><label for="content_title">Title</label><br><input size="47" type="text" name="content_title" id="content_title" value="<?php echo $content_title; ?>"></p>
    <p><label for="content_subtitle">Subtitle</label><br><input size="47" type="text" name="content_subtitle" id="content_subtitle" value="<?php echo $content_subtitle; ?>"></p>
    <p><label for="content_author">Author</label><br><input size="47" type="text" name="content_author" id="content_author" value="<?php echo $content_author; ?>"></p>
    <p><label for="content_author_page">Author's page (Id number)</label><br><input size="47" type="text" name="content_author_page" id="content_author_page" value="<?php echo $content_author_page; ?>"></p>
    <p><label for="content_tags">Tags (separated by comma and space. ex: key, tag, word)</label><br><input size="47" type="text" name="content_tags" id="content_tags" value="<?php echo $content_tags; ?>"></p>
    <p><label for="content_featured_image">Featured image</label><br><input size="47" type="text" name="content_featured_image" id="content_featured_image" value="<?php echo $content_featured_image; ?>"></p>
    <p><label for="content_featured_image_desc">Featured image description</label><br><input size="47" type="text" name="content_featured_image_desc" id="content_featured_image_desc" value="<?php echo $content_featured_image_desc; ?>"></p>
    <p><label for="content_abstract">Abstract</label><br><textarea rows="4" cols="90" style="width:100%;" name="content_abstract" id="content_abstract"><?php echo $content_abstract; ?></textarea></p>
    <p><label for="content_content">Full Text</label><br><textarea rows="9" cols="90" style="width:100%;" name="content_content" id="content_content"><?php echo $content_content; ?></textarea></p>
  </fieldset>

  <fieldset id="contentpage">
    <legend>Appearence and status</legend>
    <p>Status</p>
    <table class="buttons">
      <tr>
        <td><label for="content_status0"><input id="content_status0" name="content_status" type="radio" checked="checked" value="<?php echo $content_status; ?>"> Offline</label></td>
        <td><label for="content_status1"><input id="content_status1" name="content_status" type="radio" value="1<?php echo $content_status; ?>"> Online</label></td>
      </tr>
    </table>
    <p>Content/post or page</p>
    <table class="buttons">
      <tr>
        <td><label for="pageno"><input id="pageno" name="content_is_page" type="radio" checked="checked" value="0<?php echo $content_is_page; ?>"> It is a content/post</label></td>
        <td><label for="pageyes"><input id="pageyes" name="content_is_page" type="radio" value="1<?php echo $content_is_page; ?>"> It is a page</label></td>
      </tr>
    </table>
    <p>As page, show in menu</p>
    <table class="buttons">
      <tr>
        <td><label for="pagemenuyes"><input id="pagemenuyes" name="content_is_page_nomenu" type="radio" value="1<?php echo $content_is_page_nomenu; ?>"> No</label></td>
        <td><label for="pagemenuno"><input id="pagemenuno" name="content_is_page_nomenu" type="radio" checked="checked" value="0<?php echo $content_is_page_nomenu; ?>"> Yes</label></td>

      </tr>
    </table>
    <p>Show line with date and tags</p>
    <table class="buttons">
      <tr>
        <td><label for="hide_dtyes"><input id="hide_dtyes" name="content_hide_dt" type="radio" value="1<?php echo $content_hide_dt; ?>"> No</label></td>
        <td><label for="hide_dtno"><input id="hide_dtno" name="content_hide_dt" type="radio" checked="checked" value="0<?php echo $content_hide_dt; ?>"> Yes</label></td>

      </tr>
    </table>


  </fieldset>

  <h2 style="font-size: 24px;text-align:center;"><button type="submit">&#9745; Save</button></h2>

  <h4>Avanced Settings - Configure below only if necessary.</h4>

  <fieldset id="content_meta_rating">
    <legend>Rating</legend>

    <table class="buttons">
      <tr>
        <td><label for="general"><input id="general" name="content_meta_rating" type="radio" checked="checked" value="general<?php echo $content_meta_rating; ?>"> General</label></td>
        <td><label for="mature"><input id="mature" name="content_meta_rating" type="radio" value="mature<?php echo $content_meta_rating; ?>"> Mature</label></td>
        <td><label for="restricted"><input id="restricted" name="content_meta_rating" type="radio" value="restricted<?php echo $content_meta_rating; ?>"> Restricted</label></td>
      </tr>
      <tr>
        <td><label for="adult"><input id="adult" name="content_meta_rating" type="radio" value="adult<?php echo $content_meta_rating; ?>"> Adult</label></td>
        <td><label for="14years"><input id="14years" name="content_meta_rating" type="radio" value="14 years<?php echo $content_meta_rating; ?>"> 14 years</label></td>
        <td><label for="safe"><input id="safe" name="content_meta_rating" type="radio" value="Safe for kids<?php echo $content_meta_rating; ?>"> Safe for kids</label></td>
      </tr>
    </table>

  </fieldset>

  <fieldset id="content_spiderbot">
    <legend>Spiderbots settings - Here you can control the following robots meta tags</legend>

    <p>Allow this content appearing in search engines</p>
    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_indexno"><input id="content_spiderbot_indexno" name="content_spiderbot_index" type="radio" value="0<?php echo $content_spiderbot_index; ?>"> No</label></td>
        <td><label for="content_spiderbot_indexyes"><input id="content_spiderbot_indexyes" name="content_spiderbot_index" type="radio" checked="checked" value="1<?php echo $content_spiderbot_index; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow search engines follow links within this content</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_followno"><input id="content_spiderbot_followno" name="content_spiderbot_follow" type="radio" value="0<?php echo $content_spiderbot_follow; ?>"> No</label></td>
        <td><label for="content_spiderbot_followyes"><input id="content_spiderbot_followyes" name="content_spiderbot_follow" type="radio" checked="checked" value="1<?php echo $content_spiderbot_follow; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow search engines indexing images in this content</p>
    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_imageindexno"><input id="content_spiderbot_imageindexno" name="content_spiderbot_imageindex" type="radio" value="0<?php echo $content_spiderbot_imageindex; ?>"> No</label></td>
        <td><label for="content_spiderbot_imageindexyes"><input id="content_spiderbot_imageindexyes" name="content_spiderbot_imageindex" type="radio" checked="checked" value="1<?php echo $content_spiderbot_imageindex; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow search engines archive this content</p>
    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_archiveno"><input id="content_spiderbot_archiveno" name="content_spiderbot_archive" type="radio" value="0<?php echo $content_spiderbot_archive; ?>"> No</label></td>
        <td><label for="content_spiderbot_archiveyes"><input id="content_spiderbot_archiveyes" name="content_spiderbot_archive" type="radio" checked="checked" value="1<?php echo $content_spiderbot_archive; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow search engines cache this content</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_cacheno"><input id="content_spiderbot_cacheno" name="content_spiderbot_cache" type="radio" value="0<?php echo $content_spiderbot_cache; ?>"> No</label></td>
        <td><label for="content_spiderbot_cacheyes"><input id="content_spiderbot_cacheyes" name="content_spiderbot_cache" type="radio" checked="checked" value="1<?php echo $content_spiderbot_cache; ?>"> Yes</label></td>
      </tr>
    </table>


    <p>Allow search engines to display a text snippet of a video preview for this content in search results</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_snippetno"><input id="content_spiderbot_snippetno" name="content_spiderbot_snippet" type="radio" value="0<?php echo $content_spiderbot_snippet; ?>"> No</label></td>
        <td><label for="content_spiderbot_snippetyes"><input id="content_spiderbot_snippetyes" name="content_spiderbot_snippet" type="radio" checked="checked" value="1<?php echo $content_spiderbot_snippet; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow search boxes in search engine results</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_sitelinkssearchboxno"><input id="content_spiderbot_sitelinkssearchboxno" name="content_spiderbot_sitelinkssearchbox" type="radio" value="0<?php echo $content_spiderbot_sitelinkssearchbox; ?>"> No</label></td>
        <td><label for="content_spiderbot_sitelinkssearchboxyes"><input id="content_spiderbot_sitelinkssearchboxyes" name="content_spiderbot_sitelinkssearchbox" type="radio" checked="checked" value="1<?php echo $content_spiderbot_sitelinkssearchbox; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow Text-to-speech (TTS) services read aloud this content</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_pagereadaloudno"><input id="content_spiderbot_pagereadaloudno" name="content_spiderbot_pagereadaloud" type="radio" value="0<?php echo $content_spiderbot_pagereadaloud; ?>"> No</label></td>
        <td><label for="content_spiderbot_pagereadaloudyes"><input id="content_spiderbot_pagereadaloudyes" name="content_spiderbot_pagereadaloud" type="radio" checked="checked" value="1<?php echo $content_spiderbot_pagereadaloud; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow translating this content in search results</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_translateno"><input id="content_spiderbot_translateno" name="content_spiderbot_translate" type="radio" value="0<?php echo $content_spiderbot_translate; ?>"> No</label></td>
        <td><label for="content_spiderbot_translateyes"><input id="content_spiderbot_translateyes" name="content_spiderbot_translate" type="radio" checked="checked" value="1<?php echo $content_spiderbot_translate; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow search engines use information from The Open Directory Project in search results for this content</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_odpno"><input id="content_spiderbot_odpno" name="content_spiderbot_odp" type="radio" value="0<?php echo $content_spiderbot_odp; ?>"> No</label></td>
        <td><label for="content_spiderbot_odpyes"><input id="content_spiderbot_odpyes" name="content_spiderbot_odp" type="radio" checked="checked" value="1<?php echo $content_spiderbot_odp; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow Yahoo Directory</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_ydirno"><input id="content_spiderbot_ydirno" name="content_spiderbot_ydir" type="radio" value="0<?php echo $content_spiderbot_ydir; ?>"> No</label></td>
        <td><label for="content_spiderbot_ydiryes"><input id="content_spiderbot_ydiryes" name="content_spiderbot_ydir" type="radio" checked="checked" value="1<?php echo $content_spiderbot_ydir; ?>"> Yes</label></td>
      </tr>
    </table>

    <p>Allow search engines snippet use the page description from the Yandex Directory</p>

    <table class="buttons">
      <tr>
        <td><label for="content_spiderbot_yacano"><input id="content_spiderbot_yacano" name="content_spiderbot_yaca" type="radio" value="0<?php echo $content_spiderbot_yaca; ?>"> No</label></td>
        <td><label for="content_spiderbot_yacayes"><input id="content_spiderbot_yacayes" name="content_spiderbot_yaca" type="radio" checked="checked" value="1<?php echo $content_spiderbot_yaca; ?>"> Yes</label></td>
      </tr>
    </table>

  </fieldset>

  <input type="hidden" name="content_date" value="<?php echo date("Y-m-d H:i:s");
                                                  echo $content_date; ?>">
  <!-- <input type="hidden" name="content_date_ed" value="<?php // echo date("Y-m-d H:i:s"); echo $content_date_ed; 
                                                          ?>"> -->
  <h2 style="font-size: 24px;text-align:center;"><button type="submit">&#9745; Save</button></h2>
</form>


<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>