function addUserFormSubmit() {
    //e.preventDefault();

    let formData = {
        username: $('#username').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
    };
    //console.log(formData);

    // Send POST request to the server
    $.ajax({
        type: "POST",
        url: "https://jsonplaceholder.typicode.com/users",
        data: formData, // Removed unnecessary object wrapping
        success: function (data, status) {
            //console.log(status);
            if (status === "success") {
                alert("User has been added successfully!");
            } else {
                alert("Failed to add user. Please try again.");
            }
        }
    });
}
$(document).ready(function () {
    $('#save').click(addUserFormSubmit);
});

function addMultipleUsers(userArray) {
    userArray.forEach((user) => {
        addUserFormSubmit();
    });
}



$('#save').click(function () {
    //e.preventDefault();
    var userForms = $("#addUserForm");
    var formData = [];

    userForms.each(function (index, form) {
        var username = $(form).find('[id="username"]').val();
        var email = $(form).find('[id="email"]').val();
        var phone = $(form).find('[id="phone"]').val();

        formData.push({ username: username, email: email, phone: phone }); // Fixed the property names
    });
    addMultipleUsers(formData);
});
