<?php

session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

require $_SERVER['DOCUMENT_ROOT'] . "/private/includes/functions.php";
require get_php_url("config/general.php");
require get_php_url("app/AltoRouter.php");

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);

$config = get_general_settings($lang);
$settings = $config['settings'];

$ip = $_SERVER['REMOTE_ADDR'];
$user = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "Unknown");
$source = (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "Unknown");

if ($settings['enable_php_errors']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
if ($settings['enable_security_headers']) {
    header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
    header("X-XSS-Protection: 1; mode=block");
    header("X-Content-Type-Options: nosniff");
    header("X-Frame-Options: SAMEORIGIN");
    header("Referrer-Policy: strict-origin");
}
if ($settings['enable_force_https']) {
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
        if (!headers_sent()) {
            header("Status: 301 Moved Permanently");
            header(sprintf(
                'Location: https://%s%s',
                $_SERVER['HTTP_HOST'],
                $_SERVER['REQUEST_URI']
            ));
            exit();
        }
    }
}
if (!$settings['enable_www']) {
    if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
        header("HTTP/1.1 301 Moved Permanently");
        header("Status: 301 Moved Permanently");
        header('Location: http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 's' : '') . '://' . substr($_SERVER['HTTP_HOST'], 4) . $_SERVER['REQUEST_URI']);
    }
}

$router = new AltoRouter();

$router->map('GET', '/', get_php_url("routes/front_page.php"), 'home');
$router->map('GET', '/projects', get_php_url("routes/projects.php"), 'projects');
$router->map('GET', '/project/[*:project]', get_php_url("routes/single_project.php"), 'project');
$router->map('GET', '/contact', get_php_url("routes/contact.php"), 'contact');
$router->map('POST', '/contact', get_php_url("routes/handlers/contact_form.php"), 'contactform');
$router->map('GET', '/blog', get_php_url("routes/blog.php"), 'blog');

$match = $router->match();
if ($match) {
    http_response_code(200);
    require $match['target'];
} else {
    header("HTTP/1.0 404 Not Found");
    header("Status: 404 Not Found");
    http_response_code(404);
    require get_php_url("routes/404.php");
}