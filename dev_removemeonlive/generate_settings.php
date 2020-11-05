<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$live_url = "https://" . $_SERVER['HTTP_HOST'] . "/";

require $root . '/vendor/autoload.php';
require $root . "/private/includes/functions.php";
require $root . "/config/general.php";

use Spatie\ArrayToXml\ArrayToXml;
use \Gumlet\ImageResize;


$icon_list = [["name" => $root . "/public/images/icons/logo.png", "height" => 128, "width" => 128], ["name" => $root . "/public/images/icons/android-icon-192x192.png", "height" => 192, "width" => 192], ["name" => $root . "/public/images/icons/android-icon-144x144.png", "height" => 144, "width" => 144], ["name" => $root . "/public/images/icons/android-icon-36x36.png", "height" => 36, "width" => 36], ["name" => $root . "/public/images/icons/android-icon-48x48.png", "height" => 48, "width" => 48], ["name" => $root . "/public/images/icons/android-icon-72x72.png", "height" => 72, "width" => 72], ["name" => $root . "/public/images/icons/android-icon-96x96.png", "height" => 96, "width" => 96], ["name" => $root . "/public/images/icons/apple-icon-114x114.png", "height" => 114, "width" => 114], ["name" => $root . "/public/images/icons/apple-icon-120x120.png", "height" => 120, "width" => 120], ["name" => $root . "/public/images/icons/apple-icon-144x144.png", "height" => 144, "width" => 144], ["name" => $root . "/public/images/icons/apple-icon-152x152.png", "height" => 152, "width" => 152], ["name" => $root . "/public/images/icons/apple-icon-180x180.png", "height" => 180, "width" => 180], ["name" => $root . "/public/images/icons/apple-icon-57x57.png", "height" => 57, "width" => 57], ["name" => $root . "/public/images/icons/apple-icon-60x60.png", "height" => 60, "width" => 60], ["name" => $root . "/public/images/icons/apple-icon-72x72.png", "height" => 72, "width" => 72], ["name" => $root . "/public/images/icons/apple-icon-76x76.png", "height" => 76, "width" => 76], ["name" => $root . "/public/images/icons/apple-icon-precomposed.png", "height" => 192, "width" => 192], ["name" => $root . "/public/images/icons/apple-icon.png", "height" => 192, "width" => 192], ["name" => $root . "/public/images/icons/favicon-16x16.png", "height" => 16, "width" => 16], ["name" => $root . "/public/images/icons/favicon-32x32.png", "height" => 32, "width" => 32], ["name" => $root . "/public/images/icons/favicon-96x96.png", "height" => 96, "width" => 96], ["name" => $root . "/public/images/icons/favicon.ico", "height" => 16, "width" => 16], ["name" => $root . "/favicon.ico", "height" => 16, "width" => 16], ["name" => $root . "/public/images/icons/ms-icon-144x144.png", "height" => 144, "width" => 144], ["name" => $root . "/public/images/icons/ms-icon-150x150.png", "height" => 150, "width" => 150], ["name" => $root . "/public/images/icons/ms-icon-310x310.png", "height" => 310, "width" => 310], ["name" => $root . "/public/images/icons/ms-icon-70x70.png", "height" => 70, "width" => 70]];

foreach ($icon_list as $icon) {
    $icon_file = new ImageResize("logo.png");
    $icon_file->resizeToWidth($icon['height'], $icon['width']);
    $icon_file->save($icon['name']);
}

$defaults = get_general_settings('en-US');

$manifest = [
    "name" => $defaults['site']['name'],
    "short_name" => $defaults['site']['short_name'],
    "description" => $defaults['site']['description'],
    "start_url" => "https://" . $_SERVER['HTTP_HOST'],
    "icons" => [
        [
            "src" => $live_url . "public/images/icons/logo.png",
            "type" => "image/png",
            "sizes" => "128x128"
        ]
    ],
    "display" => "standalone",
    "background_color" => $defaults['site']['background_color'],
    "theme_color" => $defaults['site']['color'],
    "categories" => $defaults['site']['keywords'],
    "lang" => $defaults['site']['lang_code']
];
$robots = "User-agent: *" . PHP_EOL .
    "Disallow: " . PHP_EOL .
    "Sitemap: " . $live_url . "sitemap.xml";

$project_list = [];
$projects = get_projects();

foreach ($projects as $project) {
    print_r($project);
    $project_list[] = [
        "loc" => $live_url . "project/" . _re(format_permalink($project['name'])),
        "lastmod" => date("c", strtotime($project['last_modified'])),
        "changefreq" => "weekly",
        "priority" => "0.75"
    ];
}

$sitemap = [
    "urlset" => [
        "_attributes" => [
            "xmlns" => "http://www.sitemaps.org/schemas/sitemap/0.9"
        ],
        "url" => [
            [
                "loc" => $live_url,
                "lastmod" => date('c'),
                "changefreq" => "monthly",
                "priority" => "1.00"
            ],
            [
                "loc" => $live_url . "contact",
                "lastmod" => date('c'),
                "changefreq" => "monthly",
                "priority" => "1.00"
            ],
            [
                "loc" => $live_url . "projects",
                "lastmod" => date('c'),
                "changefreq" => "weekly",
                "priority" => "1.00"
            ],
            $project_list
        ]
    ]
];
$browserconfig = [
    "msapplication" => [
        "tile" => [
            "square70x70logo" => $live_url . "public/images/icons/ms-icon-70x70.png",
            "square150x150logo" =>$live_url . "public/images/icons/ms-icon-150x150.png",
            "square310x310logo" => $live_url . "public/images/icons/ms-icon-310x310.png",
            "square144x144logo" => $live_url . "public/images/icons/ms-icon-144x144.png",
            "TileColor" => $defaults['site']['color']
        ]
    ]
];

$gzip = "<ifmodule mod_deflate.c>AddOutputFilterByType DEFLATE text/html AddOutputFilterByType DEFLATE text/css AddOutputFilterByType DEFLATE text/javascript AddOutputFilterByType DEFLATE text/xml AddOutputFilterByType DEFLATE text/plain AddOutputFilterByType DEFLATE image/x-icon AddOutputFilterByType DEFLATE image/svg+xml AddOutputFilterByType DEFLATE image/jpeg AddOutputFilterByType DEFLATE image/png AddOutputFilterByType DEFLATE image/gif AddOutputFilterByType DEFLATE application/json AddOutputFilterByType DEFLATE application/rss+xml AddOutputFilterByType DEFLATE application/javascript AddOutputFilterByType DEFLATE application/x-javascript AddOutputFilterByType DEFLATE application/xml AddOutputFilterByType DEFLATE application/xhtml+xml AddOutputFilterByType DEFLATE application/x-font AddOutputFilterByType DEFLATE application/x-font-truetype AddOutputFilterByType DEFLATE application/x-font-ttf AddOutputFilterByType DEFLATE application/x-font-otf AddOutputFilterByType DEFLATE application/font-woff2 AddOutputFilterByType DEFLATE application/x-font-opentype AddOutputFilterByType DEFLATE application/vnd.ms-fontobject AddOutputFilterByType DEFLATE font/ttf AddOutputFilterByType DEFLATE font/otf AddOutputFilterByType DEFLATE font/opentype # For Olders Browsers Which Can't Handle Compression BrowserMatch ^Mozilla/4 gzip-only-text/html BrowserMatch ^Mozilla/4\.0[678] no-gzip BrowserMatch \bMSIE !no-gzip !gzip-only-text/html</ifmodule><ifmodule mod_gzip.c>mod_gzip_on Yes mod_gzip_dechunk Yes mod_gzip_item_include file \.(html?|txt|css|js|php|pl)$ mod_gzip_item_include mime ^application/x-javascript.* mod_gzip_item_include mime ^text/.* mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.* mod_gzip_item_exclude mime ^image/.* mod_gzip_item_include handler ^cgi-script$</ifmodule>";
$resource_cache = "<filesMatch \".(css|jpg|jpeg|png|gif|js|ico|json|xml|svg|woff|woff2)$\"> Header set Cache-Control \"max-age=3600, public\" </filesMatch>";

if (!$defaults['settings']['enable_gzip']) $gzip = "";
if (!$defaults['settings']['enable_resource_cache']) $resource_cache = "";

$htaccess = "RewriteEngine On RewriteBase / RewriteCond %{REQUEST_FILENAME} !-f RewriteCond %{REQUEST_FILENAME} !-d " . $gzip . " " . $resource_cache . " RewriteRule ^(.+)$ index.php?uri=$1 [QSA,L]";

file_put_contents($root . "/manifest.json", json_encode($manifest));
file_put_contents($root . "/sitemap.xml", ArrayToXml::convert($sitemap)); // Needs routing
file_put_contents($root . "/browserconfig.xml", ArrayToXml::convert($browserconfig, "browserconfig"));
file_put_contents($root . "/robots.txt", $robots);
file_put_contents($root . "/.htaccess", $htaccess);
