<?php
header('Content-Type: application/json');

require 'database/connect.php';

if (isset($_GET['shabllon_id']) && is_numeric($_GET['shabllon_id'])) {
    $shabllon_id = intval($_GET['shabllon_id']);

    $sql = "SELECT shabllon_text FROM shabllonat WHERE shabllon_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt->bind_param("i", $shabllon_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['shabllon_text' => $row['shabllon_text']]);
    } else {
        echo json_encode(['error' => 'No template found.']);
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode(['error' => 'Invalid template ID.']);
}
?>
