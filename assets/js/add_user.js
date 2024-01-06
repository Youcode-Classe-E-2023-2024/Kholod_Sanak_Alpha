function addUserFormSubmit(formData) {
    $.ajax({
        type: "POST",
        url: "https://jsonplaceholder.typicode.com/users",
        data: formData,
        success: function (data, status) {
            console.log(status);
            console.log(data)
            if (status === "success") {
                //alert("User has been added successfully!");
            } else {
                alert("Failed to add user. Please try again.");
            }
        }
    });
}

function addMultipleUsers(userArray) {
    userArray.forEach((user) => {
        addUserFormSubmit(user);
    });
}

$(document).ready(function () {
    $('#save').click(function (e) {
        e.preventDefault();
        var userForms = $("#userForms");
        var formData = [];

        userForms.find(".addUserForm").each(function (index, form) {
            var username = $(form).find('[id="username"]').val();
            var email = $(form).find('[id="email"]').val();
            var phone = $(form).find('[id="phone"]').val();

            formData.push({ username: username, email: email, phone: phone });
        });
        addMultipleUsers(formData);
    });
});
