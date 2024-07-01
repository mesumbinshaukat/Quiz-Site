<?php
session_start();

include("./connection/connection.php");

// Check if user is logged in
if (!isset($_COOKIE["login"]) && !isset($_COOKIE["name"])) {
    header("Location: login.php");
    exit();
}

// Fetch quizzes from database
$quizzes_query = "SELECT * FROM `db_quiz`";
$quizzes_result = mysqli_query($conn, $quizzes_query);

// Check if there are no quizzes
if (!$quizzes_result || mysqli_num_rows($quizzes_result) == 0) {
    $quizzes = [];
} else {
    $quizzes = mysqli_fetch_all($quizzes_result, MYSQLI_ASSOC);
}

$parent_email = $_COOKIE['email'];

$parent_query = "SELECT `id` FROM `db_parents` WHERE `email` = '$parent_email'";
$parent_result = mysqli_query($conn, $parent_query);
$parent_row = mysqli_fetch_assoc($parent_result);
$parent_id = $parent_row['id'];

$student_query = "SELECT * FROM `db_students` WHERE `parent_id` = $parent_id";
$student_result = mysqli_query($conn, $student_query);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quizzes</title>

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
                            <h1 class="m-0">Quizzes</h1>
                        </div>
                    </div>

                    <div class="container-fluid page__container">
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
                        <div class="card">
                            <div class="card-body">

                                <form id="quizForm" method="POST" action="quiz_start.php">
                                    <label for="student">Select Your Children:</label>
                                    <select name="student" id="student" required>
                                        <option value="">Select a student</option>
                                        <?php while ($student = mysqli_fetch_assoc($student_result)) : ?>
                                            <?php ?>
                                            <option value="<?php echo $student['id']; ?>">
                                                <?php echo $student['name']; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                    <input type="hidden" name="quiz_id" id="quiz_id">
                                </form>

                                <div id="quizList">
                                    <p>Please select a student to view available quizzes.</p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <!-- // END drawer-layout__content -->

                <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
                    <?php include("./partials/sidebar.php"); ?>
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

    <script>
        $(document).ready(function() {
            $('#student').change(function() {
                var studentId = $(this).val();
                if (studentId) {
                    $.ajax({
                        url: 'fetch_quizzes.php',
                        type: 'POST',
                        data: {
                            student_id: studentId
                        },
                        success: function(response) {
                            $('#quizList').html(response);
                        },
                        error: function() {
                            alert('Error fetching quizzes.');
                        }
                    });
                } else {
                    $('#quizList').html('<p>Please select a student to view available quizzes.</p>');
                }
            });
        });

        function startQuiz(quizId) {
            document.getElementById('quiz_id').value = quizId;
            document.getElementById('quizForm').submit();
        }
    </script>

</body>

</html>