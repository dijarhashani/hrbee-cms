<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Method Not Allowed"]);
    header("Location: home");
    exit();
}


require 'database/connect.php';


if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    http_response_code(403);
    echo json_encode(["message" => "Opps, ju lutem provoni perseri."]);
    exit();
}


$name = filter_var(trim($_POST['emri']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$phone = filter_var(trim($_POST['number']), FILTER_SANITIZE_STRING);

if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($phone)) {
    http_response_code(400);
    echo json_encode(["message" => "Ju lutem plotesoni te gjitha rubrikat!"]);
    exit();
}


$stmt = $conn->prepare("SELECT email FROM subscribers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    http_response_code(409); 
    echo json_encode(["message" => "Emaili eshte i regjistruar me pare!"]);
    $stmt->close();
    $conn->close();
    exit();
}

$stmt->close();



$stmt = $conn->prepare("INSERT INTO subscribers (name, email, phone) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $phone);

if ($stmt->execute()) {
    echo json_encode(["message" => "Jeni abonuar me sukses!"]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
