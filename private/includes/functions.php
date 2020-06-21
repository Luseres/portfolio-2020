<?php

function _e($value)
{
    echo htmlspecialchars($value);
}
function debug($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
function get_php_url($url)
{
    return $_SERVER['DOCUMENT_ROOT'] . "/" .  $url;
}
