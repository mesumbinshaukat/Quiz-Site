<?php
if (isset($_COOKIE["name"]) && isset($_COOKIE["login"])) {
    unset($_COOKIE["name"]);
    unset($_COOKIE["login"]);
    setcookie("name", "", time() - 3600, "/");
    setcookie("login", "", time() - 3600, "/");
    header("Location: ../login.php");
    exit();
}
