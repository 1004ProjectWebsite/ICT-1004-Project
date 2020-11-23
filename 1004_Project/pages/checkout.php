<html>
    <head>
    <title>Phone Case Shop</title>
    <link rel='stylesheet' href='../css/checkoutcss.css' type='text/css' media='all' />
    <?php
        include "../page_incs/head.inc.php";
    ?>
        </head>
    <body>
        <?php
            include "../page_incs/nav.inc.php";
        ?>
       <div id="checkout" class="wrapper">
    <div class="container">
        <form action="">
            <h1>
                <i class="fas fa-shipping-fast"></i>
                Shipping Details
            </h1>
            <div class="name">
                <div>
                    <label for="f-name">First Name</label>
                    <input type="text" name="f-name">
                </div>
                <div>
                    <label for="l-name">Last Name</label>
                    <input type="text" name="l-name">   
                </div>
            </div>
            <div>
            <div class="contact-info">
                <label for="phoneno">Phone Number</label>
                <input type="text" name="phoneno">
            </div>
            <div>
                <label for="email">Email Address</label>
                <input type="text" name="email">
            </div>
            </div>
            <div class="street">
                <label for="name">Address</label>
                <input type="text" name="address">
            </div>
             <div>
                <label for="zip">Postal Code</label>
                <input type="text" name="zip">
            </div>
<!--            <div class="address-info">
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city">
                </div>
                <div>
                    <label for="state">State</label>
                    <input type="text" name="state">
                </div>
               
            </div>-->
            <h1>
                <i class="far fa-credit-card"></i> Payment Information
            </h1>
            <div class="cc-num">
                <label for="card-num">Credit Card No.</label>
                <input type="text" name="card-num">
            </div>
            <div class="cc-info">
                <div>
                    <label for="card-num">Exp</label>
                    <input type="text" name="expire">
                </div>
                <div>
                    <label for="card-num">CVV</label>
                    <input type="text" name="security">
                </div>
            </div>
            <div class="btns">
                <button>Purchase</button>
            </div>
        </form>
             <div class="btns">
                 <a href="cartpage.php"><button>Back to cart</button></a>
<!--                <button href="home.php">Back to cart</button>-->
            </div>
        
    </div>
</div>
    </body>
    <?php
        include "../page_incs/footer.inc.php";
   ?>
</html>


