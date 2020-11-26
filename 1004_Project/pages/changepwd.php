<?php
if (!isset($_SESSION)) {
    session_start();
}
$message = "";
include "../page_incs/db_onetimelogin.php";
$id = $_SESSION['id'];
?>

<head>
    <title>Phone Case Shop</title>
<?php
include "../page_incs/head.inc.php";
?>
</head>
<body>
<?php
include "../page_incs/nav.inc.php";
?>  
    <div class="container-fluid h-100 d-flex flex-column p-0">
        <main role="main" class="row flex-grow-1 w-100 align-items-center">
            <div class="mx-auto">
                <div class="layout-form">

                    <form method="post" action="index.php?page=processchangepwd">
                         <h3 class="mb-0">Change Password</h3>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Current password</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" required name="current_password"  placeholder="Current password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">New password</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" required name="new_password"  placeholder="New password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password </label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" required name="confirm_password"  placeholder="Confirm password">
                            </div>
                        </div>
                        <button type="submit" name="change_password" class="btn btn-primary btn-lg">Change password</button>                      
                    </form>
                </div>
            </div>
    </div>