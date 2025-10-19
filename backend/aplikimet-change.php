<?php
require 'database/connect.php';

$secret_token = "hr/bee-admin@dijarbossi.com-hello";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!isset($_POST['token']) || $_POST['token'] !== $secret_token) {
            throw new Exception("Unauthorized access");
        }

        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            throw new Exception("Invalid application ID");
        }

        $application_id = intval($_POST['id']);
        $course_id = intval($_POST['course_id']);
        $name = htmlspecialchars(trim($_POST['name']));
        $surname = htmlspecialchars(trim($_POST['surname']));
        $profession = htmlspecialchars(trim($_POST['profession']));
        $currently_working = htmlspecialchars(trim($_POST['apa']));
        $company = htmlspecialchars(trim($_POST['company']));
        $email = htmlspecialchars(trim($_POST['email']));
        $phone_number = htmlspecialchars(trim($_POST['tel']));
        $city = htmlspecialchars(trim($_POST['city']));
        $heard_about = htmlspecialchars(trim($_POST['heard_about']));
        $status = htmlspecialchars(trim($_POST['status']));
        $faktura = htmlspecialchars(trim($_POST['faktura']));

        $sql = "UPDATE applications SET name=?, surname=?, course_id=?, profession=?, currently_working=?, company=?, email=?, phone_number=?, city=?, source=?, status=?, faktura=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssssssssi", $name, $surname, $course_id, $profession, $currently_working, $company, $email, $phone_number, $city, $heard_about, $status, $faktura, $application_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Application u perditesua me sukses!"]);
        } else {
            throw new Exception("Ka deshtuar perditesimi i aplikantit.");
        }

        $stmt->close();
        $conn->close();
    } else {
        throw new Exception("Unauthorized access!");
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
