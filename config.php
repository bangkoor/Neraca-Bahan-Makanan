<?php
session_start();
//koneksi ke database 
$user_name = "root";
$password = "";
$database = "nbm";
$host_name = "localhost"; 
 
$link=mysqli_connect($host_name, $user_name, $password, $database);
?>