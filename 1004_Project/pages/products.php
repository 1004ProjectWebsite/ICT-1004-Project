<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  $con = mysqli_connect("localhost", "root", "kahwei", "1004_project");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
$status = "";

$num_products_on_each_page = 6;

// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

// Select products ordered by the date added
$stmt = $con->prepare("SELECT * FROM products ORDER BY p_date_added DESC LIMIT ?,?");

// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$var1 = (($current_page - 1) * $num_products_on_each_page);

$stmt->bind_param('ii', $var1, $num_products_on_each_page);

$stmt->execute();

// Fetch the products from the database and return the result as an Array
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);
// Get the total number of products
//$total_products = $result->num_rows;
// Get the total number of products
$total_products = $result->num_rows;

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
?>
<html>
    <head>
      <!doctype html>
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

<div class="container">
    <div class="row">
        <h1>&nbsp;Phone Cases and Accessories</h1>
    </div>

    <div class="row">
        <h6>&nbsp;<?=$total_products?> Products</h6>
    </div>

    <body>
      <div class="row">
        <div class="grid-container">

            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
                <?php
            }
      

           foreach ($products as $product): ?>          
          
                <div class="grid-item">
                    <article>
                        <figure>
                            <a href="index.php?page=product&id=<?=$product['product_id']?>" class="product">
                                <img src="../images/phone_cases_img/<?=$product['p_img']?>" width="80px" height="150px" class="phone_image" alt="<?=$product['p_name']?>">
                            </a>

                            <h5 class="text-body"><?=$product['p_name']?></h5>
                            <h5 class="text-info">&dollar;<?=$product['p_price']?></h5>

                            <form action="index.php?page=products" method="post">
                                <div class="form-group">
                                    <label for="quantity"></label>
                                    <input class="form-control" type="number" id="quantity" name="quantity"
                                           value="1" min="1" max="<?=$product['p_qty']?>" placeholder="Quantity" required>
                                </div>

                                <input type="hidden" name="product_id" value="<?=$product['product_id']?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                            </form>

                        </figure>
                    </article>
                </div>
            
        <?php
           
            endforeach;
            ?>

            <div style="clear:both;"></div>

            <div class="message_box" style="margin:10px 0px;">
                <?php echo $status; ?>
            </div>
        </div>
    </body>
    <?php
        include "../page_incs/footer.inc.php";
    ?>

</html>