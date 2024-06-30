<?php
session_start();

include("./connection/connection.php");

if (!isset($_COOKIE["email"]) && !isset($_COOKIE["login"])) {
    header("Location: ./verify-access/admin_login.php");
    exit();
}

if (isset($_POST["submit"])) {

    $quiz_name = $_POST["quiz"];
    $subject_id = $_POST["subject"];
    $questions = $_POST["questions"];
    $total_marks = 100;

    $quiz_data = [];
    foreach ($questions as $question) {
        // Explode options string into an array
        $options = explode(',', $question['options']);
        // Trim each option to remove extra spaces
        $options = array_map('trim', $options);

        $quiz_data[] = [
            'question' => $question['question'],
            'options' => $options,
            'correct_answer' => $question['correct_answer']
        ];
    }

    $quiz_json = json_encode($quiz_data);

    $sql = "INSERT INTO `db_quiz` (`subject_id`, `quiz_name`, `quiz`, `total_marks`) VALUES ('$subject_id', '$quiz_name', '$quiz_json', '$total_marks')";
    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        $_SESSION["success"] = "Quiz added successfully";
        header("Location: ./add-quiz.php");
        exit();
    } else {
        $_SESSION["error"] = "Something went wrong. Please Try Again";
        header("Location: ./add-quiz.php");
        exit();
    }
}

$subject_query = "SELECT * FROM `db_subject`";
$query_run_subject = mysqli_query($conn, $subject_query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Quiz</title>

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


                            <h1 class="m-0">Add Quiz</h1>
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
                                        <div class="form-group">
                                            <label for="quiz">Quiz Name:</label>
                                            <input type="text" class="form-control" name="quiz" id="quiz" placeholder="Enter Quiz Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="subject">Subject/Class:</label>
                                            <select name="subject" class="form-control">
                                                <?php while ($row = mysqli_fetch_assoc($query_run_subject)) {
                                                    $class_query = "SELECT * FROM `db_class` WHERE `id` = {$row['class_id']}";
                                                    $query_run_class = mysqli_query($conn, $class_query);
                                                    $class = mysqli_fetch_assoc($query_run_class);
                                                ?>
                                                    <option value="<?= $row["id"] ?>"><?= $row["subject"] ?> |
                                                        <?= $class["class"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div id="questions-container">
                                            <div class="form-group">
                                                <label for="question-0">Question:</label>
                                                <input type="text" class="form-control" name="questions[0][question]" id="question-0" placeholder="Enter Question">
                                            </div>
                                            <div class="form-group">
                                                <label for="options-0">Options (comma-separated):</label>
                                                <input type="text" class="form-control" name="questions[0][options]" id="options-0" placeholder="Enter Options">
                                            </div>
                                            <div class="form-group">
                                                <label for="correct-answer-0">Correct Answer:</label>
                                                <input type="text" class="form-control" name="questions[0][correct_answer]" id="correct-answer-0" placeholder="Enter Correct Answer">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="total-marks">Total Marks:</label>
                                            <input type="number" class="form-control" name="total_marks" id="total-marks" placeholder="Enter Total Marks">
                                        </div> -->
                                        <button type="button" class="btn btn-secondary" id="add-question">Add Another
                                            Question</button>

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

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default" :layout-location="{
      'default': 'ui-forms.html',
      'fixed': 'fixed-ui-forms.html',
      'fluid': 'fluid-ui-forms.html',
      'mini': 'mini-ui-forms.html'
    }"></app-settings>
    </div>

    <script>
        document.getElementById('add-question').addEventListener('click', function() {
            var questionCount = document.querySelectorAll('#questions-container .form-group').length / 3;
            var newQuestion = `
                <div class="form-group">
                    <label for="question-${questionCount}">Question:</label>
                    <input type="text" class="form-control" name="questions[${questionCount}][question]" id="question-${questionCount}" placeholder="Enter Question">
                </div>
                <div class="form-group">
                    <label for="options-${questionCount}">Options (comma-separated):</label>
                    <input type="text" class="form-control" name="questions[${questionCount}][options]" id="options-${questionCount}" placeholder="Enter Options">
                </div>
                <div class="form-group">
                    <label for="correct-answer-${questionCount}">Correct Answer:</label>
                    <input type="text" class="form-control" name="questions[${questionCount}][correct_answer]" id="correct-answer-${questionCount}" placeholder="Enter Correct Answer">
                </div>`;
            document.getElementById('questions-container').insertAdjacentHTML('beforeend', newQuestion);
        });
    </script>

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