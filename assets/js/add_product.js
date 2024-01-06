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
                addToNotification("Product Added Successfully: Your Newest Addition is Now Live!");

                alert("Product has been added successfully!");
            } else {
                alert("Failed to add product. Please try again.");
            }
        }
    });
}
displayNotification();


function addToNotification(notification) {
    $.ajax({
        type: "POST",
        url: "index.php?page=dashboard",
        data: {
            request: "addNotification",
            notification,
        },
        success: (data) => {
            console.log(data);
        }
    })
}
function displayNotification() {
    $.ajax({
        type: 'post',
        url: 'index.php?page=dashboard',
        data: {
            request: "displayNotification"
        },
        success: (data) => {
            console.log(data);
        }
    })
}





$(document).ready(function () {
    $('#save').click(addProductFormSubmit);

});

