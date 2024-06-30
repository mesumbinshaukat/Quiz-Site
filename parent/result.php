<?php
session_start();

include("./connection/connection.php");

if (!isset($_COOKIE["login"]) && !isset($_COOKIE["name"])) {
    header("Location: login.php");
    exit();
}

// Check if quiz_id and answers are provided via POST
if (!isset($_POST['quiz_id']) || !isset($_POST['answers'])) {
    $_SESSION['error'] = "Quiz ID or answers not provided.";
    header("Location: ./quiz.php");
    exit();
}

$quiz_id = (int) $_POST['quiz_id'];
$user_answers = $_POST['answers'];

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

// Decode the quiz data from JSON
$quiz_data = json_decode($quiz_data_json, true);

if (!$quiz_data || !is_array($quiz_data)) {
    $_SESSION['error'] = "Invalid quiz data format.";
    header("Location: ./quiz.php");
    exit();
}

$total_questions = count($quiz_data);
$correct_answers = 0;

// Check answers and calculate score
foreach ($quiz_data as $index => $question) {
    if (isset($user_answers[$index])) {
        $user_answer = $user_answers[$index];
        $correct_answer = $question['correct_answer'];

        if ($user_answer === $correct_answer) {
            $correct_answers++;
        }
    }
}

// Calculate score correctly without casting to int
$score = ($correct_answers / $total_questions) * 100;

// Insert result into results table
if (isset($_COOKIE['email'])) {
    $student_id = $_SESSION["student_id"];

    // Prepare the SQL statement
    $insert_query = "INSERT INTO `db_result` (`student_id`, `quiz_id`, `obtained_marks`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insert_query);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "iii", $student_id, $quiz_id, $score);
    $result = mysqli_stmt_execute($stmt);

    // Check if insertion was successful
    if ($result) {
        $_SESSION['success'] = "Quiz result successfully recorded.";
    } else {
        $_SESSION['error'] = "Failed to record quiz result.";
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['error'] = "Student ID not found.";
}

// Fetch the inserted result for display
if (isset($_COOKIE['email'])) {
    $student_id = $_SESSION["student_id"];

    // Query to fetch the result
    $fetch_query = "SELECT * FROM `db_result` WHERE `student_id` = $student_id AND `quiz_id` = $quiz_id";
    $fetch_result = mysqli_query($conn, $fetch_query);

    if ($fetch_result && mysqli_num_rows($fetch_result) > 0) {
        $result_row = mysqli_fetch_assoc($fetch_result);
        $obtained_marks = $result_row['obtained_marks'];
    } else {
        $_SESSION['error'] = "Failed to fetch quiz result.";
        header("Location: ./quiz.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Student ID not found.";
    header("Location: ./quiz.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quiz Result</title>

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
                            <h1 class="m-0">Quiz Result</h1>
                        </div>
                    </div>

                    <div class="container-fluid page__container">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Quiz: <?php echo $quiz_name; ?></h5>
                                <p class="card-text">Marks: <?php echo $score; ?>/100</p>

                                <h3>Answers</h3>
                                <?php foreach ($quiz_data as $index => $question) : ?>
                                    <div>
                                        <p><?php echo $question['question']; ?></p>
                                        <?php $user_answer = isset($user_answers[$index]) ? $user_answers[$index] : 'No Answer'; ?>
                                        <?php $correct_answer = $question['correct_answer']; ?>
                                        <?php if ($user_answer === $correct_answer) : ?>
                                            <p style="color: green;">Your answer: <?php echo $user_answer; ?> (Correct)</p>
                                        <?php else : ?>
                                            <p style="color: red;">Your answer: <?php echo $user_answer; ?> (Incorrect)</p>
                                            <p style="color: green;">Correct answer: <?php echo $correct_answer; ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>

                                <a href="./quiz.php" class="btn btn-primary">Back to Quiz</a>
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

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default" :layout-location="{
      'default': 'ui-forms.html',
      'fixed': 'fixed-ui-forms.html',
      'fluid': 'fluid-ui-forms.html',
      'mini': 'mini-ui-forms.html'
    }"></app-settings>
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