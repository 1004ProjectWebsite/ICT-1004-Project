<html>
    <?php
    include "head.inc.php";
    ?>
    <body>
        <?php
        include "nav.inc.php";
        ?>
    <body>
        <div class="signup-form">
            <form action="process_register.php" method="post">
                <h2>Sign Up</h2>
                <p>Please fill in this form to create an account!</p>
                <hr>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" id="fname" 
                               maxlength="45" name="fname" placeholder="Enter first name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" id="lname" 
                               required maxlength="45" name="lname"   
                               placeholder="Enter last name">    
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                        <input class ="form-control" type="email" id="email" required name="email"    
                               placeholder="Enter email">    
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" type="password" id="pwd" required name="pwd"    
                               placeholder="Enter password" minlength="6"> 

                    </div>
                    <p class="help-block"> Password should be at least 6 characters</p>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
                        <input class="form-control" type="password" id="pwd_confirm" required name="pwd_confirm"     
                               placeholder="Confirm password">  
                    </div>
                </div>
                <div class="form-group">
                    <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                </div>
            </form>
            <div class="text-center">Already have an account? <a href="login.php" style="color:black">Login here</a></div>
        </div>
    </body>
</html>