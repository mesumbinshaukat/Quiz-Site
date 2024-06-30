<?php
session_start();

include("./connection/connection.php");

if (!isset($_COOKIE["email"]) && !isset($_COOKIE["login"])) {
    header("Location: ./verify-access/admin_login.php");
    exit();
}

if (isset($_POST["submit"])) {

    $image = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];

    $old_image = $_POST["old_image"];

    if ($image == "" || $image == null) {
        $update_query = "UPDATE `db_home` SET `image` = '$old_image' WHERE `id` = 1";
        mysqli_query($conn, $update_query);
        move_uploaded_file($image_tmp, "../assets/img/home_5/about/" . $old_image);
    } else {
        $update_query = "UPDATE `db_home` SET `image` = '$image' WHERE `id` = 1";
        mysqli_query($conn, $update_query);
        move_uploaded_file($image_tmp, "../assets/img/home_5/about/" . $image);
    }

    $subtitle = $_POST["subtitle"];
    $title = $_POST["title"];
    $paragraph = $_POST["paragraph"];
    $experience = $_POST["experience"];

    $update_query = "UPDATE `db_home` SET `subtitle` = '$subtitle', `headline_title` = '$title', `paragraph` = '$paragraph', `experience` = '$experience' WHERE `id` = 1";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION["success"] = "Home updated successfully";
        header("Location: ./custom-home.php");
        exit();
    } else {
        $_SESSION["error"] = "Something went wrong. Please Try Again";
        header("Location: ./custom-home.php");
        exit();
    }
}

$home_query = "SELECT * FROM `db_home`";
$home_result = mysqli_query($conn, $home_query);

$home = mysqli_fetch_assoc($home_result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Custom Home</title>

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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


                            <h1 class="m-0">Customize Home Page</h1>
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

                                    <form method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="class">Image:</label>
                                            <input type="file" class="form-control" name="image">
                                            <p class="text-danger"><?php echo $home["image"]; ?></p>
                                            <input type="hidden" name="old_image" value="<?php echo $home["image"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="subtitle">Subtitle:</label>
                                            <input type="text" class="form-control" name="subtitle"
                                                placeholder="Enter Subtitle" value="<?php echo $home["subtitle"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Headline Title:</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Enter Title"
                                                value="<?php echo $home["headline_title"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="paragraph">Paragraph:</label>
                                            <input type="text" class="form-control" name="paragraph"
                                                placeholder="Enter Paragraph" value="<?php echo $home["paragraph"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Experience:</label>
                                            <input type="number" class="form-control" name="experience"
                                                placeholder="Enter Experience"
                                                value="<?php echo $home["experience"]; ?>">
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