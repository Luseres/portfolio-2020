<?php

store_analytic($GLOBALS['ip'], $GLOBALS['user'], $GLOBALS['source'], $_SESSION['token'], $GLOBALS['lang'], "project");

get_view("ui/header.php", ["page" => $match['params']['project'], "name" => "project", "config" => $config]);
get_view("pages/project.php", ["project" => $match['params']['project']]);
get_view("ui/footer.php");
