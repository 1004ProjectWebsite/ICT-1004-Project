<?php session_start();
$con = mysqli_connect("localhost", "root", "kahwei", "1004_project");
?>
<!doctype html>
<html>
    <head>
        <title>Phone Case Shop</title>
        <?php
        include "head.inc.php";
        ?>
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
        <!-- testing for scrolling -->
        <p>Scroll Up and Down.</p> 
        <?php
        $query = $con->prepare("SELECT * FROM products");
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_array()) {
            ?>  
            <div class="container">
                <div class="col-sm-3">                
                    <?php
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['p_img']) . '"/>'; //Load image from database
                    ?>    
                    <h5 class="text-body"><?php echo $row["p_name"]; ?></h5>
                    <h5 class="text-info"><?php echo "$", $row["p_price"]; ?></h5>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["p_price"]; ?>">
                    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                </div>
            </div>
            <?php
        }
        $query->close();
        $con->close();
        ?>
    </div>
</body>
<?php
include "footer.inc.php";
?>
</html>