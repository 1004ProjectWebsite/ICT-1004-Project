<?php

//connection details for database

//  KahWei DB connect
//   $servername = "localhost";
//   $username = "root";
//   $password = "kahwei";
//  $dbname = "1004_Project";

//  Nicholas DB connect
//   $servername = "localhost";
//  $username = "root";
//   $password = "E*z?%-iD8#hr";
//  $dbname = "1004_Project";

// Login for database
//Nicholas db connect
//$con = mysqli_connect("localhost", "root", "E*z?%-iD8#hr", "1004_project");

//Kah Wei db connect
//$con = mysqli_connect("localhost", "root", "kahwei", "1004_project");

//sj db
//$con = mysqli_connect("localhost", "root", "SJTey99607", "1004_proj");

//GC LOCAL DB
//$con = mysqli_connect("localhost", "root", "Pear@123", "1004_project");

//GC AWS SERVER DB
//Use this for the server config
$config = parse_ini_file(str_replace("html", "private", $_SERVER['DOCUMENT_ROOT']) . '/db-config.ini');
$con = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);


?>