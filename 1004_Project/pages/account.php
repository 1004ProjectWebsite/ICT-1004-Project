<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

include "../page_incs/db_onetimelogin.php";

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM member where member_id='$id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
?>
<html>
    <head>
        <?php
        include "../page_incs/head.inc.php";
        ?>
    </head>
    <body>
        <?php
        include "../page_incs/nav.inc.php";
        ?>
        <div class="content py-5  bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <span class="anchor" id="formUserEdit"></span>
                        <!-- form user info -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0">User Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="layout-form">

                                    <form action="process_update.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="fname"  placeholder="Enter your First Name" value="<?php echo $row['fname']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="lname"  placeholder="Enter your Last Name" value="<?php echo $row['lname']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control" name="email"  placeholder="Enter your Email" value="<?php echo $row['email']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Contact Number</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="pno"  placeholder="Enter your Contact No" value="<?php echo $row['pno']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="address"  placeholder="Enter your Address" value="<?php echo $row['address']; ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /form user info -->

                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="text-center"><a href="changepwd.php" style="color:black">Change Password</a></div>
        !-->
    </body>
    <?php
    include "../page_incs/footer.inc.php";
    ?>
</html>

