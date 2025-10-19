<?php
require 'database/connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trajner_id = isset($_POST['trajner_id']) ? intval($_POST['trajner_id']) : 0;
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
            $uploadFileDir = '../frontend/uploads/trajneret/';
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

    
    $sql_select = "SELECT t_photo_path FROM trainers WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);

    if ($stmt_select === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt_select->bind_param("i", $trajner_id);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();

    if ($result_select->num_rows > 0) {
        $row_select = $result_select->fetch_assoc();
        if ($filePath === null) {
            $filePath = $row_select['t_photo_path'];
        }
    } else {
        echo json_encode(['error' => 'Course not found.']);
        exit;
    }

    $stmt_select->close();

   
    $sql = "UPDATE trainers SET t_name = ?, t_description = ?, t_position = ?, t_photo_path = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt->bind_param("ssssi", $name, $description, $position, $filePath, $trajner_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => 'Trajneri u ndryshua me sukses.']);
    } else {
        echo json_encode(['error' => 'Asnje ndryshim nuk u be. Ju lutem ndryshoni Trajnerin.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
