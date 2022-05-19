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
  $message = "<p style='color:#FFC107;'>Error: " . $e->getMessage() . "</p>";
  exit;
}

while ($res = $result->fetch(PDO::FETCH_BOTH)) {
  $id = $res['id'];
  $content_status = $res['content_status'];
  $content_tags = $res['content_tags'];
  $content_title = $res['content_title'];
  $content_subtitle = $res['content_subtitle'];
  $content_author = $res['content_author'];
  $content_featured_image = $res['content_featured_image'];
  $content_featured_image_desc = $res['content_featured_image_desc'];
  $content_content = $res['content_content'];
  $content_date = $res['content_date'];
  $content_date_ed = $res['content_date_ed'];
}

?>

<?php
define('cabeca', true);
$PageTitle = "View content";
require_once __DIR__ . '/header.inc.php';
?>
<h1>View content</h1>
<table>
  <tr>
    <td></td>
    <td><a style="color:#fbb117" href="content_edit.php?id=<?php echo $id; ?>">&#9998;</a> <a style="color:darkred" href="delete.php?id=<?php echo $id; ?>" onClick="return confirm('DELETE CONTENT?')">&#9746;</a></td>
  </tr>
  <tr>
    <td>ID</td>
    <td><?php echo $id; ?></td>
  </tr>
  <tr>
    <td>Online (0= No)</td>
    <td><?php echo $content_status; ?></td>
  </tr>
  <tr>
    <td>Created in</td>
    <td><?php echo $content_date; ?></td>
  </tr>
  <tr>
    <td>Edited in</td>
    <td><?php echo $content_date_ed; ?></td>
  </tr>
  <tr>
    <td>Title</td>
    <td><?php echo $content_title; ?></td>
  </tr>
  <tr>
    <td>Subtitle</td>
    <td><?php echo $content_subtitle; ?></td>
  </tr>
  <tr>
    <td>Author</td>
    <td><?php echo $content_author; ?></td>
  </tr>
  <tr>
    <td>Featured image</td>
    <td><img src="../assets/images/<?php echo $content_featured_image; ?>" alt="<?php echo $content_featured_image_desc; ?>"></td>
  </tr>
  <tr>
    <td>Featured image description</td>
    <td><?php echo $content_featured_image_desc; ?></td>
  </tr>
  <tr>
    <td>Tags</td>
    <td><?php echo $content_tags; ?></td>
  </tr>
  <tr>
    <td>Content</td>
    <td><?php echo $content_content; ?></td>
  </tr>
</table>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>