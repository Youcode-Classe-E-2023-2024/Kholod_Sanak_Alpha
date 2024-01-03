<?php

include_once '_config/config.php';
include_once '_functions/functions.php';
include_once '_config/db.php';

//dd($_SERVER['PHP_SELF']);

spl_autoload_register(function ($class) {
    include_once '_classes/' . $class . '.php';
});

//if (!isset($_SESSION["authentif"])) {
//    // If the session variable is not set, check if the requested page is "authentif"
//    if (isset($_GET['page']) && $_GET['page'] == "authentif") {
//        $page = 'authentif';
//    } else {
//        // If not, set the default page to "home"
//        $page = 'home';
//    }
//} else {
//    // If the session variable is set, set the page to "home"
//    $page = 'home';
//}
//
//// Additional check for a valid page parameter in the URL
//if (isset($_GET['page']) && !empty($_GET['page'])) {
//    $page = trim(strtolower($_GET['page']));
//}



if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

$all_pages = scandir('controllers');

if (in_array($page . '_controller.php', $all_pages)) {
    include_once 'models/' . $page . '_model.php';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/_layout.php';
} else {
    header('Location: 404.html');
}
