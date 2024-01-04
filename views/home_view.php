<?php
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

    function getProducts() {
        $.ajax({
            type: "POST",
            url: "controllers/home_controller.php",
            data: {products: true},
            success: (data) => {
                console.log(data);
                let products = JSON.parse(data);


            }
        });
    }

    getProducts();
</script>
