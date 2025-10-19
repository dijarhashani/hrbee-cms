<?php
header('Content-Type: application/json');

require 'database/connect.php';

try {
    
    $sql = 'SELECT a.name, a.surname, a.phone_number, a.id, c.course_name as course_name, c.status as course_status 
            FROM `applications` a 
            JOIN `courses` c ON a.course_id = c.id
            WHERE a.status = "p"';

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        http_response_code(500);
        echo json_encode(["message" => "Error preparing statement: " . $conn->error]);
        exit();
    }
    
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
