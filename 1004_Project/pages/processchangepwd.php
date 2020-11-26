<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$message="";
     include "../page_incs/db_onetimelogin.php";
     $id = $_SESSION['id'];
 
    // This will be called once form is submitted
    if (isset($_POST["change_password"]))
    {
        // Get all input fields
        $current_password = $_POST["current_password"];
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm_password"];
 
        // Check if current password is correct
        $sql = "SELECT * FROM member WHERE member_id = '" . $id . "'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_object($result);
         
        if (password_verify($current_password, $row->password))
        {
            // Check if password is same
            if ($new_password == $confirm_password)
            {
                // Change password
                $sql = "UPDATE member SET password = '" . password_hash($new_password, PASSWORD_DEFAULT) . "' WHERE member_id = '" . $id . "'";
                mysqli_query($con, $sql);
 
                $message = "Password has been changed";
            }
            else
            {
                $message= "Password does not match.";
            }
        }
        else
        {
            $message= "Password is not correct";
        }
    }
?>
<html>
    <head>
<?php
include "../page_incs/head.inc.php";
?>
    </head>
    ?>

    <body>
         <?php
        include "../page_incs/nav.inc.php";
        ?>  
        <main>
        <div class="container">     
        <?php 
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo $message;
        echo "<br>";
        echo "<a class=\"btn btn-success\" href=index.php?page=changepwd>Return to Account</a>";
        ?>
        </div>
            </main>
        </body>
<?php
include "../page_incs/footer.inc.php";
?>
</html>
