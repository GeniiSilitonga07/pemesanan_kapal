<?php
    include_once('config/database.php');

    $user_id = $_GET['user_id'];
    $idKapal = $_GET['idKapal'];
        
    $strQ = "INSERT INTO tiket (idKapal, idPengguna) VALUES ($idKapal, $user_id)";
    $reserv = mysqli_query($con, $strQ);

    if($reserv){
        echo '<script language="javascript">alert("Tiket sudah dipesan.");</script>';
        echo '<script>window.location = "cart.php?&id='.$user_id.'";</script>';
    }
?>