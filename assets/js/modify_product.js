$(document).ready(function () {
    // Extract parameters from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('productId');
    const title = decodeURIComponent(urlParams.get('title'));
    const stock = decodeURIComponent(urlParams.get('stock'));
    const body = decodeURIComponent(urlParams.get('body'));


    $('#title').val(title);
    $('#stock').val(stock);
    $('#body').val(body);

    $('#modifyProductForm').submit(function (e) {
        e.preventDefault();

        // Collect form data
        let formData = {
            title: $('#title').val(),
            stock: $('#stock').val(),
            body: $('#body').val(),
        };

        // Send PUT request to the server
        $.ajax({
            type: "PUT",
            url: "https://jsonplaceholder.typicode.com/posts/" + productId,
            data: formData,
            success: function (data, status) {
                if (status === "success") {
                    alert("Product with Id " + productId +   " has been updated successfully!");
                } else {
                    alert("Failed to update product. Please try again.");
                }
            }
        });
    });
});