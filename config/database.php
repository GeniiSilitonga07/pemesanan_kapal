<?php
// Create connection
global $con;
$con = mysqli_connect("localhost", "root", "");
if (!$con) {
    die("database connection problem");
}
$db_use = mysqli_select_db($con, "les_private") or die("DB PROBLEM !!");
?>