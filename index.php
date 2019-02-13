<?php
    include_once('config/database.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RPKDT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/typed.js"></script>
        
        <script>
            window.onload = function () {
                var typed = new Typed('.typing-effect', {
                    strings: [
                        "Samosir island is a piece of heaven.",
                        "Samosir island has many region.",
                        "Every region has different culture.",
                        "But every region separates by Toba Lake.",
                        "Book your ticket to reach your destination."
                    ],
                    typeSpeed: 50,
                    backDelay: 1500,
                    loop: 1
                });
            }
        </script> 

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
        
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 offset-md-1">
                        <img class="rounded-circle w-50 mx-auto d-block" src="images/logo_utama.jpg"> 
                    </div>
                    <div class="col-md-8">
                        <h1>Rute Perjalanan Kapal di Danau Toba</h1>
                        <h2><span class="typing-effect"></span></h2>
                        <p>Book your ticket now.</p>
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