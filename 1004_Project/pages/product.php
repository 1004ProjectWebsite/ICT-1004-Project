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

     if(isset($_POST['add'])) 
    { 
          print_r($_POST['product_id']); 
          if(isset($_SESSION['cart'])) 
          {
               $item_array_id = array_column($_SESSION['cart'], "product_id");
               print_r($item_array_id);
              //print_r($_SESSION['cart']);
               
               if(in_array($_POST['product_id'],$item_array_id)){
                  echo "<script>alert('Product is already added in the cart..!')</script>";                   
               }else{
                  $count= count($_SESSION['cart']);
                    $item_array = array(
                'product_id' => $_POST['product_id']
        );
                $_SESSION['cart'][$count] = $item_array; 
                print_r($_SESSION['cart']);             
               }
          }
          else
          {
              $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
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
