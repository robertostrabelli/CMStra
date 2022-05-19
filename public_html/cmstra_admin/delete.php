<?php
    require '3-protect.php';
    define('config', true);
    require_once __DIR__.'/../../CMStra_db/config.php';

    try {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM contents WHERE id=?";
        $result = $db->prepare($sql);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    } catch (Exception $e) {
        echo "Unable to get records. <br>";
        echo "Error: ".$e->getMessage()."<br>";
        exit;
    }

    header("Location: contents_management.php");
