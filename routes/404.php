<?php

store_analytic($GLOBALS['ip'], $GLOBALS['user'], $GLOBALS['source'], $_SESSION['token'], $GLOBALS['lang'], "404");

get_view("ui/header.php", ["page" => "Not found", "name" => "404"]);
get_view("pages/404.php");
get_view("ui/footer.php");
 