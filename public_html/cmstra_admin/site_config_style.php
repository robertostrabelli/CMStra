<?php
require '3-protect.php';
define('cabeca', true);
$PageTitle = "Custom Styles";
require_once __DIR__ . '/header.inc.php';
?>

<h1>Custom Styles</h1>

<p>Here you can put some custom styles. See the default CSS for reference: <a href="../assets/css/mobile.css" target="_blank">CSS</a>.</p>

<?php
// https://stackoverflow.com/questions/8226958/simple-php-editor-of-text-files
// configuration
$url = 'site_config_style.php';
$file = '../assets/css/styles.css';

// check if form has been submitted
if (isset($_POST['text'])) {
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>

<form action="" method="post">
    <textarea rows="20" cols="120" style="width:100%;font-family:monospace;" name="text"><?php echo htmlspecialchars($text) ?></textarea><br><br>
    <button style="font-size: 24px;" type="submit">&#9745; Save Changes</button> <button style="font-size: 24px;" type="reset">&#9746; Delete Changes</button>

</form>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>