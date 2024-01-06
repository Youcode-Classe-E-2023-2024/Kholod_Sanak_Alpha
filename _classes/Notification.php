<?php
class Notification {
    function addNotification($user_id, $notification) {
        global $db;
        $sql = "INSERT INTO Notification (creator_id, notification) VALUES (?, ?)";

        $stmt = $db->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("is", $user_id, $notification);
            $stmt->execute();
            $stmt->close();
            echo "Notification added successfully!";
        } else {
            echo "Unable to prepare statement. Error: " . $db->error;
        }
    }

    function showNotificationsNotSeen($user_id) {
        global $db;
        $sql = "SELECT * FROM Notification WHERE user_id=? AND seen=0 ORDER BY notification_id DESC LIMIT 10";
        $stmt = mysqli_stmt_init($db);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        $data= [];
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }

    function showNotifications($user_id) {
        global $db;
        $sql = "SELECT * FROM notification WHERE creator_id=? ORDER BY id_notif DESC LIMIT 10";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $res = $stmt->get_result();

        $data = [];
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function notificationSeen($notification_id) {
        global $db;
        $sql = "UPDATE notification SET seen=1 WHERE notification_id=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
    }

}