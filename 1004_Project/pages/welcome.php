<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<html lang="en">
<head>
    <title>Welcome</title>
    <?php
    include "../page_incs/head.inc.php";
    ?>
</head>

<body>
    <?php
    include "../page_incs/nav.inc.php";
    ?>
    <main class="container">
        <?php
             if (isset($_SESSION['username'])) {
                 $uname = $_SESSION['username'];
                echo "<h3>Your registration is successful!</h3>";
                echo "<h4>Thank you for signing up $uname<h4>";
                echo "<a class=\"btn btn-success\" href=index.php?page=home>Proceed to shop</a>";
            }
         ?>                
    </main>        
</body>

<?php
include "../page_incs/footer.inc.php";
?>