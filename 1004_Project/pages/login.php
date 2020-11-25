<?php
//session_start(); // start session
?>

<!DOCTYPE html>
<html lang="en">
<!--HEAD-->
    <?php
    include "../page_incs/head.inc.php";
    ?>
    <body>
<!--    NAV BAR-->
    <?php
        include "../page_incs/nav.inc.php";
        ?>

<!--MEMBER LOGIN FORM-->

        <div class="layout-form">
           <form action="process_login.php" method="post">
                <h2>Member Login</h2>
                <hr>         
                <div class="form-group">
                    <div class="input-group">
                        <input class ="form-control" type="email" id="email" required name="email"    
                   placeholder="Enter email">    
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="password" id="pwd" required name="pwd"    
                   placeholder="Enter password">   
                    </div>     
                </div>
                <div class="form-group">
                    <button type="Login" class="btn btn-primary btn-lg" name="login-submit">Login</button>
                </div>
            </form>
            <div class="text-center"><a href="#" style="color:black">Forgot Password</a></div>
        </div>

        <?php
        include "../page_incs/footer.inc.php";
        ?>
    </body>
</html>