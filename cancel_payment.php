<?php
	include_once('config/database.php');
	$user_id = $_SESSION['user_id'];
	$strQ = "DELETE FROM tiket WHERE status = 0";
	$result = mysqli_query($con, $strQ);

	if($result){
        echo '<script language="javascript">alert("Transaksi dibatalkan.");</script>';
        echo '<script>window.location = "cart.php?&id='.$user_id.'";</script>';
    }
?>