<?php

store_analytic($GLOBALS['ip'], $GLOBALS['user'], $GLOBALS['source'], $_SESSION['token'], $GLOBALS['lang'], "contact");

get_view("ui/header.php", ["page" => $match['name'], "name" => "contact"]);
get_view("pages/contact.php");
get_view("ui/footer.php");
