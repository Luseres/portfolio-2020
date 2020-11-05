<?php

store_analytic($GLOBALS['ip'], $GLOBALS['user'], $GLOBALS['source'], $_SESSION['token'], $GLOBALS['lang'], "projects");

get_view("ui/header.php", ["page" => $match['name'], "name" => "projects", "config" => $config]);
get_view("pages/projects.php");
get_view("ui/footer.php");
