<?php
    include_once('config/database.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $strQ = "SELECT * FROM akun WHERE username = '".$username."' AND password = '".$password."'";
        $login = mysqli_query($con, $strQ);
        
        if ($status = mysqli_fetch_assoc($login)) {
                $_SESSION['isLoggedIn'] = TRUE;
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $status['id'];
                header("Location: index.php?id=" . $_SESSION['user_id']);
        } else{
            $_SESSION['login_error'] = TRUE;
            ob_start();
            session_start();
            ob_end_clean();
            session_destroy();
            echo '<script>alert("Login gagal!");</script>';
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
    
    <div class="container text-center" style="margin-top:20px">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <img class="rounded-circle w-50 mx-auto d-block" src="images/logo_utama.jpg">
                    <h1 class="h3 mb-3 font-weight-normal">Please enter your credential</h1>
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    <input type="password" name="password" class="form-control" style="margin-top:10px" placeholder="Password" required>
                    <div class="checkbox mb-3">
                        <label><input type="checkbox" name="remember" value="remember-me" style="margin-top:10px">Remember me</label>
                    </div>
                    
                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login" />
                </form>
            </div>
        </div>
    </div>
    <div class="footer" style="font-size: 12px; text-align: center;">
            Copyright &copy; 2018
            Designed by MrVampire & Napoleon
</body>

</html>