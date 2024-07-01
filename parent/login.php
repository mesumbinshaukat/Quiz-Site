<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

include("./connection/connection.php");

if (isset($_COOKIE["login"]) && isset($_COOKIE["name"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["login"])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $password = $_POST["password"];

    $query = "SELECT * FROM `db_parents` WHERE `email` = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $login_bool = true;
            setcookie("name", $row["name"], time() + (86400 * 30), "/");
            setcookie("login", $login_bool, time() + (86400 * 30), "/");
            setcookie("email", $email, time() + (86400 * 30), "/");
            $_SESSION["login_success"] = "Login Successfull";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["error"] = "Invalid Password";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parent LogIn</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-133433427-1');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="layout-login">

    <div class="layout-login__overlay"></div>
    <div class="layout-login__form bg-white" data-perfect-scrollbar>
        <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
            <a href="index.html" class="navbar-brand" style="min-width: 0">
                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="Stack">
                <span>Quiz Website</span>
            </a>
        </div>

        <h4 class="m-0">Welcome back!</h4>
        <p class="mb-5">Login to access your Account </p>

        <?php

        if (isset($_SESSION["error"])) {
            echo "<div class='alert alert-danger' role='alert'>
                " . $_SESSION["error"] . "
            </div>";
        }

        if (isset($_SESSION["success"])) {
            echo "<div class='alert alert-success' role='alert'>
                " . $_SESSION["success"] . "
            </div>";
        }

        session_unset();
        ?>


        <form method="POST">
            <div class="form-group">
                <label class="text-label" for="email">Email Address:</label>
                <div class="input-group input-group-merge">
                    <input id="email" type="email" required name="email" class="form-control form-control-prepended"
                        placeholder="Your Registered Email...">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="text-label" for="password">Password:</label>
                <div class="input-group input-group-merge">
                    <input id="password" type="password" name="password" required=""
                        class="form-control form-control-prepended" placeholder="Password...">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-primary mb-5" type="submit" name="login">Login</button><br>

                Don't have an account? <a class="text-body text-underline" href="signup.php">Sign up!</a>
            </div>
        </form>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>

    <?php if (isset($_SESSION["success"])) {
        echo '<script>toastr.success("' . $_SESSION["success"] . '");</script>';
    }

    if (isset($_SESSION["error"])) {
        echo '<script>toastr.error("' . $_SESSION["error"] . '");</script>';
    }

    session_unset();
    ?>

</body>

</html>