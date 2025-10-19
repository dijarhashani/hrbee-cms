<?php
require 'database/connect.php';

$secret_token = "hr/bee-admin@dijarbossi.com-hello";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_POST['token']) || $_POST['token'] !== $secret_token) {
            throw new Exception("Unauthorized access");
        }

        if (!isset($_POST['course_id']) || !is_numeric($_POST['course_id'])) {
            throw new Exception("Invalid course ID");
        }

        $course_id = intval($_POST['course_id']);

        // Prepare and execute the delete query
        $sql = "DELETE FROM `courses` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Failed to prepare the SQL statement.");
        }

        $stmt->bind_param("i", $course_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            
            $sql = "SELECT `course_image_path` FROM `courses` WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            
            if (!$stmt) {
                throw new Exception("Failed to prepare the SQL statement.");
            }

            $stmt->bind_param("i", $course_id);
            $stmt->execute();
            $stmt->bind_result($course_image_path);
            $stmt->fetch();
            $stmt->close();

            
            if ($course_image_path) {
                $image_path = "../frontend/uploads/programs/" . $course_image_path;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            
            echo json_encode(["success" => true, "message" => "Programi u fshi me sukses!"]);
        } else {
            throw new Exception("Duhet te fshini aplikantet perkates per program qe te fshini programin.");
        }

        $conn->close();
    } else {
        throw new Exception("Unauthorized access!");
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
