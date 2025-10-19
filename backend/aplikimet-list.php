<?php
header('Content-Type: application/json');

require 'database/connect.php';

try {
    if (!isset($_GET['id'])) {
        echo json_encode(["message" => "Course ID is not specified."]);
        exit;
    }
    
    $course_id = intval($_GET['id']);
    $sql = "SELECT id, name, surname, phone_number, status, time_r FROM applications WHERE course_id = ? ORDER BY applications . status ASC";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        http_response_code(500);
        echo json_encode(["message" => "Error preparing statement: " . $conn->error]);
        exit();
    }
    
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        http_response_code(500);
        echo json_encode(["message" => "Error retrieving applications: " . $stmt->error]);
        exit();
    }

    $applications = [];
    while ($row = $result->fetch_assoc()) {
        $applications[] = $row;
    }

    echo json_encode($applications);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => "An error occurred: " . $e->getMessage()]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($conn)) {
        $conn->close();
    }
}
?>
