<?php
session_start();

include("./connection/connection.php");

// Check if user is logged in
if (!isset($_COOKIE["login"]) && !isset($_COOKIE["name"])) {
    header("Location: login.php");
    exit();
}

// Retrieve quiz_id and student_id from the session
$quiz_id = isset($_SESSION['quiz_id']) ? $_SESSION['quiz_id'] : null;
$student_id = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : null;

if (!$quiz_id || !$student_id) {
    $_SESSION['error'] = "Quiz ID or Student ID not provided.";
    header("Location: ./quiz.php");
    exit();
}

// Fetch quiz details from db_quiz
$quiz_query = "SELECT * FROM `db_quiz` WHERE id = $quiz_id";
$quiz_result = mysqli_query($conn, $quiz_query);

if (!$quiz_result || mysqli_num_rows($quiz_result) == 0) {
    $_SESSION['error'] = "Quiz not found.";
    header("Location: ./quiz.php");
    exit();
}

$quiz_row = mysqli_fetch_assoc($quiz_result);
$quiz_name = $quiz_row['quiz_name'];
$quiz_data_json = $quiz_row['quiz'];

// Check if $quiz_data_json is valid JSON
$quiz_data = json_decode($quiz_data_json, true);

if (!$quiz_data || !is_array($quiz_data)) {
    $_SESSION['error'] = "Invalid quiz data format.";
    header("Location: ./quiz.php");
    exit();
}

// Store quiz_id in session for result.php to use
$_SESSION['quiz_id'] = $quiz_id;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Take Quiz: <?php echo $quiz_name; ?></title>

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
                            <h1 class="m-0">Quiz: <?php echo $quiz_name; ?></h1>
                        </div>
                    </div>

                    <div class="container-fluid page__container">

                        <form method="post" action="result.php">

                            <?php foreach ($quiz_data as $index => $question) : ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo ($index + 1) . '. ' . $question['question']; ?>
                                    </h5>
                                    <?php if (isset($question['options']) && is_array($question['options'])) : ?>
                                    <?php foreach ($question['options'] as $optionIndex => $option) : ?>
                                    <?php
                                                // Generate a unique ID for each option based on question index and option index
                                                $optionId = "option-$index-$optionIndex";
                                                ?>
                                    <div class="custom-control custom-radio" style="background-color: #FFE5B4;">
                                        <input type="radio" id="<?php echo $optionId; ?>"
                                            name="answers[<?php echo $index; ?>]" class="custom-control-input"
                                            value="<?php echo htmlspecialchars($option); ?>">
                                        <label class="custom-control-label"
                                            for="<?php echo $optionId; ?>"><?php echo htmlspecialchars($option); ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <p class="text-danger">Options not available for this question.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <button type="submit" class="btn btn-primary mt-3">Submit Quiz</button>

                            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                        </form>

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

</body>

</html>