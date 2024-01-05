$(document).ready(function () {
    // Extract parameters from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('userId');
    const username = decodeURIComponent(urlParams.get('username'));
    const email = decodeURIComponent(urlParams.get('email'));
    const phone = decodeURIComponent(urlParams.get('phone'));

    $('#username').val(username);
    $('#email').val(email);
    $('#phone').val(phone);

    $('#modifyUserForm').submit(function (e) {
        e.preventDefault();

        // Collect form data
        let formData = {
            username: $('#username').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
        };

        // Send PUT request to the server
        $.ajax({
            type: "PUT",
            url: "https://jsonplaceholder.typicode.com/users/" + userId,
            data: formData,
            success: function (data, status) {
                if (status === "success") {
                    alert("User with userId " + userId +   " has been updated successfully!");
                } else {
                    alert("Failed to update user. Please try again.");
                }
            }
        });
    });
});