<?php

require 'database/connect.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$filename = "newsletter_" . date('Ymd') . ".csv";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);


$output = fopen('php://output', 'w');


$sql = "SELECT * FROM `subscribers`";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $columns = array();
    while ($fieldinfo = $result->fetch_field()) {
        $columns[] = $fieldinfo->name;
    }
    fputcsv($output, $columns);

  
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    echo "No data found.";
}


$conn->close();
fclose($output);
exit;
?>