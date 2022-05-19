<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';
// https://github.com/n0ob1e/PHP-Webshell-Remake/blob/master/shell.php

if (!isset($_GET['path'])) {
    $path = "../../CMStra_db/base";
}
if (isset($_GET['path'])) {
    $path = $_GET['path'];
}

?>


<?php
define('cabeca', true);
$PageTitle = "Database Management";
require_once __DIR__ . '/header.inc.php';
?>
<h1>Database Management</h1>

<ul>
    <li><a href="backup.php">Make copy of CMStra_SQLite.db</a></li>
    <li><a href="optimize_base.php">Optimize CMStra_SQLite.db</a></li>
    <li><a href="export.php">Export as CSV</a></li>
    <li><a href="import.php">Import from CSV (dont work)</a></li>
</ul>

<form action="" method="POST" enctype="multipart/form-data">
    <fieldset id="importfile">
        <legend>IMPORT</legend>
        <label for="arquivo">Select .db file <input type="file" name="file" id="arquivo"></label>
        <button type="submit" name="submitfile">Send</button>
    </fieldset>
</form>

<?php
if (!isset($_GET['option']) or empty($_GET['option'])) {
    if (is_file($path)) {
        $fcontent = htmlspecialchars(file_get_contents($path));
        echo "<pre>" . $fcontent . "</pre>";
        die;
    }
}
if (isset($_GET['option'])) {
    if (is_file($path)) {
        $info = pathinfo($path);
        if (is_file($info['basename'])) {
        }

        if ($_GET['option'] == "rename") {
            if (isset($_POST['renameSubmit'])) {

                $input = $_POST['rename'];

                rename($path, $input);

                header('location: base_management.php');
            }

            echo "<form method='POST'>
                                <fieldset id='renamefile'>
                                <legend>Rename</legend>
                                <p><small>DO NOT DELETE THE PATH! Ex: ../../CMStra_db/base/filename.db</small></p>
                                <input size='45' type='text' name='rename' value='../../CMStra_db/base/" . $info['basename'] . "'><br><br>
                                <input type='submit' name='renameSubmit' value='Rename'>
                                </fieldset>
                                </form></article></main></body></html>
                                ";

            die;
        }
        if ($_GET['option'] == "remove") {
            unlink($path);

            header("location: base_management.php");
            die;
        }
    }
}
function perms($file)
{
    $perms = fileperms($file);

    if (($perms & 0xC000) == 0xC000) {
        // Socket
        $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {
        // Symbolic Link
        $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {
        // Regular
        $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {
        // Block special
        $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {
        // Directory
        $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {
        // Character special
        $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {
        // FIFO pipe
        $info = 'p';
    } else {
        // Unknown
        $info = 'u';
    }

    // Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
        (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '-'));

    // Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
        (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '-'));

    // World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
        (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '-'));

    return $info;
}

$scan = scandir($path);

echo '<table>';
echo "<tr><th><small>File name</small></th>";
echo "<th><small>Size</small></th>";
//echo "<th><small>Permissions</small></th>";
echo "<th><small>Options</small></th></tr>";

foreach ($scan as $dir) {
    if (!is_dir($path . '/' . $dir) || $dir == '.' || $dir == '..') continue;

    echo "<tr>";
    echo "<td>" . $dir . "</td>";
    echo "<td>[+]</td>";
    //echo "<td>" . perms($path.'/'.$dir) . "</td>";
    echo "<td>" . "</td>";
    echo "</tr>";
}
foreach ($scan as $file) {
    if (!is_file($path . '/' . $file)) continue;

    $size = filesize($path . '/' . $file) / 1024;
    $size = round($size, 3);
    if ($size >= 1024) {
        $size = round($size / 1024, 2) . ' MB';
    } else {
        $size = $size . ' KB';
    }
    echo "<tr>";
    echo "<td><small>" . $file . "</small></td>";
    echo "<td><small>" . $size . "</small></td>";
    //echo "<td><small>" . perms($path.'/'.$file) . "</small></td>";
    echo "<td><small>" . "<a href='download.php?path=" . $path . "/" . $file . "'>Download</a>" . " / " . "<a href='" . $_SERVER['PHP_SELF'] . "?path=" . $path . "/" . $file . "&option=rename" . "'>Rename</a>" . " / " . "<a onclick='return confirm(\"DELETE FILE?\");' href='" . $_SERVER['PHP_SELF'] . "?path=" . $path . '/' . $file . "&option=remove" . "'>Delete</a>" . "</small></td>";
    echo "</tr>";
}

if (isset($_POST['submitfile'])) {

    $filename = $_FILES['file']['name'];

    move_uploaded_file($_FILES['file']['tmp_name'], $path . '/' . $filename);

    echo ("<meta http-equiv='refresh' content='1'>");
}

?>

</table>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>