<?php
require 'database/connect.php';

$secret_token = "hr/bee-admin@dijarbossi.com-hello";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_POST['token']) || $_POST['token'] !== $secret_token) {
            throw new Exception("Unauthorized access");
        }

        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            throw new Exception("Invalid application ID");
        }

        $shabllon_id = intval($_POST['id']);
        $shabllon_name = trim($_POST['title']);
        $shabllon_text = trim($_POST['text']); 

        
        $sql = "UPDATE shabllonat SET shabllon_name=?, shabllon_text=? WHERE shabllon_id=?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt->bind_param("ssi", $shabllon_name, $shabllon_text, $shabllon_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Shablloni u ndryshua me sukses!"]);
        } else {
            throw new Exception("Ka deshtuar ndryshimi i shabllonit.");
        }

        $stmt->close();
        $conn->close();
    } else {
        throw new Exception("Unauthorized access!");
    }
} catch (Exception $e) {
    
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>
