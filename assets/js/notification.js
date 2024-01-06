// document.addEventListener("DOMContentLoaded", () => {
//     const notificationsContainer = document.querySelector('template[x-if="isNotificationsMenuOpen"]');
//     const notificationElement = notificationsContainer.content.querySelector('#notificationContainer');
//
//
//     //console.log(notificationsContainer);
//     //console.log(notificationElement)
// });

// Get the element where you want to display notifications
function displayNotification() {
    $.ajax({
        type: 'post',
        url: 'index.php?page=dashboard',
        data: {
            request: "displayNotification"
        },
        success: (data) => {
            // Assuming the response data is an array of notifications
            const notifications = JSON.parse(data);
            //console.log(notifications)

            // const notificationsContainer  = document.querySelector(".notiff");
            // console.log(notificationsContainer)
            const notificationsContainer = document.querySelector('template[x-if="isNotificationsMenuOpen"]');
            const notificationElement = notificationsContainer.content.querySelector('#notificationContainer');
            // Clear existing notifications
            notificationElement.innerHTML='';

            // Update the UI with the new notifications
            notifications.forEach(notification => {
                const notificationItem = document.createElement('li');
                //console.log(notification.notification)
                notificationItem.textContent = notification.notification;
                //console.log(notificationItem)
                notificationElement.append(notificationItem);
                //console.log(notificationElement)

            });

            //console.log(notifications);
        }
    });
}
displayNotification()