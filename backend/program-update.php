<?php
require 'database/connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;
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
    } else {
        $filePath = null;
    }

    
    $sql_select = "SELECT course_image_path FROM courses WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);

    if ($stmt_select === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt_select->bind_param("i", $course_id);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();

    if ($result_select->num_rows > 0) {
        $row_select = $result_select->fetch_assoc();
        if ($filePath === null) {
            $filePath = $row_select['course_image_path'];
        }
    } else {
        echo json_encode(['error' => 'Course not found.']);
        exit;
    }

    $stmt_select->close();

   
    $sql = "UPDATE courses SET course_name = ?, description = ?, status = ?, course_category = ?, course_image_path = ?, start_date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt->bind_param("ssssssi", $title, $text, $status, $category, $filePath, $start_date, $course_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => 'Programi u ndryshua me sukses.']);
    } else {
        echo json_encode(['error' => 'Asnje ndryshim nuk u be. Ju lutem ndryshoni programin.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
