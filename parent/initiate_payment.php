<?php
session_start();

// Replace these with your actual PhonePe API credentials

echo "<center><h1>PhonePe Payment Gateway</h1></center>";

$merchantId = 'SRIHARONLINE'; // sandbox or test merchantId
$apiKey = "a9e915d9-5962-46d2-b38e-d5c176922f9c"; // sandbox or test APIKEY
$redirectUrl = 'https://quiz-site.sushmagoswami.com/parent/payment_callback.php';

// Get the session data
$quiz_id = isset($_SESSION['quiz_id']) ? $_SESSION['quiz_id'] : null;
$student_id = isset($_SESSION['student_id']) ? $_SESSION['student_id'] : null;

if (!$quiz_id || !$student_id) {
    $error_message = 'Quiz ID and Student ID are required';
    echo json_encode(['error' => $error_message]);
    exit();
}

// Set transaction details
$order_id = uniqid();
$name = "Tutorials Website";
$email = $_COOKIE['email'];
$mobile = 9833938560;
$amount = 199; // amount in INR
$description = 'Payment for Product/Service';

$paymentData = array(
    'merchantId' => $merchantId,
    'merchantTransactionId' => $order_id, // test transactionID
    "merchantUserId" => "MUID$student_id",
    'amount' => $amount * 100,
    'redirectUrl' => $redirectUrl,
    'redirectMode' => "POST",
    'callbackUrl' => $redirectUrl,
    "merchantOrderId" => $order_id,
    "mobileNumber" => $mobile,
    "message" => $description,
    "email" => $email,
    "shortName" => $name,
    "paymentInstrument" => array(
        "type" => "PAY_PAGE",
    )
);

$jsonencode = json_encode($paymentData);
$payloadMain = base64_encode($jsonencode);
$salt_index = 1; //key index 1
$payload = $payloadMain . "/pg/v1/pay" . $apiKey;
$sha256 = hash("sha256", $payload);
$final_x_header = $sha256 . '###' . $salt_index;
$request = json_encode(array('request' => $payloadMain));

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $request,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "X-VERIFY: " . $final_x_header,
        "accept: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $res = json_decode($response);

    echo "<pre>";
    print_r($res);
    echo "</pre>";

    if (isset($res->success) && $res->success == '1') {
        $paymentCode = $res->code;
        $paymentMsg = $res->message;
        $payUrl = $res->data->instrumentResponse->redirectInfo->url;

        header('Location:' . $payUrl);
    }
}
