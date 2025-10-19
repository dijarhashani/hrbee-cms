<?php
require 'database/connect.php';

$secret_token = "hr/bee-admin@dijarbossi.com-hello";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Token validation
        if (!isset($_POST['token']) || $_POST['token'] !== $secret_token) {
            throw new Exception("Unauthorized access");
        }

        
        $shabllon_name = trim($_POST['title']);
        $shabllon_text = trim($_POST['text']);

        
        $sql = "INSERT INTO shabllonat (shabllon_name, shabllon_text) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt->bind_param("ss", $shabllon_name, $shabllon_text);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Shablloni u shtua me sukses!"]);
        } else {
            throw new Exception("Ka deshtuar shtimi i shabllonit.");
        }

        $stmt->close();
        $conn->close();
    } else {
        throw new Exception("Unauthorized access!");
    }
} catch (Exception $e) {
    // Ensure the response is JSON and that no HTML is output
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>
