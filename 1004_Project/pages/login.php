<?php
//session_start(); // start session
?>
<html>
    <?php
    include "../page_incs/head.inc.php";
    ?>
    <body>

        <?php
        include "../page_incs/nav.inc.php";
        ?>

    <body>
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
    </body>

        <?php
        include "../page_incs/footer.inc.php";
        ?>
</html>