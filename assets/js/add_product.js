function addProductFormSubmit(e) {
    e.preventDefault();

    let formData = {
        title: $('#title').val(),
        stock: $('#id').val(),
        body: $('#bodyl').val(),
    };
    //console.log(formData);

    $.ajax({
        type: "POST",
        url: "https://jsonplaceholder.typicode.com/posts",
        data: formData,
        success: function (data, status) {
            //console.log(status);
            if (status === "success") {
                alert("Product has been added successfully!");
            } else {
                alert("Failed to add product. Please try again.");
            }
        }
    });
}


$(document).ready(function () {
    $('#save').click(addProductFormSubmit);
});
