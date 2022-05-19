<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';

//http://talkerscode.com/webtricks/sort-mysql-table-using-php.php
// ?orderby=content_title&order=asc
// ?orderby=name&order=

try {

  if ($_GET['orderby'] == "" && $_GET['order'] == "") {
    $result = $db->query("SELECT * FROM contents ORDER BY id DESC");
  }

  if ($_GET['orderby'] == "id" && $_GET['order'] == "asc") {
    $result = $db->query("SELECT * FROM contents ORDER BY id ASC");
  }

  if ($_GET['orderby'] == "content_date" && $_GET['order'] == "asc") {
    $result = $db->query("SELECT * FROM contents ORDER BY content_date ASC");
  }

  if ($_GET['orderby'] == "content_status" && $_GET['order'] == "asc") {
    $result = $db->query("SELECT * FROM contents ORDER BY content_status ASC");
  }

  if ($_GET['orderby'] == "content_title" && $_GET['order'] == "asc") {
    $result = $db->query("SELECT * FROM contents ORDER BY content_title ASC");
  }

  if ($_GET['orderby'] == "content_subtitle" && $_GET['order'] == "asc") {
    $result = $db->query("SELECT * FROM contents ORDER BY content_subtitle ASC");
  }

  if ($_GET['orderby'] == "content_author" && $_GET['order'] == "asc") {
    $result = $db->query("SELECT * FROM contents ORDER BY content_author ASC");
  }
} catch (Exception $e) {
  echo "Unable to get records. <br>";
  echo "Error: " . $e->getMessage() . "<br>";
  exit;
}

?>

<?php
define('cabeca', true);
$PageTitle = "Contents Management";
require_once __DIR__ . '/header.inc.php';
?>

<h1 id="top">Contents Management</h1>

<?php
$results = $db->query('SELECT COUNT(*) FROM (SELECT `id`,* FROM `contents` ORDER BY `id` ASC);');
//while ($row = $results->fetchArray()) {
while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
  echo '<h3>There is ' . $row["COUNT(*)"] . ' contents in database.</h3>';
} ?>

<form method="POST" action="">
  <fieldset id="searchcontent">
    <legend>Search by content</legend>
    <label for="keyword">Search:</label> <input type="text" name="keyword" id="keyword" placeholder="" required="required">
    <input type="submit" name="search" value="Go!">
  </fieldset>
</form>

<a id="topresult">&nbsp;</a>
<?php include 'search_result.php' ?>

<div style="overflow-x:auto;">
  <table>
    <thead>
      <tr>
        <th>View/Edit/Del</th>
        <th><a href="contents_management.php?orderby=id&order=asc">ID</a></th>
        <th><a href="contents_management.php?orderby=content_status&order=asc">Online (0 = No)</a></th>
        <th><a href="contents_management.php?orderby=content_date&order=asc">Date</a></th>
        <th><a href="contents_management.php?orderby=content_title&order=asc">Title</a></th>
        <th><a href="contents_management.php?orderby=content_subtitle&order=asc">Subtitle</a></th>
        <th><a href="contents_management.php?orderby=content_author&order=asc">Author</a></th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "
<tr>
<td><a href=\"view.php?id=$row[id]\">&#9744;</a> <a style='color:#fbb117' href=\"content_edit.php?id=$row[id]\">&#9998;</a> <a style='color:darkred' href=\"delete.php?id=$row[id]\" onclick=\"return confirm('DELETE CONTENT?')\">&#9746;</a><br><a href='#top'>&#8593;</a> <a href='#bottom'>&#8595;</a></td>
<td>" . $row['id'] . "</td>
<td>" . $row['content_status'] . "</td>
<td>" . $row['content_date'] . "</td>
<td>" . $row['content_title'] . "</td>
<td>" . $row['content_subtitle'] . "</td>
<td>" . $row['content_author'] . "</td>
</tr>

";
      }
      ?>
    </tbody>
  </table>
</div>

<a id="bottom">&nbsp;</a>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>