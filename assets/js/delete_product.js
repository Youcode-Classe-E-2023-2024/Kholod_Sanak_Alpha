//delete user
$(document).on('click', '.delete_product', function () {
    let productId = $(this).data('product-id');

    $.ajax({
        type: "DELETE",
        url: "https://jsonplaceholder.typicode.com/posts/" + productId,
        success: function (data, status) {
            if (status === "success") {
                alert("product has been deleted successfully!");
            }
            else{
                alert("Failed to delete product. Please try again.");
            }
        }
    });
});
