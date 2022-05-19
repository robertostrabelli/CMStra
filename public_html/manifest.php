<?php
define('site_config', true);
require_once __DIR__.'/site_config.inc.php';

//https://web.dev/add-manifest/

$manifest = [
    "name" => "$SiteName",    
    "short_name" => "$SiteName",
    "description" => "$Desc",
    "lang" => "$SiteLang",
    "start_url" => "/",
    "display" => "browser",    
    "background_color" => "#f4ecd8",
    "theme_color" => "#347d56",
    "scope" => "/",
    "icons" => [        
    [
        "src" => "icon512.png",
        "sizes"=> "512x512",
        "type" => "image/png",
        "purpose" => "any"
    ],
    [
        "src" => "maskable_icon.png",
        "sizes"=> "512x512",
        "type" => "image/png",
        "purpose" => "maskable"
    ]
    ]
];

header('Content-Type: application/json');
echo json_encode($manifest);
