<?php
    require '3-protect.php';
    define('config', true);
    require_once __DIR__.'/../../CMStra_db/config.php';
    copy(__DIR__.'/../../CMStra_db/base/CMStra_SQLite.db', __DIR__.'/../../CMStra_db/base/CMStra_db_backup_'.date("H-i-s-d-m-Y").'.db');
    header("Location: base_management.php");
