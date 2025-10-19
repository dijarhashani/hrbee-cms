<?php
header('Content-Type: application/json');

require 'database/connect.php';

try {
   
    
    
    $sql = "SELECT id, t_name, t_position, t_description, t_photo_path FROM trainers";
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
