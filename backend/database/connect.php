<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'evolux';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['message' => 'Database connection failed']);
    exit();
}
?>