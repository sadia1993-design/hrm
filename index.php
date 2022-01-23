<?php
session_start();
$db_connect = new mysqli("localhost", "root", "", "php_project");

$selectTable = $db_connect->query("select * from admin");

if (isset($_POST['user'])) {
    $email = $_POST['user'];
    $password = $_POST['passwd'];
    $status = "error";

    if (empty($email) || empty($password)) {
        $_SESSION['msg'] = "Field Should not be Empty!!!";
    } else {
        while ($data = $selectTable->fetch_assoc()) {
            

            if ($data['email']  === $email && $data['password']  === $password) {
                $status = "ok";
                $_SESSION['name'] = $data['name'];
                $_SESSION['adminID'] = $data['adminID '];
                header("location: dashboard.php");
            }
        }

        if ($status == "error") {
            header("location: index.php");
            $_SESSION['msg'] = "Username or password not matched!!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/iofrm-theme9.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder " style="text-align:center; margin:0 auto">
                    <h3>Train people well enough so they can leave.</h3>
                    <p>In order to build a rewarding employee experience, you need to understand what matters most to your people.</p>
                    <img src="assets/images/graphic5.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside" style="display: block; text-align: center;">
                            <a href="index.html">
                                <div class="logo text-center">
                                    <img class="logo-size" src="./assets/images/icon.png" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <h4 style="color:#fff;text-align: center;">Login Form</h4>
                        </div>
                        <form method="post" action="">
                            <div class="icon-attached d-flex">
                                <input class="form-control" type="email" name="user" placeholder="E-mail Address" required>
                                <i class="fas fa-envelope font-icon"></i>
                            </div>
                            <div class="icon-attached d-flex">
                                <input class="form-control" type="password" name="passwd" placeholder="Password" required>
                                <i class="fas fa-lock  font-icon"></i>
                            </div>
                            <div class="form-button text-center">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                            </div>
                            <p style="color:red;text-align:center">
                                <?php if (isset($_SESSION['msg'])) { ?>

                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Holy shit!</strong> <?php echo $_SESSION['msg'];
                                                            ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                        <?php  } ?>


                        </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="./assets/js/fontawesome.min.js"></script>
</body>

</html>