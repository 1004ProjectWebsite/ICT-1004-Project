<?php

function connect_mysql()
{

//  Nicholas DB connect
//    $con = mysqli_connect("localhost", "root", "E*z?%-iD8#hr", "1004_project");

//  Kah Wei DB connect
    //$con = mysqli_connect("localhost", "root", "kahwei", "1004_project");

    //GC db
    //$con = mysqli_connect("localhost", "root", "password", "1004_project");

//sj db
    $con = mysqli_connect("localhost", "root", "SJTey99607", "1004_proj");

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
//    echo "DB Connected successfully";
}
?>

