<!doctype html>
<html>
    <head>
        <title>Phone Case Shop</title>
        <?php include "head.inc.php"; ?>
        <style>
            .divCase img {
                height: 400px;
            }

            .divCase, h5 {
                text-align: center;
            }

            p {
                text-align: justify;
                text-justify: inter-word;
            }
            
            .qty {
                width: 100px!important;
            }
        </style>
    </head>

    <body>
        <?php
        include "nav.inc.php";
        ?>
        <?php
        // create database connection
        $db = mysqli_connect("localhost", "root", "SJTey99607", "1004_proj");
        $result = mysqli_query($db, 'SELECT * FROM products WHERE p_type = "samsung"');
        $p_img = array();
        $p_name = array();
        $p_desc = array();
        $p_price = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $p_img[] = $row['p_img'];
            $p_name[] = $row['p_name'];
            $p_desc[] = $row['p_desc'];
            $p_price[] = $row['p_price'];
        }

        $count = count($p_img);
        ?>
        <div class="container">
            <div class="row">
                <?php for ($i = 0; $i < $count;) { ?>
                    <div class="col-md-4">
                        <p class="divCase"><?php
                    echo "<img src='phone_cases_img/" . $p_img[$i] . "'>";
                    echo "<h5>" . $p_name[$i] . "</h5>";
                    //echo "<p>" . $p_desc[$i] . "</p>";
                    echo "<h5>$" . $p_price[$i] . "</h5>";
                    echo '<input class="qty" type="text" name="quantity" class="form-control" value="1"><br>';
                    echo '<input type="submit" name="add" class="btn btn-success" value="Add to Cart">';
                    $i++;
                    ?></p>
                        <HR SIZE="3"> 
                    </div>
                    <div class="col-md-4">
                        <p class="divCase"><?php
                        echo "<img src='phone_cases_img/" . $p_img[$i] . "'>";
                        echo "<h5>" . $p_name[$i] . "</h5>";
                        //echo "<p>" . $p_desc[$i] . "</p>";
                        echo "<h5>$" . $p_price[$i] . "</h5>";
                        echo '<input class="qty" type="text" name="quantity" class="form-control" value="1"><br>';
                        echo '<input type="submit" name="add" class="btn btn-success" value="Add to Cart">';
                        $i++;
                    ?></p>
                        <HR SIZE="3"> 
                    </div>
                    <div class="col-md-4">
                        <p class="divCase"><?php
                        echo "<img src='phone_cases_img/" . $p_img[$i] . "'>";
                        echo "<h5>" . $p_name[$i] . "</h5>";
                        //echo "<p>" . $p_de<input type="hidden" sc[$i] . "</p>";
                        echo "<h5>$" . $p_price[$i] . "</h5>";
                        echo '<input class="qty" type="text" name="quantity" class="form-control" value="1"><br>';
                        echo '<input type="submit" name="add" class="btn btn-success" value="Add to Cart">';
                        $i++;
                    ?></p>
                        <HR SIZE="3"> 
                    </div>
                    <div class="col-md-4">
                        <p class="divCase"><?php
                        echo "<img src='phone_cases_img/" . $p_img[$i] . "'>";
                        echo "<h5>" . $p_name[$i] . "</h5>";
                        //echo "<p>" . $p_de<input type="hidden" sc[$i] . "</p>";
                        echo "<h5>$" . $p_price[$i] . "</h5>";
                        echo '<input class="qty" type="text" name="quantity" class="form-control" value="1"><br>';
                        echo '<input type="submit" name="add" class="btn btn-success" value="Add to Cart">';
                        $i++;
                    ?></p>
                        <HR SIZE="3"> 
                    </div>
                    <div class="col-md-4">
                        <p class="divCase"><?php
                        echo "<img src='phone_cases_img/" . $p_img[$i] . "'>";
                        echo "<h5>" . $p_name[$i] . "</h5>";
                        //echo "<p>" . $p_de<input type="hidden" sc[$i] . "</p>";
                        echo "<h5>$" . $p_price[$i] . "</h5>";
                        echo '<input class="qty" type="text" name="quantity" class="form-control" value="1"><br>';
                        echo '<input type="submit" name="add" class="btn btn-success" value="Add to Cart">';
                        $i++;
                    ?></p>
                        <HR SIZE="3"> 
                    </div>
                    <div class="col-md-4">
                        <p class="divCase"><?php
                        echo "<img src='phone_cases_img/" . $p_img[$i] . "'>";
                        echo "<h5>" . $p_name[$i] . "</h5>";
                        //echo "<p>" . $p_de<input type="hidden" sc[$i] . "</p>";
                        echo "<h5>$" . $p_price[$i] . "</h5>";
                        echo '<input class="qty" type="text" name="quantity" class="form-control" value="1"><br>';
                        echo '<input type="submit" name="add" class="btn btn-success" value="Add to Cart">';
                        $i++;
                    ?></p>
                        <HR SIZE="3"> 
                    </div>
                    <?php } ?>
            </div>
        </div>

        <!--        //display image from db to html-->
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo "<div id='img_div'>";
            echo "<img src='phone_cases_img/" . $row['p_img'] . "'>";
            echo "<p>" . $row['p_desc'] . "</p>";
            echo "</div>";
        }
        $db->close();
        ?>
    </body>
    <?php
    include "footer.inc.php";
    ?>
</html>