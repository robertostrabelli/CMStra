<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';


define('cabeca', true);
$Uri = ($_SERVER['REQUEST_URI']);
$PageTitle = "Start";
require_once __DIR__ . '/header.inc.php';


//contar arquivos de imagem
$count = count(glob("../assets/images/*.*"));

$content_statusTotal = $db->prepare("SELECT SUM(content_status) FROM contents");
$content_statusTotal->execute();
$content_status = $content_statusTotal->fetch(PDO::FETCH_NUM);
$content_status = $content_status[0];
?>

<h1>Hello!</h1>
<form method="POST" action="">
  <fieldset id="search">
    <legend>Search content</legend>
    <p><label for=keyword>Search: <input type="text" name="keyword" id="keyword" placeholder="" required="required" /></label>
      <input type="submit" name="search" value="Go!">
    </p>
  </fieldset>
</form>
<a id="topresult">&nbsp;</a>
<?php include 'search_result.php' ?>


<p>View all posts in ascending order by:</p>
<table>
  <tr>
    <td><a href="contents_management.php?orderby=id&order=asc">ID</a></td>
    <td><a href="contents_management.php?orderby=content_status&order=asc">Online Contents</a></td>
  </tr>


  <tr>
    <td><a href="contents_management.php?orderby=content_title&order=asc">Title</a></td>
    <td><a href="contents_management.php?orderby=content_date&order=asc">Date</a></td>
  </tr>

  <tr>
    <td><a href="contents_management.php?orderby=content_subtitle&order=asc">Subtitle</a></td>
    <td><a href="contents_management.php?orderby=content_author&order=asc">Author</a></td>
  </tr>

</table>

<p>Management</p>
<table>
  <tr>
    <td><a href="images_management.php">Images</a></td>
    <td><a href="base_management.php">Database</a></td>
  </tr>
</table>

<?php
echo "
<p>Stats</p>
<table>
";
//contar registros
$results = $db->query('SELECT COUNT(*) FROM (SELECT `id`,* FROM `contents`);');
while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
  echo '<tr><td>Total contents</td><td>' . $row["COUNT(*)"] . '</td></tr>';
}
echo "
<tr><td>Online</td><td>" . $content_status . "</td></tr>
<tr><td>Images</td><td>" . $count . "</td></tr>
</table>
";
?>

<p>Server Data</p>
<table>
  <tr>
    <td>
      <?php
      echo $_SERVER['PHP_SELF'];
      echo "</td></tr><tr><td>";
      echo $_SERVER['SERVER_NAME'];
      echo "</td></tr><tr><td>";
      echo $_SERVER['HTTP_HOST'];
      echo "</td></tr><tr><td>";
      echo $_SERVER['HTTP_REFERER'];
      echo "</td></tr><tr><td>";
      echo $_SERVER['HTTP_USER_AGENT'];
      echo "</td></tr><tr><td>";
      echo $_SERVER['SCRIPT_NAME'];
      ?>
    </td>
  </tr>
</table>


<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>