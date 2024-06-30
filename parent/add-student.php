<?php
session_start();

include("./connection/connection.php");

if (!isset($_COOKIE["email"]) && !isset($_COOKIE["login"])) {
    header("Location: ./verify-access/admin_login.php");
    exit();
}

if (isset($_POST["submit"])) {

    $parent_id = $_POST["parent"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $dob = $_POST["age"];
    $class = $_POST["class"];

    $sql = "INSERT INTO `db_students` (`parent_id`, `name`, `gender`, `age`, `class_id`) VALUES ('$parent_id', '$name', '$gender', '$dob', '$class')";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        $_SESSION["success"] = "Student added successfully";
        header("Location: ./add-student.php");
        exit();
    } else {
        $_SESSION["error"] = "Something went wrong. Please Try Again";
        header("Location: ./add-student.php");
        exit();
    }
}

$parent_email = $_COOKIE["email"];

$parent_query = "SELECT * FROM `db_parents` WHERE `email` = '$parent_email'";

$query_run = mysqli_query($conn, $parent_query);

$fetch_parent = mysqli_fetch_assoc($query_run);

$parent_id = $fetch_parent["id"];

$class_query = "SELECT * FROM `db_class`";
$query_run_class = mysqli_query($conn, $class_query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Child</title>

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

    <!-- Flatpickr -->
    <link type="text/css" href="assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Quill Theme -->
    <link type="text/css" href="assets/css/vendor-quill.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-quill.rtl.css" rel="stylesheet">

    <!-- Dropzone -->
    <link type="text/css" href="assets/css/vendor-dropzone.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-dropzone.rtl.css" rel="stylesheet">

    <!-- Select2 -->
    <link type="text/css" href="assets/css/vendor-select2.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-select2.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/vendor/select2/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="layout-default">


    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <?php include("./partials/header.php"); ?>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                    <div class="container-fluid page__heading-container">
                        <div class="page__heading">


                            <h1 class="m-0">Add Child</h1>
                        </div>
                    </div>

                    <div class="container-fluid page__container">

                        <div class="card card-form">
                            <div class="row no-gutters">

                                <div class="col-lg-12 card-form__body card-body">

                                    <?php if (isset($_SESSION["success"])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $_SESSION["success"]; ?>
                                        </div>
                                    <?php }
                                    if (isset($_SESSION["error"])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION["error"]; ?>
                                        </div>
                                    <?php }
                                    session_unset();
                                    ?>

                                    <form method="post">
                                        <input type="hidden" name="parent" value="<?= $parent_id ?>">
                                        <div class="form-group">
                                            <label for="class">Child Name:</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Child Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="class">Gender:</label>
                                            <select name="gender" class="form-control">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="class">Age:</label>
                                            <input type="number" class="form-control" name="age" placeholder="Enter Child Age">
                                        </div>
                                        <div class="form-group">
                                            <label for="class">Class:</label>
                                            <select name="class" class="form-control">

                                                <?php while ($row = mysqli_fetch_assoc($query_run_class)) { ?>
                                                    <option value="<?= $row["id"] ?>"><?= $row["class"] ?></option>

                                                <?php } ?>

                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- // END drawer-layout__content -->

                <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <?php include("./partials/sidebar.php") ?>
                </div>
            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

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

    <!-- Flatpickr -->
    <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="assets/js/flatpickr.js"></script>

    <!-- jQuery Mask Plugin -->
    <script src="assets/vendor/jquery.mask.min.js"></script>

    <!-- Quill -->
    <script src="assets/vendor/quill.min.js"></script>

    <!-- Dropzone -->
    <script src="assets/vendor/dropzone.min.js"></script>

    <!-- Select2 -->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/js/select2.js"></script>


</body>

</html>