<?php
header('Content-Type: application/json');

require 'database/connect.php';

try {
    $sql = "SELECT id, course_category, course_name, start_date, course_image_path, status FROM courses ORDER BY courses . status ASC";
    $result = $conn->query($sql);

    if ($result === false) {
        http_response_code(500);
        echo json_encode(["message" => "Error retrieving courses: " . $conn->error]);
        exit();
    }

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        if (!is_null($row['course_image_path'])) {
            $row['course_image_path'] = $row['course_image_path'];
        }
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
