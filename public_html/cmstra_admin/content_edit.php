<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';

try {
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $sql = "SELECT * FROM contents WHERE id=?";
  $result = $db->prepare($sql);
  $result->bindValue(1, $id, PDO::PARAM_INT);
  $result->execute();
} catch (Exception $e) {
  $message = "<br><h2 style='color:red;'>Error: " . $e->getMessage() . "</h2>";
  exit;
}

while ($res = $result->fetch(PDO::FETCH_BOTH)) {
  $id = $res['id'];

  $content_status = $res['content_status'];
  $content_title = $res['content_title'];
  $content_subtitle = $res['content_subtitle'];
  $content_author = $res['content_author'];
  $content_author_page = $res['content_author_page'];
  $content_featured_image = $res['content_featured_image'];
  $content_featured_image_desc = $res['content_featured_image_desc'];
  $content_abstract = $res['content_abstract'];
  $content_content = $res['content_content'];
  $content_tags = $res['content_tags'];
  $content_date = $res['content_date'];
  $content_date_ed = $res['content_date_ed'];
  $content_is_page = $res['content_is_page'];
  $content_is_page_nomenu = $res['content_is_page_nomenu'];
  $content_hide_dt = $res['content_hide_dt'];
  $content_meta_rating = $res['content_meta_rating'];
  $content_spiderbot_index = $res['content_spiderbot_index'];
  $content_spiderbot_follow = $res['content_spiderbot_follow'];
  $content_spiderbot_imageindex = $res['content_spiderbot_imageindex'];
  $content_spiderbot_archive = $res['content_spiderbot_archive'];
  $content_spiderbot_snippet = $res['content_spiderbot_snippet'];
  $content_spiderbot_cache = $res['content_spiderbot_cache'];
  $content_spiderbot_sitelinkssearchbox = $res['content_spiderbot_sitelinkssearchbox'];
  $content_spiderbot_pagereadaloud = $res['content_spiderbot_pagereadaloud'];
  $content_spiderbot_translate = $res['content_spiderbot_translate'];
  $content_spiderbot_odp = $res['content_spiderbot_odp'];
  $content_spiderbot_ydir = $res['content_spiderbot_ydir'];
  $content_spiderbot_yaca  = $res['content_spiderbot_yaca'];
}

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

  if (empty($content_title)) {
    $message = "<br><h2 style='color:red;'>Need a title and Online condiction, at least!</h2>";
  } else {

    $sql = "UPDATE contents SET content_status = ?, content_title = ?, content_subtitle = ?, content_author = ?, content_author_page = ?, content_featured_image = ?, content_featured_image_desc = ?, content_abstract = ?, content_content = ?, content_tags = ?, content_date = ?, content_date_ed = ?, content_is_page = ?, content_is_page_nomenu = ?, content_hide_dt = ?, content_meta_rating = ?, content_spiderbot_index = ?, content_spiderbot_follow = ?, content_spiderbot_imageindex = ?, content_spiderbot_archive = ?, content_spiderbot_snippet = ?, content_spiderbot_cache = ?, content_spiderbot_sitelinkssearchbox = ?, content_spiderbot_pagereadaloud = ?, content_spiderbot_translate = ?, content_spiderbot_odp = ?, content_spiderbot_ydir = ?, content_spiderbot_yaca  = ? WHERE id = ?";

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
      $results->bindValue(29, $id, PDO::PARAM_INT);
      $results->execute();
      $message = "<h2 style='color:green;'>Edited with great sucess!</h2>";
    } catch (Exception $e) {
      $message = "<h2 style='color:red;'>Error: " . $e->getMessage() . "</h2>";
      exit;
    }
  }
}
?>

<?php
define('cabeca', true);

$PageTitle = "Content Edit";
require_once __DIR__ . '/header.inc.php';
?>
<h1>Content Edit</h1>


<?php if (isset($message)) {
  echo "$message";
  header("Refresh:3; url=contents_management.php", true, 303);
} ?>


<?php
//https://stackoverflow.com/questions/4366730/how-do-i-check-if-a-string-contains-a-specific-word

$datenow = date("Y-m-d H:i:s");
$content_date_ed = $datenow;

echo "
<form method='post'>
<fieldset id='contentbody'>
  <legend>Content</legend>
  <p><label for='content_title'>Title</label><br><input size='47' type='text' name='content_title' id='content_title' value='" . $content_title . "'></p>
  <p><label for='content_subtitle'>Subtitle</label><br><input size='47' type='text' name='content_subtitle' id='content_subtitle' value='" . $content_subtitle . "'></p>
  <p><label for='content_author'>Author</label><br><input size='47' type='text' name='content_author' id='content_author' value='" . $content_author . "'></p>
  <p><label for='content_author_page'>Author's page (Id number)</label><br><input size='47' type='text' name='content_author_page' id='content_author_page' value='" . $content_author_page . "'></p>
  <p><label for='content_tags'>Tags (separated by comma and space. ex: key, tag, word)</label><br><input size='47' type='text' name='content_tags' id='content_tags' value='" . $content_tags . "'></p>
  <p><img src='../assets/images/" . $content_featured_image . "' alt='" . $content_featured_image_desc . "'><br>
  <a href='cmstra_admin/images_management.php?path=../assets/images/" . $content_featured_image . "&option=remove'>Delete image</a></p>
  <p><label for='content_featured_image'>Featured image</label><br><input size='47' type='text' name='content_featured_image' id='content_featured_image' value='" . $content_featured_image . "'></p>
  <p><label for='content_featured_image_desc'>Featured image description</label><br><input size='47' type='text' name='content_featured_image_desc' id='content_featured_image_desc' value='" . $content_featured_image_desc . "'></p>
  <p><label for='content_abstract'>Abstract</label><br><textarea rows='4' cols='90' style='width:100%' name='content_abstract' id='content_abstract'>" . $content_abstract . "</textarea></p>
  <p><label for='content_content'>Full Text</label><br><textarea rows='8' cols='90' style='width:100%' name='content_content' id='content_content'>" . $content_content . "</textarea></p>
</fieldset>

<fieldset id='contentpage'>
  <legend>Appearence and status</legend>  
  <p>0 = False, 1 = True</p>

  <p><label for='content_status'><input id='content_status' name='content_status' size='1' type='text' value='" . $content_status . "'> Online</label></p>  
    <p><label for='content_is_page'><input id='content_is_page' name='content_is_page' size='1' type='text' value='" . $content_is_page . "'> This is a page</label></p>   
    <p><label for='content_is_page_nomenu'><input id='content_is_page_nomenu' name='content_is_page_nomenu' size='1' type='text' value='" . $content_is_page_nomenu . "'> As a page, no show in menu</label></p>     
  <p><label for='hide_dt'><input id='hide_dt' name='content_hide_dt' size='1' type='text' value='" . $content_hide_dt . "'> Hide date and tags</label></p>     
</fieldset>

 <h3><button style='font-size: 24px' type='submit'>Confirm changes</button></h3>

 <h4>Avanced Settings - Configure below only if necessary.</h4>


 <fieldset id='content_meta_rating'>
  <legend>Rating</legend>
  <table>
  <tr><td>General</td><td>Mature</td><td>Restricted</td></tr>
  <tr><td>Adult</td><td>14 years</td><td>Safe for kids</td></tr>
  </table>
  
  <p><label for='rating'>Rating: </label><input id='rating' name='content_meta_rating' size='5' type='text' value='" . $content_meta_rating . "'></p>
</fieldset>

<fieldset id='content_spiderbot'>
  <legend>Spiderbots settings</legend>
  <p>Here you can control the meta tags instructions for search engines for this content</p>
  <p>0 = False, 1 = True</p>
  
    <p><label for='content_spiderbot_index'><input id='content_spiderbot_index' name='content_spiderbot_index' size='1' type='text' value='" . $content_spiderbot_index . "'> Search engines can index this text</label></p>
  
    <p><label for='content_spiderbot_follow'><input id='content_spiderbot_follow' name='content_spiderbot_follow' size='1' type='text' value='" . $content_spiderbot_follow . "'> Search engines can follow links in this text</label></p>
  
    <p><label for='content_spiderbot_imageindex'><input id='content_spiderbot_imageindex' name='content_spiderbot_imageindex' size='1' type='text' value='" . $content_spiderbot_imageindex . "'> Search engines can index images showed in this content</label></p>
   
    <p><label for='content_spiderbot_archive'><input id='content_spiderbot_archive' name='content_spiderbot_archive' size='1' type='text' value='" . $content_spiderbot_archive . "'> Search engines can archive this content in search results</label></p>  

    <p><label for='content_spiderbot_cache'><input id='content_spiderbot_cache' name='content_spiderbot_cache' size='1' type='text' value='" . $content_spiderbot_cache . "'> Search engines can cache this content in search results</label></p>
  
    <p><label for='content_spiderbot_snippet'><input id='content_spiderbot_snippet' name='content_spiderbot_snippet' size='1' type='text' value='" . $content_spiderbot_snippet . "'> Search engines can display a text snippet of a video preview in search results</label></p>  
  
    <p><label for='content_spiderbot_sitelinkssearchbox'><input id='content_spiderbot_sitelinkssearchbox' name='content_spiderbot_sitelinkssearchbox' size='1' type='text' value='" . $content_spiderbot_sitelinkssearchbox . "'> Allow search boxes in search engine results</label></p>  
 
    <p><label for='content_spiderbot_pagereadaloud'><input id='content_spiderbot_pagereadaloud' name='content_spiderbot_pagereadaloud' size='1' type='text' value='" . $content_spiderbot_pagereadaloud . "'> Text-to-speech (TTS) services can read aloud this webpages</label></p>  
  
    <p><label for='content_spiderbot_translateno'><input id='content_spiderbot_translateno' name='content_spiderbot_translate' size='1' type='text' value='" . $content_spiderbot_translate . "'> Search engines can translate this content in search results</label></p>  
   
    <p><label for='content_spiderbot_odpno'><input id='content_spiderbot_odpno' name='content_spiderbot_odp' size='1' type='text' value='" . $content_spiderbot_odp . "'> Search engines can use information from The Open Directory Project in search results</label></p>
  
    <p><label for='content_spiderbot_ydir'><input id='content_spiderbot_ydir' name='content_spiderbot_ydir' size='1' type='text' value='" . $content_spiderbot_ydir . "'> Allow Yahoo Directory</label></p> 
  
    <p><label for='content_spiderbot_yaca'><input id='content_spiderbot_yaca' name='content_spiderbot_yaca' size='1' type='text' value='" . $content_spiderbot_yaca . "'> Search results can snippet from using the page description from the Yandex Directory</label></p>
  

</fieldset>

<input type='hidden' name='content_date' value='" . $content_date . "'>
<input type='hidden' name='content_date_ed' value='" . $content_date_ed . "'>
<input type='hidden' name='id' value='" . $id . "'>

<h3><button style='font-size: 24px' type='submit'>Confirm changes</button></h3>
</form>
";
?>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>