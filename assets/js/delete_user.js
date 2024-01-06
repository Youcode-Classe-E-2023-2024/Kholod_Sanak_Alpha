//delete user
$(document).on('click', '.delete-user', function () {
    let userId = $(this).data('user-id');

    $.ajax({
        type: "DELETE",
        url: "https://jsonplaceholder.typicode.com/users/" + userId,
        success: function (data, status) {
            if (status === "success") {
                alert("User" + userId + " has been deleted successfully!");
            }
            else{
                alert("Failed to delete user. Please try again.");
            }
        }
    });
});
