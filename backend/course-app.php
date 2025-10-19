<?php
header('Content-Type: application/json');


error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'database/connect.php';

try {
    
    $sql = "
        SELECT 
            course_id, 
            COUNT(id) AS applicant_count
        FROM 
            applications
        GROUP BY 
            course_id";

    $result = $conn->query($sql);

    if ($result === false) {
        http_response_code(500);
        echo json_encode(["message" => "Error retrieving applicant counts: " . $conn->error]);
        exit();
    }

    $applicantCounts = [];
    while ($row = $result->fetch_assoc()) {
        $applicantCounts[$row['course_id']] = $row['applicant_count'];
    }

    echo json_encode($applicantCounts);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => "An error occurred: " . $e->getMessage()]);
} finally {
    $conn->close();
}
