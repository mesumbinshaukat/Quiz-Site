<?php
session_start();

$quiz_id = isset($_POST['quiz_id']) ? $_POST['quiz_id'] : null;
$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : null;

if ($quiz_id && $student_id) {
    $_SESSION['quiz_id'] = $quiz_id;
    $_SESSION['student_id'] = $student_id;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Quiz ID and Student ID are required']);
}
