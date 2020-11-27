<?php
    unset($_SESSION['shopping_cart']);
?>

<html>
    <head>
        <title>Phone Case Shop</title>
        <?php
            include "../page_incs/head.inc.php";
        ?>
    </head>


    <body>
        <?php
            include "../page_incs/nav.inc.php";
        ?>
        <br/>
        <br/>
        <br/>
        <div class="container">

            <div class="row">
                <div class="column justify-content-center" >

                    <img src="../images/checkout.gif" alt="checkout_success" height="300px" width="400px">

                    <h1>Thank you for your purchase!</h1>
                    <p>We'll email you an order confirmation email with details and tracking info very soon.</p>

                    <br/>
                    <a href="index.php?page=home" id="cart1" class="btn btn-info btn-lg">Back to shop</a>

                </div>
            </div>
        </div>

    </body>
        <br/>
        <?php
            include "../page_incs/footer.inc.php";
        ?>
</html>
