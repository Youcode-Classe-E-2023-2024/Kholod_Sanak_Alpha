<?php




if (isset($_POST["products"])) {
    header("Access-Control-Allow-Origin: *");
    $url = "https://jsonplaceholder.typicode.com/posts";
    $data = file_get_contents($url);
    echo $data;
    exit;
}
if (empty($_SESSION['user_id'])) {
    header('location: index.php?page=authentif');
}
