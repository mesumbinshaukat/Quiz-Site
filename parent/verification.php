<?php
session_start();

include("./connection/connection.php");

if (!isset($_SESSION["sent"]) || $_SESSION["sent"] != "sent") {
    $_SESSION["error"] = "Please verify your email first!";
    header("Location: ./signup.php");
    exit();
}

if (isset($_POST["submit"])) {

    $verify_code = (int) $_SESSION["code"];
    $code = (int) $_POST["code"];

    if ($code == $verify_code) {
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $password = $_SESSION["password"];
        $gender = $_SESSION["gender"];

        $sql = "INSERT INTO `db_parents`(`name`, `email`, `password`, `gender`) VALUES ('$name', '$email', '$password', '$gender')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION["success"] = "Account created successfully!";
            header("Location: ./login.php");
            exit();
        } else {
            $_SESSION["error"] = "Something went wrong!";
        }
    } else {
        $_SESSION["error"] = "Something went wrong!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parent Register</title>

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
                <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="FlowDash">
                <span>Quiz Website</span>
            </a>
        </div>

        <h4 class="m-0">Verify Your Email</h4>

        <?php

        if (isset($_SESSION["sent"]) && $_SESSION["sent"] == "sent") {
            echo "<div class='alert alert-success' role='alert'>
                We have sent an email to your email address. Please copy the code and paste down below in input field.

            </div>";
        }
        ?>

        <?php

        if (isset($_SESSION["error"])) {
            echo "<div class='alert alert-danger' role='alert'>
                " . $_SESSION["error"] . "
            </div>";
        }

        ?>

        <form method="POST">

            <div class="form-group">
                <label for="code">Code:</label>
                <input type="number" class="form-control" id="code" name="code" required>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-primary mb-2" type="submit" name="submit">Verify</button><br>
                <a class="text-body text-underline" href="login.php">Have an account? Login</a>
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


</body>

</html>