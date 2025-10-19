<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header("Content-Type: application/json");
    echo json_encode(["message" => "Method Not Allowed"]);
    exit();
}

require 'database/connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM admin WHERE email = ?");
if ($stmt === false) {
    $error = $conn->error;
    echo json_encode(['status' => 'error', 'message' => 'Database error', 'details' => $error]);
    exit;
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        setcookie('user_id', $id, time() + (86400 * 30), "/"); 
        echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
        
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid password!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'User not found!']);
}

$stmt->close();
$conn->close();
?>
