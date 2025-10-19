<?php
require 'database/connect.php';

$secret_token = "hr/bee-admin@dijarbossi.com-hello";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_POST['token']) || $_POST['token'] !== $secret_token) {
            throw new Exception("Unauthorized access");
        }

        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            throw new Exception("Invalid course ID");
        }

        $n_id = intval($_POST['id']);

        
        $sql = "DELETE FROM `subscribers` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Failed to prepare the SQL statement.");
        }

        $stmt->bind_param("i", $n_id);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();
            
        echo json_encode(["success" => true, "message" => "Abonuesi u fshi me sukses!"]);
        
        $conn->close();
    } else {
        throw new Exception("Unauthorized access!");
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
