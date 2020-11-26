<?php

    include "../page_incs/head.inc.php";
?>

    <body>
        <?php
            include "../page_incs/nav.inc.php";
        ?>


        <main role="main" class="row flex-grow-1 w-100 align-items-center">
            <div class="mx-auto">
                <div class="layout-form">
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
                    <div class="text-center my-2">Already have an account? <a href="index.php?page=login" style="color:black">Login here</a></div>
                </div>
            </div>
        </main>
    </body>

<?php
include "../page_incs/footer.inc.php";
?>

</html>
