<?php
session_start();

include("./connection/connection.php");

if (!isset($_COOKIE["email"]) && !isset($_COOKIE["login"])) {
    header("Location: ./verify-access/admin_login.php");
    exit();
}

$fetch_student = "SELECT * FROM `db_students`";

$result = mysqli_query($conn, $fetch_student);

$parent_query = "SELECT * FROM `db_parents`";
$parent_result = mysqli_query($conn, $parent_query);

$result_query = "SELECT * FROM `db_result`";
$result_result = mysqli_query($conn, $result_query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>

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

    <!-- Vector Maps -->
    <link type="text/css" href="assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="layebardefault">

    <!-- <div class="preloader"></div> -->

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
                        <div class="page__heading d-flex align-items-end">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                    </ol>
                                </nav>
                                <h1 class="m-0">Dashboard</h1>
                            </div>

                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <table class="table">
                                <h3>Students</h3>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Class</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $class_query = "SELECT * FROM `db_class` WHERE `id` = {$row['class_id']}";
                                        $class_result = mysqli_query($conn, $class_query);
                                        $class = mysqli_fetch_assoc($class_result);
                                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['age'] . "</td><td>" . $row['gender'] . "</td><td>" . $class['class'] . "</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card card-form">
                            <table class="table">
                                <h3>Parents</h3>
                                <thead>
                                    <tr></tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Parent Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($parent_result)) {
                                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['gender'] . "</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card card-form">
                            <table class="table">
                                <h3>Parents</h3>
                                <thead>
                                    <tr></tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Quiz</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Parent Name</th>
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Obtained Marks</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($result_result)) {
                                        $student_query = "SELECT * FROM `db_students` WHERE `id` = {$row['student_id']}";
                                        $student_result = mysqli_query($conn, $student_query);
                                        $student = mysqli_fetch_assoc($student_result);


                                        $class_query = "SELECT * FROM `db_class` WHERE `id` = {$student['class_id']}";
                                        $class_result = mysqli_query($conn, $class_query);
                                        $class = mysqli_fetch_assoc($class_result);


                                        $parent_query = "SELECT * FROM `db_parents` WHERE `id` = {$student['parent_id']}";
                                        $parent_result = mysqli_query($conn, $parent_query);
                                        $parent = mysqli_fetch_assoc($parent_result);

                                        $quiz_query = "SELECT * FROM `db_quiz` WHERE `id` = {$row['quiz_id']}";
                                        $quiz_result = mysqli_query($conn, $quiz_query);
                                        $quiz = mysqli_fetch_assoc($quiz_result);

                                        $subject_query = "SELECT * FROM `db_subject` WHERE `id` = {$quiz['subject_id']}";
                                        $subject_result = mysqli_query($conn, $subject_query);
                                        $subject = mysqli_fetch_assoc($subject_result);

                                        echo "<tr><td>{$row['id']}</td><td>{$student['name']}</td><td>{$quiz['quiz_name']}</td><td>{$subject['subject']}</td><td>{$class['class']}</td><td>{$parent['name']}</td><td>{$quiz['total_marks']}</td><td>{$row['obtained_marks']}</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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

    <!-- Global Settings -->
    <script src="assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="assets/vendor/moment.min.js"></script>
    <script src="assets/vendor/moment-range.js"></script>

    <!-- Chart.js -->
    <script src="assets/vendor/Chart.min.js"></script>

    <!-- App Charts JS -->
    <script src="assets/js/charts.js"></script>
    <script src="assets/js/chartjs-rounded-bar.js"></script>

    <!-- Chart Samples -->
    <script src="assets/js/page.dashboard.js"></script>
    <script src="assets/js/progress-charts.js"></script>

    <!-- Vector Maps -->
    <script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="assets/js/vector-maps.js"></script>


    <?php
    if (isset($_SESSION["login_bool"])) {
        echo "<script>toastr.success('Login Successful');</script>";
    }

    if (session_unset()) {

        $_SESSION['previous_url'] = $_SERVER['REQUEST_URI'];
    }
    ?>
</body>

</html>