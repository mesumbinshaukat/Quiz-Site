<?php
include("./connection/connection.php");

if (isset($_POST['student_id'])) {
    $student_id = (int) $_POST['student_id'];

    // Fetch quizzes the student has already attempted
    $attempted_query = "SELECT quiz_id FROM `db_result` WHERE student_id = $student_id";
    $attempted_result = mysqli_query($conn, $attempted_query);

    $attempted_quizzes = [];
    while ($row = mysqli_fetch_assoc($attempted_result)) {
        $attempted_quizzes[] = $row['quiz_id'];
    }

    // Fetch all quizzes
    $quizzes_query = "SELECT * FROM `db_quiz`";
    $quizzes_result = mysqli_query($conn, $quizzes_query);

    // Check if there are no quizzes
    if (!$quizzes_result || mysqli_num_rows($quizzes_result) == 0) {
        echo '<p>No quizzes found.</p>';
    } else {
        echo '<ul class="list-group list-group-fit">';
        while ($quiz = mysqli_fetch_assoc($quizzes_result)) {
            // Only display quizzes the student has not attempted
            if (!in_array($quiz['id'], $attempted_quizzes)) {
                echo '<li class="list-group-item">
                        <a href="#" onclick="startQuiz(' . $quiz['id'] . ')">
                            ' . $quiz['quiz_name'] . '
                        </a>
                      </li>';
            }
        }
        echo '</ul>';
    }
} else {
    echo '<p>Invalid request.</p>';
}
