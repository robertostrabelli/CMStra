<?php
require '3-protect.php';
define('config', true);
require_once __DIR__ . '/../../CMStra_db/config.php';

try {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM site_config WHERE site_id=?";
    $result = $db->prepare($sql);
    $result->bindValue(1, $id, PDO::PARAM_INT);
    $result->execute();
} catch (Exception $e) {
    $message = "<br><h2 style='color:red;'>Error: " . $e->getMessage() . "</h2>";
    exit;
}
while ($res = $result->fetch(PDO::FETCH_BOTH)) {
    $site_id = $res['site_id'];
    $site_name = $res['site_name'];
    $site_description = $res['site_description'];
    $site_keys = $res['site_keys'];
    $site_author = $res['site_author'];
    $site_meta_copyright = $res['site_meta_copyright'];
    $site_url_global = $res['site_url_global'];
    $site_url_home = $res['site_url_home'];
    $site_header_img = $res['site_header_img'];
    $site_header_code = $res['site_header_code'];
    $site_body_code = $res['site_body_code'];
    $site_content_code = $res['site_content_code'];
    $site_footer_code = $res['site_footer_code'];
    $site_footer_copyright = $res['site_footer_copyright'];
    $site_lang = $res['site_lang'];
    $site_search_label = $res['site_search_label'];
    $site_offline_content_msg = $res['site_offline_content_msg'];
    $site_see_all_contents = $res['site_see_all_contents'];
    $site_title_index_page = $res['site_title_index_page'];
    $site_title_bytag_page = $res['site_title_bytag_page'];
    $site_title_main_page = $res['site_title_main_page'];
    $site_title_search_page = $res['site_title_search_page'];
    $site_content_created_in = $res['site_content_created_in'];
    $site_content_edited_in = $res['site_content_edited_in'];
    $site_nextpage = $res['site_nextpage'];
    $site_previuspage = $res['site_previuspage'];
    $site_meta_rating = $res['site_meta_rating'];
    $site_spiderbot_index = $res['site_spiderbot_index'];
    $site_spiderbot_follow = $res['site_spiderbot_follow'];
    $site_spiderbot_imageindex = $res['site_spiderbot_imageindex'];
    $site_spiderbot_archive = $res['site_spiderbot_archive'];
    $site_spiderbot_snippet = $res['site_spiderbot_snippet'];
    $site_spiderbot_cache = $res['site_spiderbot_cache'];
    $site_spiderbot_sitelinkssearchbox = $res['site_spiderbot_sitelinkssearchbox'];
    $site_spiderbot_pagereadaloud = $res['site_spiderbot_pagereadaloud'];
    $site_spiderbot_translate = $res['site_spiderbot_translate'];
    $site_spiderbot_odp = $res['site_spiderbot_odp'];
    $site_spiderbot_ydir = $res['site_spiderbot_ydir'];
    $site_spiderbot_yaca = $res['site_spiderbot_yaca'];
    $site_csp = $res['site_csp'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $site_name = trim(filter_input(INPUT_POST, 'site_name'));
    $site_description = trim(filter_input(INPUT_POST, 'site_description'));
    $site_keys = trim(filter_input(INPUT_POST, 'site_keys'));
    $site_author = trim(filter_input(INPUT_POST, 'site_author'));
    $site_meta_copyright = trim(filter_input(INPUT_POST, 'site_meta_copyright'));
    $site_url_global = trim(filter_input(INPUT_POST, 'site_url_global'));
    $site_url_home = trim(filter_input(INPUT_POST, 'site_url_home'));
    $site_header_img = trim(filter_input(INPUT_POST, 'site_header_img'));
    $site_header_code = trim(filter_input(INPUT_POST, 'site_header_code'));
    $site_body_code = trim(filter_input(INPUT_POST, 'site_body_code'));
    $site_content_code = trim(filter_input(INPUT_POST, 'site_content_code'));
    $site_footer_code = trim(filter_input(INPUT_POST, 'site_footer_code'));
    $site_footer_copyright = trim(filter_input(INPUT_POST, 'site_footer_copyright'));
    $site_lang = trim(filter_input(INPUT_POST, 'site_lang'));
    $site_search_label = trim(filter_input(INPUT_POST, 'site_search_label'));
    $site_offline_content_msg = trim(filter_input(INPUT_POST, 'site_offline_content_msg'));
    $site_see_all_contents = trim(filter_input(INPUT_POST, 'site_see_all_contents'));
    $site_title_index_page = trim(filter_input(INPUT_POST, 'site_title_index_page'));
    $site_title_bytag_page = trim(filter_input(INPUT_POST, 'site_title_bytag_page'));
    $site_title_main_page = trim(filter_input(INPUT_POST, 'site_title_main_page'));
    $site_title_search_page = trim(filter_input(INPUT_POST, 'site_title_search_page'));
    $site_content_created_in = trim(filter_input(INPUT_POST, 'site_content_created_in'));
    $site_content_edited_in = trim(filter_input(INPUT_POST, 'site_content_edited_in'));
    $site_nextpage = trim(filter_input(INPUT_POST, 'site_nextpage'));
    $site_previuspage = trim(filter_input(INPUT_POST, 'site_previuspage'));
    $site_meta_rating = trim(filter_input(INPUT_POST, 'site_meta_rating'));
    $site_spiderbot_index = trim(filter_input(INPUT_POST, 'site_spiderbot_index', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_follow = trim(filter_input(INPUT_POST, 'site_spiderbot_follow', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_imageindex = trim(filter_input(INPUT_POST, 'site_spiderbot_imageindex', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_archive = trim(filter_input(INPUT_POST, 'site_spiderbot_archive', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_snippet = trim(filter_input(INPUT_POST, 'site_spiderbot_snippet', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_cache = trim(filter_input(INPUT_POST, 'site_spiderbot_cache', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_sitelinkssearchbox = trim(filter_input(INPUT_POST, 'site_spiderbot_sitelinkssearchbox', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_pagereadaloud = trim(filter_input(INPUT_POST, 'site_spiderbot_pagereadaloud', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_translate = trim(filter_input(INPUT_POST, 'site_spiderbot_translate', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_odp = trim(filter_input(INPUT_POST, 'site_spiderbot_odp', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_ydir = trim(filter_input(INPUT_POST, 'site_spiderbot_ydir', FILTER_VALIDATE_BOOLEAN));
    $site_spiderbot_yaca = trim(filter_input(INPUT_POST, 'site_spiderbot_yaca', FILTER_VALIDATE_BOOLEAN));
    $site_csp = trim(filter_input(INPUT_POST, 'site_csp'));

    if (empty($site_name)) {
        $message = "<br><h2 style='color:red;'>You need a name!</h2>";
    } else {

        $sql = "UPDATE site_config SET site_name = ?, site_description = ?, site_keys = ?, site_author = ?, site_meta_copyright = ?, site_url_global = ?, site_url_home = ?, site_header_img = ?, site_header_code = ?, site_body_code = ?, site_content_code = ?, site_footer_code = ?, site_footer_copyright = ?, site_lang = ?, site_search_label = ?, site_offline_content_msg = ?, site_see_all_contents = ?, site_title_index_page = ?, site_title_bytag_page = ?, site_title_main_page = ?, site_title_search_page = ?, site_content_created_in = ?, site_content_edited_in = ?, site_nextpage = ?, site_previuspage = ?, site_meta_rating = ?, site_spiderbot_index = ?, site_spiderbot_follow = ?, site_spiderbot_imageindex = ?, site_spiderbot_archive = ?, site_spiderbot_snippet = ?, site_spiderbot_cache = ?, site_spiderbot_sitelinkssearchbox = ?, site_spiderbot_pagereadaloud = ?, site_spiderbot_translate = ?, site_spiderbot_odp = ?, site_spiderbot_ydir = ?, site_spiderbot_yaca = ?, site_csp = ? WHERE site_id = ?";

        try {
            $results = $db->prepare($sql);
            $results->bindValue(1, $site_name, PDO::PARAM_STR);
            $results->bindValue(2, $site_description, PDO::PARAM_STR);
            $results->bindValue(3, $site_keys, PDO::PARAM_STR);
            $results->bindValue(4, $site_author, PDO::PARAM_STR);
            $results->bindValue(5, $site_meta_copyright, PDO::PARAM_STR);
            $results->bindValue(6, $site_url_global, PDO::PARAM_STR);
            $results->bindValue(7, $site_url_home, PDO::PARAM_STR);
            $results->bindValue(8, $site_header_img, PDO::PARAM_STR);
            $results->bindValue(9, $site_header_code, PDO::PARAM_STR);
            $results->bindValue(10, $site_body_code, PDO::PARAM_STR);
            $results->bindValue(11, $site_content_code, PDO::PARAM_STR);
            $results->bindValue(12, $site_footer_code, PDO::PARAM_STR);
            $results->bindValue(13, $site_footer_copyright, PDO::PARAM_STR);
            $results->bindValue(14, $site_lang, PDO::PARAM_STR);
            $results->bindValue(15, $site_search_label, PDO::PARAM_STR);
            $results->bindValue(16, $site_offline_content_msg, PDO::PARAM_STR);
            $results->bindValue(17, $site_see_all_contents, PDO::PARAM_STR);
            $results->bindValue(18, $site_title_index_page, PDO::PARAM_STR);
            $results->bindValue(19, $site_title_bytag_page, PDO::PARAM_STR);
            $results->bindValue(20, $site_title_main_page, PDO::PARAM_STR);
            $results->bindValue(21, $site_title_search_page, PDO::PARAM_STR);
            $results->bindValue(22, $site_content_created_in, PDO::PARAM_STR);
            $results->bindValue(23, $site_content_edited_in, PDO::PARAM_STR);
            $results->bindValue(24, $site_nextpage, PDO::PARAM_STR);
            $results->bindValue(25, $site_previuspage, PDO::PARAM_STR);
            $results->bindValue(26, $site_meta_rating, PDO::PARAM_STR);
            $results->bindValue(27, $site_spiderbot_index, PDO::PARAM_BOOL);
            $results->bindValue(28, $site_spiderbot_follow, PDO::PARAM_BOOL);
            $results->bindValue(29, $site_spiderbot_imageindex, PDO::PARAM_BOOL);
            $results->bindValue(30, $site_spiderbot_archive, PDO::PARAM_BOOL);
            $results->bindValue(31, $site_spiderbot_snippet, PDO::PARAM_BOOL);
            $results->bindValue(32, $site_spiderbot_cache, PDO::PARAM_BOOL);
            $results->bindValue(33, $site_spiderbot_sitelinkssearchbox, PDO::PARAM_BOOL);
            $results->bindValue(34, $site_spiderbot_pagereadaloud, PDO::PARAM_BOOL);
            $results->bindValue(35, $site_spiderbot_translate, PDO::PARAM_BOOL);
            $results->bindValue(36, $site_spiderbot_odp, PDO::PARAM_BOOL);
            $results->bindValue(37, $site_spiderbot_ydir, PDO::PARAM_BOOL);
            $results->bindValue(38, $site_spiderbot_yaca, PDO::PARAM_BOOL);
            $results->bindValue(39, $site_csp, PDO::PARAM_STR);
            $results->bindValue(40, $site_id, PDO::PARAM_INT);
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

$PageTitle = "Site Settings";
require_once __DIR__ . '/header.inc.php';
?>

<?php if (isset($message)) {
    echo "$message";
    header("Refresh:3; url=site_config.php?id=1", true, 303);
} ?>

<?php
//https://stackoverflow.com/questions/4366730/how-do-i-check-if-a-string-contains-a-specific-word

echo "
<form class='settings' method='post'>

<fieldset id='global'>
<legend>Global Settings</legend>
<p>Do not use code, only text.</p>
<p><label for='site_name'>Site name </label><br><input id='site_name' name='site_name' size='46' type='text' value='" . $site_name . "'></p>
<p><label for='site_description'>Short description, optional </label><br><input id='site_description' name='site_description' size='46' type='text' value='" . $site_description . "'></p>
<p><label for='site_keys'>Main key words </label><br><input id='site_keys' name='site_keys' size='46' type='text' value='" . $site_keys . "'></p>
<p><label for='site_author'>Author/Publisher </label><br><input id='site_author' name='site_author' size='46' type='text' value='" . $site_author . "'></p>
<p><label for='site_meta_copyright'>Copyright </label><br><input id='site_meta_copyright' name='site_meta_copyright' size='46' type='text' value='" . $site_meta_copyright . "'></p>
<p><label for='site_url_global'>Site root address (without directory if exist) </label><br><input id='site_url_global' name='site_url_global' size='46' type='text' value='" . $site_url_global . "'></p>
<p><label for='site_url_home'>Full address with directory if exist</label><br><input id='site_url_home' name='site_url_home' size='46' type='text' value='" . $site_url_home . "'></p>
<p><label for='site_lang'>Main language. Find your <a href='https://www.w3schools.com/tags/ref_language_codes.asp' target='_blank'>language code</a> and <a href='https://www.w3schools.com/tags/ref_country_codes.asp' target='_blank'>country code</a>.</label><br><input id='site_lang' name='site_lang' size='5' type='text' value='" . $site_lang . "'></p>
<p><label for='site_meta_rating'>Main rating </label><br><input id='site_meta_rating' name='site_meta_rating' size='10' type='text' value='" . $site_meta_rating . "'></p>
<table>
<tr>
<td>General</td>
<td>Mature</td>
<td>Restricted</td>
</tr>
<tr>
<td>Adult</td>
<td>14 years</td>
<td>Safe for kids</td>
</tr>
</table>

</fieldset>

<fieldset id='custom'>
<legend>Customization</legend>

<p><label for='site_header_img'>Header image - 48 height min. recommended. Upload in <a href='images_management.php'>Images Management</a>. Leave blank for only text name.</label><br><input id='site_header_img' name='site_header_img' size='40' type='text' value='" . $site_header_img . "'></p>
<p><label for='site_header_code'>Custom code inside HTML header tag </label><br>
<textarea rows='8' cols='90' style='width:100%' name='site_header_code' id='site_header_code'>" . $site_header_code . "</textarea></p>

<p><label for='site_body_code'>Custom code inside HTML body tag (just before close tag)</label><br><textarea rows='8' cols='90' style='width:100%' name='site_body_code' id='site_body_code'>" . $site_body_code . "</textarea></p>

<p><label for='site_content_code'>Custom code inside HTML article tag (before content)</label><br><textarea rows='8' cols='90' style='width:100%' name='site_content_code' id='site_content_code'>" . $site_content_code . "</textarea></p>

<p><label for='site_footer_code'>Custom code inside HTML footer tag (just after line)</label><br><textarea rows='8' cols='90' style='width:100%' name='site_footer_code' id='site_footer_code'>" . $site_footer_code . "</textarea></p>

<p><label for='site_footer_copyright'>Footer copyright info </label><br><textarea rows='8' cols='90' style='width:100%' name='site_footer_copyright' id='site_footer_copyright'>" . $site_footer_copyright . "</textarea></p>

</fieldset>

<fieldset id='translate'>
<legend>Translate</legend>
<p>Do not use code, only text.</p>
<p><label for='site_search_label'>Search label - Make a search!</label><br><input id='site_search_label' name='site_search_label' size='40' type='text' value='" . $site_search_label . "'></p>
<p><label for='site_offline_content_msg'>Missing online content message - Nothing to see here!</label><br><input id='site_offline_content_msg' name='site_offline_content_msg' size='40' type='text' value='" . $site_offline_content_msg . "'></p>
<p><label for='site_see_all_contents'>All contents page link - See all contents</label><br><input id='site_see_all_contents' name='site_see_all_contents' size='40' type='text' value='" . $site_see_all_contents . "'></p>
<p><label for='site_title_index_page'>Index page message - Wellcome to my site</label><br><input id='site_title_index_page' name='site_title_index_page' size='40' type='text' value='" . $site_title_index_page . "'></p>
<p><label for='site_title_bytag_page'>Page title contents by tag - Results for</label><br><input id='site_title_bytag_page' name='site_title_bytag_page' size='40' type='text' value='" . $site_title_bytag_page . "'></p>
<p><label for='site_title_main_page'>All contents page title - All contents</label><br><input id='site_title_main_page' name='site_title_main_page' size='40' type='text' value='" . $site_title_main_page . "'></p>
<p><label for='site_title_search_page'>Search results page title - Search results for</label><br><input id='site_title_search_page' name='site_title_search_page' size='40' type='text' value='" . $site_title_search_page . "'></p>
<p><label for='site_content_created_in'>Date info line - Created in</label><br><input id='site_content_created_in' name='site_content_created_in' size='40' type='text' value='" . $site_content_created_in . "'></p>
<p><label for='site_content_edited_in'>Date info line - Edited in</label><br><input id='site_content_edited_in' name='site_content_edited_in' size='40' type='text' value='" . $site_content_edited_in . "'></p>
<p><label for='site_nextpage'>Navigation page link - Next Page</label><br><input id='site_nextpage' name='site_nextpage' size='40' type='text' value='" . $site_nextpage . "'></p>
<p><label for='site_previuspage'>Navigation page link - Previus Page</label><br><input id='site_previuspage' name='site_previuspage' size='40' type='text' value='" . $site_previuspage . "'></p>
</fieldset>

<fieldset id='indexing'>
<legend>General Instructions for Search Engines</legend>
<p>0 for False, 1 for True. This settings can be made in each content as well, so leave default here is a good choice.</p>
<table class='buttons'>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_index' name='site_spiderbot_index' size='1' type='text' value='" . $site_spiderbot_index . "'></td>
    <td><label for='site_spiderbot_index'>Search engines can index pages</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_follow' name='site_spiderbot_follow' size='1' type='text' value='" . $site_spiderbot_follow . "'></td>
    <td><label for='site_spiderbot_follow'>Search engines can follow links in pages</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_imageindex' name='site_spiderbot_imageindex' size='1' type='text' value='" . $site_spiderbot_imageindex . "'></td>
    <td><label for='site_spiderbot_imageindex'>Search engines can index images</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_snippet' name='site_spiderbot_snippet' size='1' type='text' value='" . $site_spiderbot_snippet . "'></td>
    <td><label for='site_spiderbot_snippet'>Search engines can display a text snippet of a video preview in search results</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_archive' name='site_spiderbot_archive' size='1' type='text' value='" . $site_spiderbot_archive . "'></td>
    <td><label for='site_spiderbot_archive'>Search engines can archive this content in search results</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_cache' name='site_spiderbot_cache' size='1' type='text' value='" . $site_spiderbot_cache . "'></td>
    <td><label for='site_spiderbot_cache'>Search engines can cache this content in search results</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_sitelinkssearchbox' name='site_spiderbot_sitelinkssearchbox' size='1' type='text' value='" . $site_spiderbot_sitelinkssearchbox . "'></td>
    <td><label for='site_spiderbot_sitelinkssearchbox'>Allow search boxes in search engine results</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_pagereadaloud' name='site_spiderbot_pagereadaloud' size='1' type='text' value='" . $site_spiderbot_pagereadaloud . "'></td>
    <td><label for='site_spiderbot_pagereadaloud'>Text-to-speech (TTS) services can read aloud this webpages</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_translate' name='site_spiderbot_translate' size='1' type='text' value='" . $site_spiderbot_translate . "'></td>
    <td><label for='site_spiderbot_translate'>Search engines can translate this content in search results</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_odp' name='site_spiderbot_odp' size='1' type='text' value='" . $site_spiderbot_odp . "'></td>
    <td><label for='site_spiderbot_odp'>Search engines can use information from The Open Directory Project in search results</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_ydir' name='site_spiderbot_ydir' size='1' type='text' value='" . $site_spiderbot_ydir . "'></td>
    <td><label for='site_spiderbot_ydir'>Allow Yahoo Directory (why not? :)</label></td>    
</tr>
<tr>
    <td><input pattern='[0-1]{1}' id='site_spiderbot_yaca' name='site_spiderbot_yaca' size='1' type='text' value='" . $site_spiderbot_yaca . "'></td>
    <td><label for='site_spiderbot_yaca'>Search results can snippet from using the page description from the Yandex Directory (lol, I eveen know what is this)</label></td>    
</tr>
</table>
</fieldset>

<fieldset id='csp'>
<legend>Content Security Policy</legend>
<p>How this work? <a href='https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP' target='_blank'>https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP</a></p>
<p>Default recommended: <code>connect-src 'self'; font-src 'self'; frame-src 'self'; object-src 'none'; prefetch-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'</code></p>
<p><label for='site_csp'>CSP Meta tag</label><br><textarea rows='2' cols='90' style='width:100%' name='site_csp' id='site_csp'>" . $site_csp . "</textarea></p>
</fieldset>

<input type='hidden' name='site_id' value='" . $site_id . "'>

<h3><button style='font-size: 24px' type='submit'>Confirm changes</button></h3>
</form>
";
?>

<?php
define('rodape', true);
require_once __DIR__ . '/footer.inc.php';
?>
