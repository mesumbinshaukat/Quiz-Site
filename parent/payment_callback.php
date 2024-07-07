<?php
// payment_callback.php

// Enable detailed error reporting (optional for debugging purposes)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initialize logging (optional for debugging purposes)
$logFile = 'payment_callback.log';
function logMessage($message)
{
    global $logFile;
    file_put_contents($logFile, $message . "\n", FILE_APPEND);
}

// Log the start of the callback handling
logMessage("Handling payment callback...");

// Read POST data (if any processing is needed based on the data)
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Log the raw input for debugging purposes
logMessage("Raw input: $input");
logMessage("Decoded data: " . print_r($data, true));

// Extract quiz_id and student_id if they are part of the callback data
// These values must be passed to `start_quiz.php` if they are required for starting the quiz
$quiz_id = isset($data['response']['quiz_id']) ? $data['response']['quiz_id'] : null;
$student_id = isset($data['response']['student_id']) ? $data['response']['student_id'] : null;

// Log the extracted values for debugging purposes
logMessage("Extracted Quiz ID: $quiz_id");
logMessage("Extracted Student ID: $student_id");

// Construct the redirect URL
$redirectUrl = "quiz_start.php";
if ($quiz_id && $student_id) {
    $redirectUrl .= "?quiz_id=$quiz_id&student_id=$student_id";
}

// Log the redirect URL
logMessage("Redirecting to: $redirectUrl");

// Redirect to the start_quiz.php page
header("Location: $redirectUrl");
exit();
