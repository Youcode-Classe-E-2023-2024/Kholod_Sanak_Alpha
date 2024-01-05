$(document).ready(function () {
    $('#addUserForm').submit(function (e) {
        e.preventDefault();

        // Collect form data
        let formData = {
            username: $('#username').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
        };

        // Send POST request to the server
        $.ajax({
            type: "POST",
            url: "https://jsonplaceholder.typicode.com/users",
            data: { userData: formData },
            success: function (data,status) {
                if (status=== "success") {
                    alert("User has been added successfully!");
                } else {
                    alert("Failed to add user. Please try again.");
                }
            }
        });
    });
});