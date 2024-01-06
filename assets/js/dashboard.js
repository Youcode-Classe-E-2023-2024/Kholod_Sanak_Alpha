
function addToNotification(notification) {
    $.ajax({
        type: "POST",
        url: "index.php?page=home",
        data: {
            request: "addNotification",
            notification
        },
        success: (data) => {
           console.log(data);

        }
    })
}


function displayNotification() {
    $.ajax({
        type: 'post',
        url: 'index.php?page=home',
        data: {
            request: "displayNotification"
        },
        success: (data) => {
            console.log(data);
        }
    })
}

displayNotification();

function notificationHasBeenSeen(notificationId) {
    $.ajax({
        type: "post",
        url: "index.php?page=dashboard",
        data: {
            request: "notificationSeen",
            notificationId
        },
        success: (data) => {
            console.log(data);
        }
    })
}

notificationHasBeenSeen(1)