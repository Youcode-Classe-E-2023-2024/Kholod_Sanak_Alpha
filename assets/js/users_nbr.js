$(document).ready(function () {
    // Fetch posts and update the content of the div
    const usersNumberElement = $('#users_number');

    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/users',
        dataType: 'json',
        success: function (data) {
            //console.log(data)
            usersNumberElement.text(data.length);
        },
        error: function (error) {
           // console.error('Error fetching posts:', error);
            usersNumberElement.text('Error loading users');
        }
    });
});
