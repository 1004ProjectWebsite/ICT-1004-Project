<?php
if (!isset($_SESSION)) {
    session_start();
}

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                    
                }  
           }  
      }  
 }  

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
<h3>Order Details</h3>  
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
                      if(!empty($_SESSION["shopping_cart"]))  
                      {  
                           $total = 0;  
                           foreach($_SESSION["shopping_cart"] as $keys => $values)  
                           {  
                      ?>  
                      <tr>  
                           <td><?php echo $values["item_name"]; ?></td>  
                           <td><input type="number" name="quantity" value="<?php echo $values["item_quantity"]; ?>" min="1" required></td>
                           <td>$ <?php echo $values["item_price"]; ?></td>  
                           <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                           <td>
                               <a href="cartpage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a>
                           </td>  
                      </tr>  
                      <?php  
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                           }  
                      ?>  
                      <tr>  
                           <td colspan="3" align="right">Total</td>  
                           <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                           <td></td>  
                      </tr>  
                      <?php  
                      }  
                      ?>  
                 </table>  
            </div>  
         
       <br />  
       <div class="form-group">
           <style>
               a.btn btn-info
               {
                  float: right;
                  text-align: right;
               }
           </style>
        <a href="checkout.php" id="cart1" style = "text-align: right" class="btn btn-info">Proceed to Payment</a>
<!--                    <button type="submit" class="btn btn-primary btn-lg">Payment</button>-->
        <a href="products.php" id="cart1" class="btn btn-info">Back to shop</a>
     </div>
  </body>  
  <?php
    include "../page_incs/footer.inc.php";
    ?>
 </html>