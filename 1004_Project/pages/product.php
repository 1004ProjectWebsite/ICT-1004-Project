<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//$con = mysqli_connect("localhost", "root", "E*z?%-iD8#hr", "1004_project");
 $con = mysqli_connect("localhost", "root", "kahwei", "1004_project");

// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {

    // Prepare statement and execute, prevents SQL injection
    $stmt = $con->prepare('SELECT * FROM products WHERE product_id = ?');
    $url_id = $_GET['id'];
    $stmt->bind_param('i',$url_id );
    $stmt->execute();

    // Fetch the product from the database and return the result as an Array
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);

    // Check if the product exists (array is not empty)
    if (!$products) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }

} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}

if (isset($_POST['product_id']) && $_POST['product_id'] != "") {
    $product_id = $_POST['product_id'];
    $result = mysqli_query($con, "SELECT * FROM `products` WHERE `product_id`='$product_id'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['p_name'];
    $product_id = $row['product_id'];
    $price = $row['p_price'];
    $image = $row['p_img'];

    $cartArray = array(
        $product_id => array(
            'p_name' => $name,
            'product_id' => $product_id,
            'p_price' => $price,
            'quantity' => 1,
            'p_img' => $image)
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($product_id, $array_keys)) {
            $status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
        } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
            $status = "<div class='box'>Product is added to your cart!</div>";
        }
    }        
}
 if (!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        
            }
?>



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



        <div class="container">
            <div class="row">

                <?php foreach ($products as $product): ?>
                <div class="col">
                    <img src="../images/phone_cases_img/<?=$product['p_img']?>" width="" height="" class="phone_image" alt="<?=$product['p_name']?>">
                </div>

                <div class="col">
                    <article>
                        <figure>
                            <h5 class="text-body"><?=$product['p_name']?></h5>
                            <h5 class="text-info">&dollar;<?=$product['p_price']?></h5>

                            <form method="post" action="product.php?action=add&id=<?php echo $product["product_id"]; ?>">
                                <div class="form-group">
                                    <label for="quantity"></label>
                                    <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="<?=$product['p_qty']?>"
                                           placeholder="1">
                                </div>

                                <input type="hidden" name="product_id" value="<?=$product['product_id']?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                            </form>

                            <p>
                                <br/>
                                <h4>Product Description</h4>
                                <?=$product['p_desc']?>
                            </p>
                        </figure>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>


    </body>

    <?php
        include "../page_incs/footer.inc.php";
    ?>
