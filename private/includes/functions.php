<?php

function _e($value)
{
    echo htmlspecialchars($value);
}
function _re($value)
{
    return htmlspecialchars($value);
}
function debug($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
function format_permalink($value) {
    return strtolower(str_replace(" ", "-", $value));
}
function get_php_url($url)
{
    return $_SERVER['DOCUMENT_ROOT'] . "/" .  $url;
}
function get_view($view, $variables = [])
{
    $config = get_general_settings(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5));
    extract($variables);
    extract(["config" => $config]);
    include $_SERVER['DOCUMENT_ROOT'] . "/resources/views/" . $view;
}
function dbConnect()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/credentials.php";
    $creds = get_credentials();
    $host = $creds['host'];
    $database = $creds['database'];
    $user = $creds['user'];
    $password = $creds['password'];
    try {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $database;
        $connection = new PDO($dsn, $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $connection;
    } catch (\PDOException $e) {
        echo 'There is occured error while connecting to SQL: ' . $e->getMessage();
    }
}
function get_projects()
{
    $projects = [];
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM `projects`");
    $query->execute();
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $projects[] = $results;
    }
    return $projects;
}
function get_activities($project_id)
{
    $activities = [];
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM `project_activities` WHERE `project_id` = ?");
    $query->execute(array($project_id));
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $activities[] = $results;
    }
    return $activities;
}
function get_team($project_id)
{
    $team = [];
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM `project_team` WHERE `project_id` = ?");
    $query->execute(array($project_id));
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $team[] = $results;
    }
    return $team;
}
function get_links($project_id)
{
    $links = [];
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM `project_links` WHERE `project_id` = ?");
    $query->execute(array($project_id));
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
        $links[] = $results;
    }
    return $links;
}
function store_analytic($ip, $user, $source, $token, $language, $page) {
    $db = dbConnect();
    $query = $db->prepare("INSERT INTO `analytics`(`ip_address`, `user_agent`, `source`, `token`, `language`, `page`) VALUES (?,?,?,?,?,?)");
    $query->execute(array($ip, $user, $source, $token, $language, $page));
}