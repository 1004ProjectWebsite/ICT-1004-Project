<?php
session_start();
?>
<html>
     <?php
    include "head.inc.php";
    ?>
<body>
    <?php
    include "nav.inc.php";
    ?>

    <main class="container">
        <h1>Login</h1>
        <p>
            For new members, please go to the
            <a href="register.php">Register page</a>.
        </p>
        <form action="process_login.php" method="post">
            <div class="form-group">
            <div class="form-group">
            <label for="email">Email:</label>      
            <input class ="form-control" type="email" id="email" required name="email"    
                   placeholder="Enter email">        
            </div>     
            <div class="form-group">
            <label for="pwd">Password:</label>        
            <input class="form-control" type="password" id="pwd" required name="pwd"    
                   placeholder="Enter password">        
            </div>    
            <a href="#">Forgot Password<p>
            <div class="form-group">
            <button class="btn btn-primary" type="Login" name="login-submit">Login</button> 
            </div>
        </form>  
    </main>   
    </body>
</html>
