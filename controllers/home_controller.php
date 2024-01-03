<?php
//
//echo '<h3>- Home Controller -</h3>';
//
//if (isset($_POST['login'])) {
//    echo 'Is login';
//}
//
//if (isset($_POST['logout'])) {
//    echo 'Is logout';
//}


if (isset($_POST["products"])) {
    header("Access-Control-Allow-Origin: *");
    $url = "https://jsonplaceholder.typicode.com/posts";
    $data = file_get_contents($url);
    echo $data;
    exit;
}
