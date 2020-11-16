<?php
session_start();
$mysqli = new mysqli("localhost", "root", "kahwei", "1004_project");
$id=$_SESSION['id'];
$query=mysqli_query($mysqli,"SELECT * FROM member where member_id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
<html>
    <head>
<?php
include "head.inc.php";
?>
    </head>
    <body>
        <?php
        include "nav.inc.php";
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
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $row['fname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="<?php echo $row['lname']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="button" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
	</div>
</div>
</div>
 </body>
<?php
include "footer.inc.php";
?>
</html>