<?php
session_start(); // start session
?>
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
            }
         ?>                
    </main>        
</body>

<?php
include "../page_incs/footer.inc.php";
?>