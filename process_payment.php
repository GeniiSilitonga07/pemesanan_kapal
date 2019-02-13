<?php
	include_once('config/database.php');
	$user_id = $_SESSION['user_id'];

	$jumlah = "SELECT data_kapal.idKapal, data_kapal.muatan FROM data_kapal LEFT JOIN tiket ON data_kapal.idKapal = tiket.idKapal LEFT JOIN akun ON tiket.idPengguna = akun.id WHERE tiket.idPengguna = $user_id AND tiket.status = 0";
    $data_pemesanan = mysqli_query($con, $jumlah);
    $muatan = 0;

	if($data_pemesanan){
	$strQ = "UPDATE tiket SET status=1 WHERE idPengguna=$user_id";
	$result = mysqli_query($con, $strQ);

	foreach ($data_pemesanan as $dp) {
	    $muatan = $muatan + $dp['muatan'];
	$muatan = $muatan - 1;
	$update = "UPDATE data_kapal SET muatan=$muatan WHERE idKapal=".$dp['idKapal']."";
	$hasil = mysqli_query($con, $update);
	    }
	    echo '<script language="javascript">alert("Transaksi berhasil.");</script>';
	echo '<script>window.location = "cart.php?&id='.$user_id.'";</script>';
    }
?>