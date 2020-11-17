<?php session_start();
$con = mysqli_connect("localhost", "root", "E*z?%-iD8#hr", "1004_project");
?>

<!doctype html>
<html>

    <head>
        <title>Phone Case Shop</title>
        <?php include "../page_incs/head.inc.php"; ?>
        <?php include "../page_incs/nav.inc.php" ?>
    </head>

    <body>


        <div class="container">
            <div class="row">
                <div class="grid-container">

        <?php
        $query = $con->prepare("SELECT * FROM products");
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_array()) {
        ?>

                        <div class="grid-item">
                            <article>
                                <figure>
                                    <a href="../images/phone_cases_img/<?php echo $row["p_img"]; ?>">
                                        <img src="../images/phone_cases_img/<?php echo $row["p_img"]; ?>" class="phone_image" alt="<?php echo $row["p_name"]; ?> style="width="80px" height="150px""/>
                                    </a>

                                    <h5 class="text-body"><?php echo $row["p_name"]; ?></h5>
                                    <h5 class="text-info"><?php echo "$", $row["p_price"]; ?></h5>

                                    <div class="form-group">
                                        <label for="quantity"></label>
                                        <input class="form-control" type="number" id="quantity" name="quantity"
                                               placeholder="1">
                                    </div>

                                    <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["p_price"]; ?>">
                                    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                                </figure>
                            </article>
                        </div>

        <?php
        }
        $query->close();
        $con->close();
        ?>

                </div>
        </div>
    </div>
</body>

<?php ?>

</html>