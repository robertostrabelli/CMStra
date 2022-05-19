<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';


// https://github.com/n0ob1e/PHP-Webshell-Remake/blob/master/shell.php

if (!isset($_GET['path'])) {
    $path = "../assets/images";
}
if (isset($_GET['path'])) {
    $path = $_GET['path'];
}

?>

<?php
define('cabeca', true);

$PageTitle = "Images Management";
require_once __DIR__ . '/header.inc.php';
?>

<h1 id="top">Images Management</h1>

<?php
$count = count(glob("../assets/images/*.*"));
echo "<p>There is $count files in assets/images/</p>"; ?>

<span class="searchimage">Search <script id="cool_find_script" src="js/find6.js"></script></span>



<form action="processupload.php" method="post" enctype="multipart/form-data">
    <fieldset id="uploadimage">
        <legend>Upload image</legend>
        <label for="file">Select file <input name="ImageFile" type="file" id="file"></label>
        <input type="submit" name="send" value="Send">
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

                header('location: images_management.php');
            }

            echo "
                                <form method='POST'>
                                <fieldset id='renameimage'>
                                <legend>Rename file</legend>
                                <p>DO NOT DELETE THE PATH! Ex: ../assets/images/filename.jpg</p>
                                <input size='45' type='text' name='rename' value='../assets/images/" . $info['basename'] . "'>
                                <input type='submit' name='renameSubmit' value='Rename'>
                                </fieldset>
                                </form></article></main></body></html>
                                ";
            die;
        }

        if ($_GET['option'] == "rotate") {
            //https://stackoverflow.com/questions/11259881/how-to-rotate-image-and-save-the-image
            // File and rotation
            $rotateFilename = $_GET['path'];
            $degrees = -90;
            $fileType = strtolower(substr($rotateFilename, strrpos($rotateFilename, '.') + 1));

            if ($fileType == 'png') {
                header('Content-type: image/png');
                $source = imagecreatefrompng($rotateFilename);
                $bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
                // Rotate
                $rotate = imagerotate($source, $degrees, $bgColor);
                imagesavealpha($rotate, true);
                imagepng($rotate, $rotateFilename);
            }

            if ($fileType == 'jpg' || $fileType == 'jpeg') {
                header('Content-type: image/jpeg');
                $source = imagecreatefromjpeg($rotateFilename);
                // Rotate
                $rotate = imagerotate($source, $degrees, 0);
                imagejpeg($rotate, $rotateFilename);
            }

            // Free the memory
            imagedestroy($source);
            imagedestroy($rotate);
            header("location: images_management.php");
            die;
        }

        if ($_GET['option'] == "remove") {
            unlink($path);

            header("location: images_management.php");
            die;
        }
        if ($_GET['option'] == "imgdelete") {
            unlink($path);

            header("location: contents_management.php");
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
echo "<thead><tr><th><small>View</small></th>";
echo "<th><small>Name</small></th>";
echo "<th><small>Size</small></th>";
//echo "<th><small>Permissions</small></th>";
echo "<th><small>Options</small></th>";
echo "<th></th></tr></thead><tbody>";

foreach ($scan as $dir) {
    if (!is_dir($path . '/' . $dir) || $dir == '.' || $dir == '..') continue;

    echo "<tr>";
    echo "<td></td>";
    echo "<td>" . $dir . "</td>";
    echo "<td>[+]</td>";
    //echo "<td>" . perms($path.'/'.$dir) . "</td>";
    echo "<td>" . "</td>";
    echo "<td></td>";
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
    echo "<tr id='" . $file . "'>";
    echo "<td style='max-width:290px'><img style='width:100%' src='" . $path . "/" . $file . "' alt='" . $file . "'></td>";
    echo "<td><small>" . $file . "</small></td>";
    echo "<td><small>" . $size . "</small></td>";
    //echo "<td><small>" . perms($path.'/'.$file) . "</small></td>";
    echo "<td><small>" . "<a href='" . $_SERVER['PHP_SELF'] . "?path=" . $path . '/' . $file . "&option=rotate" . "'>Rotate</a>" . " / " . "<a href='download.php?path=" . $path . "/" . $file . "'>Download</a>" . " / " . "<a href='" . $_SERVER['PHP_SELF'] . "?path=" . $path . "/" . $file . "&option=rename" . "'>Rename</a>" . " / " . "<a onclick='return confirm(\"DELETE FILE?\");' href='" . $_SERVER['PHP_SELF'] . "?path=" . $path . '/' . $file . "&option=remove" . "'>Delete</a>" . "</small></td>";
    echo "<td style='background-color:lightgray' class='top'><a href='#top'>&#8593;</a><br><a href='#bottom'>&#8595;</a></td>";
    echo "</tr>";
}
?>

</tbody>
</table>
<a id="bottom">&nbsp;</a>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>