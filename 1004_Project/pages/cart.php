<?php
// If the user clicked the add to cart button on the product page we can check for the form data

var_dump($_SESSION);


if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['$product_id'];
    $quantity = (int)$_POST['quantity'];

    // Prepare the SQL statement, we basically are checking if the product exists in our database
    $con = mysqli_connect("localhost", "root", "E*z?%-iD8#hr", "1004_project");


    // Prepare statement and execute, prevents SQL injection
    $stmt = $con->prepare('SELECT * FROM products WHERE product_id = ?');
    $product_id_var = [$_POST['product_id']];
    $stmt->bind_param('i', $product_id_var);
    $stmt->execute();

    // Fetch the product from the database and return the result as an Array
    $result = $stmt->get_result();
    $product = $result->fetch_all(MYSQLI_ASSOC);

    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quantity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }

    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}


// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;

// If there are products in cart
if ($products_in_cart) {

    $con = mysqli_connect("localhost", "root", "E*z?%-iD8#hr", "1004_project");

    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $con->prepare('SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')');


//    Reference Code to convert into mysqli
//    $stmt->execute(array_keys($products_in_cart));
//    $stmt->bind_param("sss", $firstname, $lastname, $email);

//    We only need the array keys, not the values, the keys are the id's of the products


      $types = str_repeat('i', count($products_in_cart));

      $productarraykeys = array_keys($products_in_cart);
      $stmt->bind_param($types, ...$productarraykeys);

      $stmt->execute();

      // Fetch the products from the database and return the result as an Array
      $result = $stmt->get_result();
      $products = $result->fetch_all(MYSQLI_ASSOC);

      // Calculate the subtotal
      foreach ($products as $product) {
          $subtotal += (float)$product['p_price'] * (int)$products_in_cart[$product['product_id']];
      }
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


<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
            <tr>
                <td colspan="2">Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="img">
                            <a href="index.php?page=product&id=<?=$product['product_id']?>">
                                <img src="imgs/<?=$product['p_img']?>" width="50" height="50" alt="<?=$product['p_name']?>">
                            </a>
                        </td>
                        <td>
                            <a href="index.php?page=product&id=<?=$product['product_id']?>"><?=$product['p_name']?></a>
                            <br>
                            <a href="index.php?page=cart&remove=<?=$product['product_id']?>" class="remove">Remove</a>
                        </td>
                        <td class="price">&dollar;<?=$product['p_price']?></td>
                        <td class="quantity">
                            <input type="number" name="quantity-<?=$product['product_id']?>" value="<?=$products_in_cart[$product['product_id']]?>" min="1" max="<?=$product['p_qty']?>" placeholder="Quantity" required>
                        </td>
                        <td class="price">&dollar;<?=$product['p_price'] * $products_in_cart[$product['product_id']]?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
</body>

<?php
include "../page_incs/footer.inc.php";
?>
