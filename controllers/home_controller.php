<?php


if (isset($_POST["request"]) && $_POST["request"] === "addNotification") {
    $notification = new Notification;
    $notificationDetail = $_POST["notification"];
    $user = $_SESSION["user_id"];
    $notification->addNotification($user, $notificationDetail);
    exit;
}

if (isset($_POST["request"]) && $_POST["request"] === "displayNotification") {
    $notification = new Notification;
    $notificationData = $notification->showNotifications($_SESSION["user_id"]);

    echo json_encode($notificationData);
    exit;
}

if (isset($_POST["request"]) && $_POST["request"] === "notificationSeen") {
    $notification = new Notification;
    $notificationId = $_POST["notificationId"];
    $notification->notificationSeen($notificationId);

    echo "nadiii";
    exit;
}


if (empty($_SESSION['user_id'])) {
    header('location: index.php?page=authentif');
}