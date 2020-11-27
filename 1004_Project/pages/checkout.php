<?php
session_start();
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                //echo '<script>alert("Item Updated")</script>';

            }
        }
    }
}
?>


<html>
    <head>
    <title>Phone Case Shop</title>
    <link rel='stylesheet' href='../css/checkoutcss.css' type='text/css' media='all' />
    <?php
        include "../page_incs/head.inc.php";
    ?>
        </head>

        <body class="bg-light">

        <?php
            include "../page_incs/nav.inc.php";


        ?>

            <br/>
        <div class="container">

            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="../images/phonix_logo_black.png" alt="phonix_logo" width="125" height="125">
                <h2>Phonix Checkout</h2>
            </div>


<!--            User's checkout Cart -->
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                            ?>
                            <span class="badge badge-secondary badge-pill"><?php echo $cart_count; ?></span>
                            <?php
                        }
                        ?>
                    </h4>

                    <?php
                        if(!empty($_SESSION["shopping_cart"]))
                            {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                    ?>

                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">

                            <div>
                                <img src="../phone_cases_img/<?=$values["item_image"]?>" alt="<?=$values["item_image"]?>" height="100px" width="50px">
                            </div>

                            <div>
                                <h6 class="my-0"><?php echo $values["item_name"]; ?></h6>
                                <small class="text-muted">Quantity: <?php echo $values["item_quantity"]; ?></small>
                            </div>
                            <span class="text-muted">$<?php echo $values["item_price"]; ?></span>
                        </li>

                        <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                        ?>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (SGD)</span>
                            <strong>$<?php echo number_format($total, 2); ?></strong>
                        </li>
                    </ul>
<!--                Checkout form-->
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" action="process_checkout.php" method="post" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>                              
                                <input type="text" class="form-control" id="fname"name="fname">                          
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number">Contact Number <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" name="pno" id="phone_number" placeholder="Mobile number">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" name="country" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>Singapore</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" name="state" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>Singapore</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>

                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg" type="submit">Checkout</button>
                        &nbsp;
                        <a class="btn btn-warning btn-lg" type="submit" href="index.php?page=cartpage">Back to cart</a>

                    </form>
                </div>
            </div>
        </div>
    </body>

    <?php
    }
    ?>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <?php
        include "../page_incs/footer.inc.php";
    ?>
</html>