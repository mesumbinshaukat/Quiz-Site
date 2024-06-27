<?php
session_start();

include("../connection/connection.php");

if (isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // echo "<script>alert('hello')</script>";

    $email = $_POST['email'];

    $password = $_POST['password'];

    $sql = "SELECT * FROM `db_admin` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] == $email && $row['password'] == $password) {
            $login_bool = true;
            $_SESSION["login_bool"] = $login_bool;
            setcookie('email', $email, time() + 3600, '/');
            setcookie('login', $login_bool, time() + 3600, '/');
            header("Location: ../index.php");
        } else {

            $_SESSION["login_error"] = true;
            header("Location: admin_login.php");
        }
    } else {

        $_SESSION["login_error"] = true;
        header("Location: admin_login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
        body {
            background-color: black;
        }

        * {
            color: aliceblue;
        }

        .admin_login {
            background-color: #1A1110 !important;
            padding: 50px;
            border-radius: 25px;
            box-shadow: 0px 0px 10px #000;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION["login_error"])) {
        echo '<script>toastr.error("Invalid Email or Password")</script>';
    } ?>
    <div class="container admin_login">
        <h1 class="text-center mt-5 text-danger fw-bold"><u class="text-danger">Only Admin Login</u></h1>
        <div class="d-flex justify-content-center mt-5">
            <form class="w-50 mx-auto mt-5" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <button type="submit" name="submit" class="btn btn-outline-warning">Submit</button>
            </form>

        </div>

    </div>

</body>

</html>