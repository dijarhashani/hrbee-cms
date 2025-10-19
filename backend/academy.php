<?php
header('Content-Type: application/json');

require 'database/connect.php';



try {
    $sql = "SELECT id, academy_name, start_date, academy_image FROM academy";
    $result = $conn->query($sql);

    if ($result === false) {
        http_response_code(500);
        echo json_encode(["message" => "Error retrieving academy: " . $conn->error]);
        exit();
    }

    $academys = [];
    while ($row = $result->fetch_assoc()) {
        if (!is_null($row['academy_image'])) {
            $row['academy_image'] = base64_encode($row['academy_image']);
        }
        $academys[] = $row;
    }

    echo json_encode($academys);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => "An error occurred: " . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
