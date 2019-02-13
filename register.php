<?php
    include_once('config/database.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $namaPengguna = $_POST['namaPengguna'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        // var_dump($password,$repassword);die;
        
        if ($password != $repassword) {
            ob_start();
            session_start();
            ob_end_clean();
            session_destroy();
            echo '<script>alert("Register gagal!");</script>';
        } elseif ($password == $repassword){
            $strQ = "INSERT INTO akun (username, password, namaPengguna, des, last_login) VALUES('".$username."', '".$password."', '".$namaPengguna."', 0, NULL)";
            $register = mysqli_query($con, $strQ);

            if ($register) {
                $_SESSION['register_succes'] = TRUE;
                $_SESSION['username'] = $username;
                $_SESSION['isLoggedIn'] = TRUE;
                echo '<script>alert("Registrasi berhasil!");</script>';
                header("Location: index.php");
            }
        } else {
            $_SESSION['register_fail'] = TRUE;
            echo '<script>alert("Register gagal!");</script>';
            header("Location: register.php");
        }
    }

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
    <script src="js/typed.js"></script>
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
    
    <div class="container" style="margin-top:20px">
        <center><h1>Register your account</h1></center>
        <br>
        <div class="row">
            <div class="col-md-9 offset-md-3">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="full_name"><b>Full Name*</b></label>
                                <input type="text" id="namaPengguna" name="namaPengguna" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="username"
                                style="margin-top: 10px;"><b>Username*</b></label>
                                <input type="text" id="username" name="username" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4 border-left">
                            <div class="form-group">
                                <label for="password"><b>Password*</b></label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="repassword" style="margin-top: 10px;">
                                    <b>Retype password*</b>
                                </label>
                                <input type="password" id="repassword" name="repassword" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                            <input class="btn btn-primary btn-block" type="submit" value="Register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer" style="font-size: 12px; text-align: center;">
            Copyright &copy; 2018
            Designed by MrVampire & Napoleon
        </div>
</body>

</html>