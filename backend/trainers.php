<?php
header('Content-Type: application/json');

require 'database/connect.php';

try {
    $sql = "SELECT id, t_photo_path, t_name, t_position, t_description FROM trainers";
    $result = $conn->query($sql);

    if ($result === false) {
        http_response_code(500);
        echo json_encode(["message" => "Error retrieving courses: " . $conn->error]);
        exit();
    }

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    echo json_encode($courses);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => "An error occurred: " . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
