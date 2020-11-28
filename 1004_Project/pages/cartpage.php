<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                //echo '<script>alert("Item Updated")</script>';
            }
        }
    }
}
?>
<html lang="en">
    <head>
        <title>Phone Case Shop</title>
        <?php
        include "../page_incs/head.inc.php";
        ?>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <?php
                include "../page_incs/nav.inc.php";
                ?>
            </div>
            <div id="body">
                <div class="container" role="banner" style="text-align: center; margin-top: 5%;">
                    <h3>Order Details</h3>
                </div>
                <main role="main" class="row flex-grow-1 w-100 align-items-center">
                    <div class="col-8 mx-auto">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Item Name</th>
                                    <th width="10%">Quantity</th>
                                    <th width="20%">Price</th>
                                    <th width="15%">Total</th>
                                    <th width="5%">Action</th>
                                </tr>
                                <?php
                                if (!empty($_SESSION["shopping_cart"])) {
                                    $total = 0;
                                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $values["item_name"]; ?>
                                                <br/>
                                                <img src="../phone_cases_img/<?= $values["item_image"] ?>"
                                                     alt="<?= $values["item_image"] ?>" height="200px" width="100px">
                                            </td>
                                            <td><?php echo $values["item_quantity"]; ?></td>
                                            <td>$ <?php echo $values["item_price"]; ?></td>
                                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>

                                            <td>
                                                <a href="cartpage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                                        class="text-danger">Remove</span></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" align="right">Total</td>
                                        <td align="right">$ <?php echo number_format($total, 2); ?></td>

                                    <form method="POST">
                                        <td>
                                            <button type="input" type="submit" name="remove_cart" class="btn btn-danger">Empty Cart
                                            </button>
                                        </td>
                                    </form>

                                    <?php
                                    // Clears shopping cart
                                    if (isset($_POST['remove_cart'])) {
                                        unset($_SESSION['shopping_cart']);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    ?>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <br/>
                        <div class="form-group">
                            <a href="products.php" id="cart1" class="btn btn-info">Back to shop</a>
                            <div class="float-right">
                                <a href="checkout.php" id="cart1" class="btn btn-info">Proceed to Payment</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="footer">
                <?php
                include "../page_incs/footer.inc.php";
                ?>
            </div>
        </div>
    </body>
</html>



