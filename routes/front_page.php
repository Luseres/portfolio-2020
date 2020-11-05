<?php

store_analytic($GLOBALS['ip'], $GLOBALS['user'], $GLOBALS['source'], $_SESSION['token'], $GLOBALS['lang'], "home");

get_view("ui/header.php", ["page" => $match['name'], "name" => "frontpage"]);
get_view("pages/frontpage.php");
get_view("ui/footer.php");
