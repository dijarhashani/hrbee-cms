<?php
require 'database/connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';

    $filePath = '';

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = uniqid() . '.' . $fileExtension;
            $uploadFileDir = '../frontend/uploads/programs/';
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

    
    $sql_insert = "INSERT INTO courses (course_name, description, status, course_category, course_image_path, start_date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);

    if ($stmt_insert === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt_insert->bind_param("ssssss", $title, $text, $status, $category, $filePath, $start_date);
    $stmt_insert->execute();

    if ($stmt_insert->affected_rows > 0) {
        echo json_encode(['success' => 'Course added successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to add course.']);
    }

    $stmt_insert->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
