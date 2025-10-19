<?php
session_start();


if (isset($_SESSION['reload_page']) && $_SESSION['reload_page'] === true) {
    $_SESSION['reload_page'] = false; 
    echo "<script>
    setTimeout(() => {
    location.reload();
    }, 1000);
    </script>";
    exit;
}
?>

