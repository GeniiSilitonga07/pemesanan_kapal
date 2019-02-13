<?php
    include_once('config/database.php');

    $strQ = "SELECT * FROM data_kapal";
    $data_kapal = mysqli_query($con, $strQ);
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
                bottom:0px;
            }
            /*table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }*/
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
        
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-3">
                <img class="rounded-circle w-50 mx-auto d-block" src="images/logo_utama.jpg"> </div>
            <div class="col-md-9">
                <h1>Book Ticket</h1>
                <h3>Choose your journey trip and book the ticket.</h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:10px">
        <div class="card-group">
            <div class="card">
                <div class="card-body text-center">
                    <table class="table table-bordered">
                        <thead class="table-primary font-weight-bold">
                            <tr>
                                <th>Nama Kapal</th>
                                <th>Asal Kapal</th>
                                <th>Tujuan Kapal</th>
                                <th>Jam Berangkat</th>
                                <th>Jam Tiba</th>
                                <th>Golongan</th>
                                <th>Harga</th>
                                <th>Muatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php foreach ($data_kapal as $dk) { ?>
                            <tr>
                                <td><?= $dk['namaKapal'] ?></td>
                                <td><?= $dk['asalKapal'] ?></td>
                                <td><?= $dk['tujuanKapal'] ?></td>
                                <td><?= $dk['jamBerangkat'] ?></td>
                                <td><?= $dk['jamTiba'] ?></td>
                                <td><?= $dk['golonganPenumpang'] ?></td>
                                <td><?= $dk['harga'] ?></td>
                                <td><?= $dk['muatan'] ?></td>
                                <td><a href="shop_process.php?idKapal=<?=$dk['idKapal']?>&user_id=<?=$_SESSION['user_id']?>" class="btn btn-success btn-block">Pesan</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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