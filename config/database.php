<?php
// Create connection
global $con;
$con = mysqli_connect("localhost", "root", "");
if (!$con) {
    die("database connect problem");
}
$db_use = mysqli_select_db($con, "spkdt") or die("selet db problem !!");
?>