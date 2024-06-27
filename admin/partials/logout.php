<?php
if (isset($_COOKIE["email"]) && isset($_COOKIE["login"])) {
    unset($_COOKIE["email"]);
    unset($_COOKIE["login"]);
    setcookie("email", "", time() - 3600, "/");
    setcookie("login", "", time() - 3600, "/");
    header("Location: ../verify-access/admin_login.php");
    exit();
}
