$(document).ready(function () {
    // Fetch posts and update the content of the div
    const postsNumberElement = $('#posts_number');

    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/posts',
        dataType: 'json',
        success: function (data) {
            //console.log(data)
            postsNumberElement.text(data.length);
        },
        error: function (error) {
            //console.error('Error fetching posts:', error);
            postsNumberElement.text('Error loading posts');
        }
    });
});