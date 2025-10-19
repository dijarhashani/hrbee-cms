<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_COOKIE['user_id'])) {
        
        setcookie('user_id', '', time() - 3600, '/');
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'no_cookie']);
    }
    exit();
} else {
    echo json_encode(['status' => 'invalid_request']);
    exit();
}
?>