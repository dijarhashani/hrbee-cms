<?php

$flagFile = 'config-setup-complete.flag';


if (file_exists($flagFile)) {
    echo 'Database is already configured.';
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $servername = $_POST['servername'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];

   
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        echo 'Database connection failed: ' . $conn->connect_error;
        exit();
    }

    
    $queries = [
        "CREATE TABLE IF NOT EXISTS `academy` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `academy_name` VARCHAR(255) DEFAULT NULL,
            `start_date` DATE DEFAULT NULL,
            `description` TEXT DEFAULT NULL,
            `academy_image` LONGBLOB DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `admin` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(100) NOT NULL,
            `email` VARCHAR(100) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            `photo` BLOB DEFAULT NULL,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        "INSERT INTO `admin` (`id`, `name`, `email`, `password`, `photo`, `created_at`, `updated_at`) VALUES 
            (1, 'Donart Zeqiri', 'admin@academy.hr-bee.com', '$2y$10$86LPjEf2xrc.xD/p23FNC.Ud6lpayhfmMXnucfNeidz7K02MvpM9W', NULL, NOW(), NOW())",
        "CREATE TABLE IF NOT EXISTS `applications` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `course_id` INT(11) NOT NULL,
            `name` VARCHAR(255) NOT NULL,
            `surname` VARCHAR(255) NOT NULL,
            `profession` VARCHAR(255) NOT NULL,
            `currently_working` VARCHAR(255) NOT NULL,
            `company` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `phone_number` VARCHAR(255) NOT NULL,
            `city` VARCHAR(255) NOT NULL,
            `source` VARCHAR(255) NOT NULL,
            `status` VARCHAR(255) NOT NULL,
            `time_r` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
            `faktura` VARCHAR(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `courses` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `course_category` TEXT NOT NULL,
            `course_name` VARCHAR(255) NOT NULL,
            `start_date` DATE NOT NULL,
            `description` TEXT DEFAULT NULL,
            `course_image` BLOB DEFAULT NULL,
            `status` VARCHAR(255) NOT NULL DEFAULT 'active',
            `course_image_path` VARCHAR(255) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `reviews` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` TEXT NOT NULL,
            `position` TEXT NOT NULL,
            `description` LONGTEXT NOT NULL,
            `picture` BLOB DEFAULT NULL,
            `photo_path` VARCHAR(255) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `shabllonat` (
            `shabllon_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `shabllon_name` VARCHAR(255) NOT NULL,
            `shabllon_text` LONGTEXT DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `subscribers` (
            `id` INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(50) NOT NULL,
            `email` VARCHAR(50) NOT NULL,
            `phone` VARCHAR(20) NOT NULL,
            `reg_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
        "CREATE TABLE IF NOT EXISTS `trainers` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `t_photo` BLOB DEFAULT NULL,
            `t_name` TEXT NOT NULL,
            `t_position` TEXT NOT NULL,
            `t_description` LONGTEXT DEFAULT NULL,
            `t_photo_path` VARCHAR(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
    ];

   
    foreach ($queries as $query) {
        if ($conn->query($query) !== TRUE) {
            echo "Error creating table: " . $conn->error;
            exit();
        }
    }


    file_put_contents($flagFile, 'Database setup completed on ' . date('Y-m-d H:i:s'));

   
    $configContent = "<?php\n";
    $configContent .= "\$servername = '$servername';\n";
    $configContent .= "\$username = '$username';\n";
    $configContent .= "\$password = '$password';\n";
    $configContent .= "\$dbname = '$dbname';\n";
    $configContent .= "\$conn = new mysqli(\$servername, \$username, \$password, \$dbname);\n";
    $configContent .= "if (\$conn->connect_error) {\n";
    $configContent .= "    http_response_code(500);\n";
    $configContent .= "    echo json_encode(['message' => 'Database connection failed']);\n";
    $configContent .= "    exit();\n";
    $configContent .= "}\n";
    $configContent .= "?>";

    file_put_contents('connect.php', $configContent);

   
    $conn->close();

    echo 'Database configuration completed successfully.';
    header('Location: home');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="frontend/assets/img/evolux_icon.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configure Database</title>
</head>

<style>
    html, body{
        overflow:hidden;
    }
    body{
        background:black;
        margin:0px;
        padding:0px;
    }
    .evolux_config{
        width: 100vw;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;

    }
    .logo{
        position:absolute;
        top:-10vh;
        right:-20vw;
    }
    .logo svg{
        width: 40vw;
        height:40vw;
    }
    .logo2{
        position:absolute;
        bottom:-10vh;
        left:-20vw;
    }
    .logo2 svg{
        width: 40vw;
        height:40vw;
    }
    .logo3{
        position:absolute;
        bottom:2vh;
        right:1.5vw;
    }
    .logo3 svg{
        width: 9vw;
        height: 5vh;
    }
    .logo3 path{
        fill:white;
    }
    .header_text h1{
        margin:0px;
        padding:0px;
        color:white;
        font-family: "Gill Sans", sans-serif;
        font-size:4vh;
        font-weight:lighter;
    }
    .header_text h3{
        margin:0px;
        padding:0px;
        color:white;
        font-family: "Gill Sans", sans-serif;
        font-size:2vh;
        font-weight:lighter;
        opacity:60%;
    }
    .header_text{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin-bottom:7vh;
    }
    .form{
        padding:6vh 10vw;
        background:black;
        border-radius:6vh;
        filter: drop-shadow(0px 0px 4vh rgba(255, 255, 255, 0.5));
    }
    .form form{
        width: 25vw;
        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-direction:column;
    }
    .form div{
        width: 100%;
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:2vh;
    }
    .form label{
        color:white;
        font-family: "Gill Sans", sans-serif;
        font-size:2vh;
        text-align:left;
       
        width: 40%;

    }
    .form input{
        background:black;
        border:0px;
        color:white;
        border-bottom:.1vh solid white;
        width: 60%;
        outline:none;
        padding:1vh 2vw;
        font-family: "Gill Sans", sans-serif;
        font-size:2vh;

    }
    .sbn{
        color:white;
        border:.1vh solid white !important;
        padding:2vh 2vw !important;
        border-radius:3vh;
        font-family: "Gill Sans", sans-serif !important;
        font-size:2vh !important;
        cursor:pointer;
        margin-top:3vh;
        transition:all .3s ease-in-out;
    }
    .sbn:hover{
        color:black;
        background:white;
    }
    .note p{
        margin:0px;
        padding:0px;
        color:white;
        font-family: "Gill Sans", sans-serif;
        font-size:2vh;
        font-weight:lighter;
        opacity:60%;
    }
    .note{
        margin-top:7vh;
    }
</style>
<body>
    <div class="evolux_config">
        <div class="header_text">
            <h1>WELCOME TO CMS CONFIGURATION</h1>
            <h3>Please enter all the information of your database below!</h3>
        </div>
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="404.254" height="404.979" viewBox="0 0 404.254 404.979">
                    <defs>
                        <filter id="Rectangle_11">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur"/>
                        <feFlood flood-opacity="0.161" result="color"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur"/>
                        <feComposite operator="in" in="color"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_32">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-2"/>
                        <feFlood flood-opacity="0.161" result="color-2"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-2"/>
                        <feComposite operator="in" in="color-2"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_33">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-3"/>
                        <feFlood flood-opacity="0.161" result="color-3"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-3"/>
                        <feComposite operator="in" in="color-3"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_34">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-4"/>
                        <feFlood flood-opacity="0.161" result="color-4"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-4"/>
                        <feComposite operator="in" in="color-4"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_35">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-5"/>
                        <feFlood flood-opacity="0.161" result="color-5"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-5"/>
                        <feComposite operator="in" in="color-5"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_36">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-6"/>
                        <feFlood flood-opacity="0.161" result="color-6"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-6"/>
                        <feComposite operator="in" in="color-6"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                    </defs>
                    <g id="Group_89" data-name="Group 89" transform="translate(-6286.48 -3065.98)">
                        <g id="Group_20" data-name="Group 20" transform="translate(6189.807 2713.179)">
                        <g id="Group_1" data-name="Group 1" transform="translate(97.234 557.733) rotate(-45)">
                            <path id="Path_1" data-name="Path 1" d="M0,0H200.518V58.468H0Z" transform="translate(87.8 0.562)" fill="#fff" opacity="0.704"/>
                            <path id="Path_2" data-name="Path 2" d="M0,0H180.178V58.468H0Z" transform="translate(87.8 112.221)" fill="#fff" opacity="0.705"/>
                            <rect id="Rectangle_2" data-name="Rectangle 2" width="227.629" height="25.86" transform="translate(45.526 230.628)" fill="#fff"/>
                            <rect id="Rectangle_3" data-name="Rectangle 3" width="31.218" height="256.488" transform="translate(30.567 0)" fill="#fff"/>
                            <path id="Path_3" data-name="Path 3" d="M0,0H241.823V58.466H0V0Z" transform="translate(46.176 224.444)" fill="#fff"/>
                            <rect id="Rectangle_4" data-name="Rectangle 4" width="67.638" height="282.91" transform="translate(0 0)" fill="#fff"/>
                        </g>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_11)">
                        <rect id="Rectangle_11-2" data-name="Rectangle 11" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_32)">
                        <rect id="Rectangle_32-2" data-name="Rectangle 32" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_33)">
                        <rect id="Rectangle_33-2" data-name="Rectangle 33" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_34)">
                        <rect id="Rectangle_34-2" data-name="Rectangle 34" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_35)">
                        <rect id="Rectangle_35-2" data-name="Rectangle 35" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_36)">
                        <rect id="Rectangle_36-2" data-name="Rectangle 36" width="404" height="404" fill="#fff"/>
                        </g>
                    </g>
                    </svg>


        </div>
        <div class="logo2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="404.254" height="404.979" viewBox="0 0 404.254 404.979">
                    <defs>
                        <filter id="Rectangle_11">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur"/>
                        <feFlood flood-opacity="0.161" result="color"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur"/>
                        <feComposite operator="in" in="color"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_32">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-2"/>
                        <feFlood flood-opacity="0.161" result="color-2"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-2"/>
                        <feComposite operator="in" in="color-2"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_33">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-3"/>
                        <feFlood flood-opacity="0.161" result="color-3"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-3"/>
                        <feComposite operator="in" in="color-3"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_34">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-4"/>
                        <feFlood flood-opacity="0.161" result="color-4"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-4"/>
                        <feComposite operator="in" in="color-4"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_35">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-5"/>
                        <feFlood flood-opacity="0.161" result="color-5"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-5"/>
                        <feComposite operator="in" in="color-5"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                        <filter id="Rectangle_36">
                        <feOffset dx="-74" dy="108" input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-6"/>
                        <feFlood flood-opacity="0.161" result="color-6"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-6"/>
                        <feComposite operator="in" in="color-6"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        </filter>
                    </defs>
                    <g id="Group_89" data-name="Group 89" transform="translate(-6286.48 -3065.98)">
                        <g id="Group_20" data-name="Group 20" transform="translate(6189.807 2713.179)">
                        <g id="Group_1" data-name="Group 1" transform="translate(97.234 557.733) rotate(-45)">
                            <path id="Path_1" data-name="Path 1" d="M0,0H200.518V58.468H0Z" transform="translate(87.8 0.562)" fill="#fff" opacity="0.704"/>
                            <path id="Path_2" data-name="Path 2" d="M0,0H180.178V58.468H0Z" transform="translate(87.8 112.221)" fill="#fff" opacity="0.705"/>
                            <rect id="Rectangle_2" data-name="Rectangle 2" width="227.629" height="25.86" transform="translate(45.526 230.628)" fill="#fff"/>
                            <rect id="Rectangle_3" data-name="Rectangle 3" width="31.218" height="256.488" transform="translate(30.567 0)" fill="#fff"/>
                            <path id="Path_3" data-name="Path 3" d="M0,0H241.823V58.466H0V0Z" transform="translate(46.176 224.444)" fill="#fff"/>
                            <rect id="Rectangle_4" data-name="Rectangle 4" width="67.638" height="282.91" transform="translate(0 0)" fill="#fff"/>
                        </g>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_11)">
                        <rect id="Rectangle_11-2" data-name="Rectangle 11" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_32)">
                        <rect id="Rectangle_32-2" data-name="Rectangle 32" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_33)">
                        <rect id="Rectangle_33-2" data-name="Rectangle 33" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_34)">
                        <rect id="Rectangle_34-2" data-name="Rectangle 34" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_35)">
                        <rect id="Rectangle_35-2" data-name="Rectangle 35" width="404" height="404" fill="#fff"/>
                        </g>
                        <g transform="matrix(1, 0, 0, 1, 6286.48, 3065.98)" filter="url(#Rectangle_36)">
                        <rect id="Rectangle_36-2" data-name="Rectangle 36" width="404" height="404" fill="#fff"/>
                        </g>
                    </g>
                    </svg>


        </div>

        <div class="logo3">
                    <svg width="91" height="20" viewBox="0 0 91 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.158 14.624L10.92 15.59H2.492V19.02H13.636L13.398 20H1.54V14.624H11.158ZM1.54 10.214H13.636L13.398 11.194H1.54V10.214Z" fill="black"/>
            <path d="M17.6751 10.214H18.7671L23.6391 19.076L28.5251 10.214H29.6171L24.2411 20H23.0511L17.6751 10.214Z" fill="black"/>
            <path d="M35.1395 10.214H41.9575C42.3215 10.214 42.6668 10.284 42.9935 10.424C43.3201 10.564 43.6001 10.76 43.8335 11.012C44.0761 11.2547 44.2675 11.5393 44.4075 11.866C44.5475 12.1927 44.6175 12.538 44.6175 12.902V17.312C44.6175 17.6853 44.5475 18.0353 44.4075 18.362C44.2675 18.6887 44.0761 18.9733 43.8335 19.216C43.6001 19.4587 43.3201 19.65 42.9935 19.79C42.6668 19.93 42.3215 20 41.9575 20H35.1395C34.7755 20 34.4301 19.93 34.1035 19.79C33.7768 19.65 33.4921 19.4587 33.2495 19.216C33.0161 18.9733 32.8295 18.6887 32.6895 18.362C32.5495 18.0353 32.4795 17.6853 32.4795 17.312V12.902C32.4795 12.538 32.5495 12.1927 32.6895 11.866C32.8295 11.5393 33.0161 11.2547 33.2495 11.012C33.4921 10.76 33.7768 10.564 34.1035 10.424C34.4301 10.284 34.7755 10.214 35.1395 10.214ZM33.4455 17.312C33.4455 17.5453 33.4875 17.7693 33.5715 17.984C33.6648 18.1893 33.7861 18.3713 33.9355 18.53C34.0941 18.6793 34.2761 18.8007 34.4815 18.894C34.6868 18.9873 34.9061 19.034 35.1395 19.034H41.9575C42.1908 19.034 42.4101 18.9873 42.6155 18.894C42.8301 18.8007 43.0121 18.6793 43.1615 18.53C43.3201 18.3713 43.4415 18.1893 43.5255 17.984C43.6188 17.7693 43.6655 17.5453 43.6655 17.312V12.902C43.6655 12.6687 43.6188 12.4493 43.5255 12.244C43.4415 12.0293 43.3201 11.8473 43.1615 11.698C43.0121 11.5393 42.8301 11.418 42.6155 11.334C42.4101 11.2407 42.1908 11.194 41.9575 11.194H35.1395C34.9061 11.194 34.6868 11.2407 34.4815 11.334C34.2761 11.418 34.0941 11.5393 33.9355 11.698C33.7861 11.8473 33.6648 12.0293 33.5715 12.244C33.4875 12.4493 33.4455 12.6687 33.4455 12.902V17.312Z" fill="black"/>
            <path d="M49.2225 10.214V19.02H60.3665L60.1285 20H48.2705V10.214H49.2225Z" fill="black"/>
            <path d="M63.3232 10.214H64.2892V17.312C64.2892 17.5453 64.3312 17.7693 64.4152 17.984C64.5085 18.1893 64.6299 18.3713 64.7792 18.53C64.9379 18.6793 65.1199 18.8007 65.3252 18.894C65.5305 18.9873 65.7499 19.034 65.9832 19.034H72.8012C73.0345 19.034 73.2539 18.9873 73.4592 18.894C73.6739 18.8007 73.8559 18.6793 74.0052 18.53C74.1639 18.3713 74.2852 18.1893 74.3692 17.984C74.4625 17.7693 74.5092 17.5453 74.5092 17.312V10.214H75.4612V17.312C75.4612 17.6853 75.3912 18.0353 75.2512 18.362C75.1112 18.6887 74.9199 18.9733 74.6772 19.216C74.4439 19.4587 74.1639 19.65 73.8372 19.79C73.5105 19.93 73.1652 20 72.8012 20H65.9832C65.6192 20 65.2739 19.93 64.9472 19.79C64.6205 19.65 64.3359 19.4587 64.0932 19.216C63.8599 18.9733 63.6732 18.6887 63.5332 18.362C63.3932 18.0353 63.3232 17.6853 63.3232 17.312V10.214Z" fill="black"/>
            <path d="M80.0279 10.214L84.4379 14.442L88.8479 10.214H90.2899L85.1379 15.114L90.2899 20H88.8619L84.4379 15.772L80.0279 20H78.5999L83.7379 15.114L78.5999 10.214H80.0279Z" fill="black"/>
            <path d="M1.51855 4.17773V7H0.932617V0.369141H3.6377C4.27246 0.369141 4.78027 0.544922 5.16113 0.891602C5.54199 1.24316 5.73242 1.70703 5.73242 2.2832C5.73242 2.85449 5.54199 3.31348 5.16113 3.66016C4.78027 4.00684 4.27246 4.17773 3.6377 4.17773H1.51855ZM3.6084 0.896484H1.51855V3.65039H3.6084C4.58984 3.65039 5.13184 3.12793 5.13184 2.2832C5.13184 1.42383 4.58984 0.896484 3.6084 0.896484Z" fill="black"/>
            <path d="M11.4258 4.65625C11.4258 6.07227 10.3369 7.09766 8.93555 7.09766C7.53418 7.09766 6.44531 6.07227 6.44531 4.65625C6.44531 3.24023 7.53418 2.21484 8.93555 2.21484C10.3369 2.21484 11.4258 3.24023 11.4258 4.65625ZM8.93555 2.75195C7.84668 2.75195 7.03125 3.56738 7.03125 4.65625C7.03125 5.74023 7.85156 6.56055 8.93555 6.56055C10.0195 6.56055 10.8398 5.74023 10.8398 4.65625C10.8398 3.5625 10.0293 2.75195 8.93555 2.75195Z" fill="black"/>
            <path d="M13.6719 7L12.1289 2.3125H12.7539L14.0527 6.46777L15.498 2.36133H16.123L17.5684 6.47266L18.8672 2.3125H19.4922L17.9492 7H17.1875L15.8105 3.2207L14.4336 7H13.6719Z" fill="black"/>
            <path d="M20.2002 4.65625C20.2002 3.26953 21.2158 2.21484 22.6123 2.21484C23.3008 2.21484 23.8525 2.4248 24.2627 2.83984C24.6729 3.25977 24.8779 3.77734 24.8828 4.39746C24.8828 4.5293 24.873 4.66602 24.8535 4.80273H20.8008C20.8691 5.81836 21.6602 6.56055 22.6758 6.56055C23.335 6.56055 23.9307 6.25781 24.3213 5.74512L24.7559 6.0625C24.2969 6.75586 23.4814 7.09766 22.666 7.09766C21.958 7.09766 21.3672 6.86328 20.9033 6.38965C20.4346 5.9209 20.2002 5.34473 20.2002 4.65625ZM22.6123 2.75195C21.6846 2.75195 20.9082 3.34766 20.835 4.30469H24.3066C24.2578 3.37695 23.5254 2.75195 22.6123 2.75195Z" fill="black"/>
            <path d="M26.7773 7H26.1865V2.3125H26.7725V3.05957C27.0264 2.49805 27.5098 2.21484 28.0811 2.21484C28.3496 2.21484 28.5791 2.25391 28.7695 2.33691L28.7109 2.88379C28.4912 2.80078 28.2715 2.75684 28.0518 2.75684C27.6758 2.75684 27.3682 2.89355 27.1338 3.17188C26.8945 3.4502 26.7773 3.84082 26.7773 4.34863V7Z" fill="black"/>
            <path d="M31.709 7.09766C31.0352 7.09766 30.4736 6.86328 30.0195 6.39453C29.5654 5.92578 29.3359 5.34961 29.3359 4.66113C29.3359 3.97266 29.5654 3.3916 30.0195 2.91797C30.4736 2.44922 31.0352 2.21484 31.709 2.21484C32.1338 2.21484 32.5195 2.30762 32.8613 2.49316C33.2031 2.67871 33.4668 2.91797 33.6523 3.21582V0.125H34.2383V7H33.6523V6.11133C33.4668 6.4043 33.2031 6.64355 32.8613 6.82422C32.5195 7.00488 32.1338 7.09766 31.709 7.09766ZM31.748 2.75195C31.2256 2.75195 30.7861 2.93262 30.4395 3.29883C30.0879 3.66504 29.9121 4.11914 29.9121 4.66113C29.9121 5.19824 30.0879 5.64746 30.4395 6.01367C30.7861 6.37988 31.2256 6.56055 31.748 6.56055C32.2998 6.56055 32.7588 6.37988 33.1299 6.01367C33.4961 5.64746 33.6816 5.19824 33.6816 4.66113C33.6816 4.11914 33.4961 3.66504 33.1299 3.29883C32.7588 2.93262 32.2998 2.75195 31.748 2.75195Z" fill="black"/>
            <path d="M38.6377 7H38.0518V0.125H38.6377V3.21582C38.8232 2.91797 39.0869 2.67871 39.4287 2.49316C39.7705 2.30762 40.1562 2.21484 40.5811 2.21484C41.2549 2.21484 41.8213 2.44922 42.2754 2.91797C42.7295 3.3916 42.9541 3.97266 42.9541 4.66113C42.9541 5.34961 42.7295 5.92578 42.2754 6.39453C41.8213 6.86328 41.2549 7.09766 40.5811 7.09766C40.1562 7.09766 39.7705 7.00488 39.4287 6.82422C39.0869 6.64355 38.8232 6.4043 38.6377 6.11133V7ZM40.542 2.75195C39.9902 2.75195 39.5312 2.93262 39.165 3.29883C38.7939 3.66504 38.6084 4.11914 38.6084 4.66113C38.6084 5.19824 38.7939 5.64746 39.165 6.01367C39.5312 6.37988 39.9902 6.56055 40.542 6.56055C41.0645 6.56055 41.5039 6.37988 41.8555 6.01367C42.2021 5.64746 42.3779 5.19824 42.3779 4.66113C42.3779 4.11914 42.2021 3.66504 41.8555 3.29883C41.5039 2.93262 41.0645 2.75195 40.542 2.75195Z" fill="black"/>
            <path d="M45.498 7.36133L45.5615 7.19531L43.5303 2.3125H44.1553L45.8887 6.47266L47.5732 2.3125H48.2178L46.04 7.5957C45.625 8.60645 45.1318 9.05078 44.3896 9.05078C44.0283 9.05078 43.7549 8.99707 43.5645 8.89453L43.6426 8.38184C43.8525 8.46973 44.0869 8.51367 44.3457 8.51367C44.79 8.51367 45.2002 8.1377 45.498 7.36133Z" fill="black"/>
            <path d="M49.2041 2.92773C49.0674 2.79102 49.0674 2.53711 49.2041 2.40039C49.3408 2.26367 49.5947 2.26367 49.7363 2.40039C49.873 2.53711 49.873 2.79102 49.7363 2.92773C49.5947 3.06445 49.3408 3.06445 49.2041 2.92773ZM49.7363 6.93164C49.5947 7.06836 49.3408 7.06836 49.2041 6.93164C49.0674 6.79492 49.0674 6.54102 49.2041 6.4043C49.3408 6.26758 49.5947 6.26758 49.7363 6.4043C49.873 6.54102 49.873 6.79492 49.7363 6.93164Z" fill="black"/>
            </svg>

        </div>
        <div class="form">
            <form method="post" action="">
                <div>
                <label for="servername">Server Name:</label>
                <input type="text" id="servername" name="servername" required><br><br>
                </div>
                <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                </div>
                <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" ><br><br>
                </div>
                <div>
                <label for="dbname">Database Name:</label>
                <input type="text" id="dbname" name="dbname" required><br><br>
                </div>

                <input class="sbn" type="submit" value="Configure Database">
            </form>
        </div>
        <div class="note">
            <p>Note: If you face errors or something that is not working properly, please contact EvoLux Digital.</p>
        </div>
    </div>
    
    
</body>
</html>
