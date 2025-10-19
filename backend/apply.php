<?php
require 'database/connect.php';


$secret_token = "hr/bee-admin@dijarbossi.com-hello";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (!isset($_POST['token']) || $_POST['token'] !== $secret_token) {
        echo json_encode(["success" => false, "message" => "Unauthorized access"]);
        exit;
    }

   
    $course_id = intval($_POST['course_id']);
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $profession = htmlspecialchars($_POST['profession']);
    $currently_working = htmlspecialchars($_POST['currently_working']);
    $company = htmlspecialchars($_POST['company']);
    $email = htmlspecialchars($_POST['email']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $city = htmlspecialchars($_POST['city']);
    $source = htmlspecialchars($_POST['source']);
    $status = "a";

    
    $sql = "INSERT INTO applications (course_id, name, surname, profession, currently_working, company, email, phone_number, city, source, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssssss", $course_id, $name, $surname, $profession, $currently_working, $company, $email, $phone_number, $city, $source, $status);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Jeni aplikuar me sukses!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Aplikimi ka deshtuar ju lutem provoni perseri!"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Error:403 Hyrje e pa autorizuar!"]);
}
?>
