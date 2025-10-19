<?php
require 'database/connect.php';

$secret_token = "hr/bee-admin@dijarbossi.com-hello";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_POST['token']) || $_POST['token'] !== $secret_token) {
            throw new Exception("Unauthorized access");
        }

        if (!isset($_POST['trajner_id']) || !is_numeric($_POST['trajner_id'])) {
            throw new Exception("Invalid course ID");
        }

        $trajner_id = intval($_POST['trajner_id']);

        
        $sql = "DELETE FROM `trainers` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Failed to prepare the SQL statement.");
        }

        $stmt->bind_param("i", $trajner_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            
            $sql = "SELECT `t_photo_path` FROM `trainers` WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            
            if (!$stmt) {
                throw new Exception("Failed to prepare the SQL statement.");
            }

            $stmt->bind_param("i", $trajner_id);
            $stmt->execute();
            $stmt->bind_result($course_image_path);
            $stmt->fetch();
            $stmt->close();

            
            if ($course_image_path) {
                $image_path = "../frontend/uploads/trajneret/" . $course_image_path;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            
            echo json_encode(["success" => true, "message" => "Trajneri u fshi me sukses!"]);
        } else {
            throw new Exception("Diqka nuk shkoi mire.");
        }

        $conn->close();
    } else {
        throw new Exception("Unauthorized access!");
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
