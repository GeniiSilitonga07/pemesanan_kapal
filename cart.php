<?php
    include_once('config/database.php');

    $user_id = $_SESSION['user_id'];
    $strQ = "SELECT data_kapal.idKapal, data_kapal.namaKapal, harga, tujuanKapal FROM data_kapal LEFT JOIN tiket ON data_kapal.idKapal = tiket.idKapal LEFT JOIN akun ON tiket.idPengguna = akun.id WHERE tiket.idPengguna = $user_id AND tiket.status = 0";
    $data_pemesanan = mysqli_query($con, $strQ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>RPKDT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
            .footer {
                height:35px;
                width: 100%;
                line-height:50px;
                background:#333;
                color:#fff;
                position:absolute;
                bottom:0px;
            }
        </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">RPKDT</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <?php if (isset($_SESSION['isLoggedIn'])) { ?>
                    <a class="nav-link" href="shop.php">Book Ticket</a>
                    <?php } ?>
                </li>
                <li class="nav-item active">
                    <?php if (!isset($_SESSION['isLoggedIn'])) { ?>
                    <a class="nav-link" href="register.php">Register</a>
                    <?php } ?>
                </li>
                <li class="nav-item active">
                    <?php if (isset($_SESSION['isLoggedIn'])) { ?>
                    <a class="nav-link" href="cart.php">My Cart</a>
                    <?php } ?>
                </li>
                <li class="nav-item active">
                    <?php if (isset($_SESSION['isLoggedIn'])) { ?>
                        <a class="nav-link" href="process_logout.php">Logout (<?= $_SESSION['username'] ?>)</a>
                    <?php } else { ?>
                    <a class="nav-link" href="login.php">Login</a>
                    <?php } ?>
                </li>
            </ul>
        </nav>

    <div class="container" style="margin-top:10px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-bordered">
                    <?php 
                        $i = 0;
                        $total = 0;
                        if ($data_pemesanan == NULL) {
                            echo "<h3>Belum ada pemesanan.</h3>"; 
                    } else {?>

                    <thead class="table-primary font-weight-bold">
                        <tr>
                            <td>#</td>
                            <td>No. Tiket</td>
                            <td>Kapal</td>
                            <td>Tujuan</td>
                            <td>Harga</td>
                            <!-- <td>Qty</td>
                            <td>Total Price</td> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // $sql = "SELECT COUNT(idKapal) as count FROM tiket where idPengguna=$user_id";
                            // $result = mysqli_query($con, $strQ);
                            // $data = mysqli_fetch_assoc($result);
                            
                            foreach ($data_pemesanan as $dp) { 
                            $i++; 
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $dp['idKapal'] ?></td>
                            <td><?= $dp['namaKapal'] ?></td>
                            <td><?= $dp['tujuanKapal'] ?></td>
                            <td>Rp <?= number_format($dp['harga']) ?>,00,-</td>
                            <!-- <td><?= $data['count'] ?></td> -->
                        </tr>
                        <?php $total = $total + $dp['harga']; }} ?>
                    </tbody>
                </table>
                <table style="font-size: 20px;">
                    <tr>
                        <td>Total harga : </td>
                        <td>Rp <?= number_format($total) ?>,00,-</td>
                    </tr>
                </table><br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="process_payment.php?idUser=<?=$user_id?>" class="btn btn-block btn-primary">Pay</a>
                    </div>
                    <div class="col-md-6">
                        <a href="cancel_payment.php?idUser=<?=$user_id?>" class="btn btn-block btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" style="font-size: 12px; text-align: center;">
            Copyright &copy; 2018
            Designed by MrVampire & Napoleon
        </div>
</body>
</html>