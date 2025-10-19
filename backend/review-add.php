<?php
require 'database/connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $position = isset($_POST['position']) ? $_POST['position'] : '';

    $filePath = '';

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = uniqid() . '.' . $fileExtension;
            $uploadFileDir = '../frontend/uploads/reviews/';
            $destPath = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $filePath = $newFileName;
            } else {
                echo json_encode(['error' => 'File upload failed.']);
                exit;
            }
        } else {
            echo json_encode(['error' => 'Invalid file type.']);
            exit;
        }
    }

    
    $sql_insert = "INSERT INTO reviews (name, description, position, photo_path) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);

    if ($stmt_insert === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt_insert->bind_param("ssss", $name, $description, $position, $filePath);
    $stmt_insert->execute();

    if ($stmt_insert->affected_rows > 0) {
        echo json_encode(['success' => 'Vleresimi u shtua me sukses.']);
    } else {
        echo json_encode(['error' => 'Ka deshtar shtimi i Vleresimit.']);
    }

    $stmt_insert->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
