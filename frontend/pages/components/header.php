<?php 
// Component: Header
// Author: Dijar Hashani




$flagFile = dirname(__DIR__, 3) . '/backend/database/config-setup-complete.flag';

define('ACCESS_GRANTED', true);
if (!file_exists($flagFile)) {
    
    header('Location: evolux-config');
    exit();
}

session_start();

require 'components/links.php';


$current_page = basename($_SERVER['PHP_SELF']);
$logo = '../assets/img/logo.svg';
$icon = 'frontend/assets/img/icon.png';
?>

<style>
    .logo svg{
        width: 8.953125vw !important;
    }
    .logo{
        position:absolute;
        display:flex;
        justify-content:center;
        align-items:center;
        width: 80%;
        z-index:-1;

    }
    .nav a{
        font-family: 'Regular', sans-serif;
        color:#353572;
        text-decoration:none;
        text-transform: uppercase;
        font-size: 1.811111111111111vh !important;
        transition: font-weight 0.3s ease;
    }
    
.menu{
    width: 76vw !important;
    height:14.111111vh !important;
    position:fixed !important;
    padding: 0px 12vw !important;
    z-index:10;

}

.active a{
    font-family: 'Extra Bold', sans-serif !important;
    font-weight: bolder;
}
#loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    opacity: 1;
    transition: opacity 1s ease-out;
}


.loader {
    animation: shadowBlink 1.5s ease-in-out infinite alternate;
}
.loader svg{
    width: 40vw;
    height: 10vh;
}

@keyframes shadowBlink {
    0% {
        filter: drop-shadow(0 0 0px #F4F4F4);
    }
    100% {
        filter: drop-shadow(0 0 .1vh #F4F4F4);
    }
}


.final-shadow {
    filter: drop-shadow(0 0 .1vh #F4F4F4);
    animation: none;
}


   
</style>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frontend/assets/css/header.css">
    <link rel="icon" href="<?php echo $icon;?>" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <title>HR Bee Academy</title>
</head>
<body>

<?php 
if ($current_page == 'home.php') { 
    ?>
<div id="loading-screen">
    <div class="loader">
        <?php echo file_get_contents($logo); ?>
    </div>
</div>

<?php 
} 
?>


<header class="window">
<div <?php echo ($current_page == 'home.php') ? 'data-aos="fade-down"' : ''; ?> class="menu">
    <div class="nav">
        <ul>
            <li <?php echo ($current_page == 'home.php') ? 'data-aos="fade"' : ''; ?> class="<?php echo ($current_page == 'home.php') ? 'active' : ''; ?>"><a href="<?php echo $home_link;?>">Për ne</a></li>
            <li <?php echo ($current_page == 'home.php') ? 'data-aos="fade"' : ''; ?> class="<?php echo ($current_page == 'programs.php') ? 'active' : ''; ?>"><a href="<?php echo $programs_link;?>">Programet</a></li>
            <li <?php echo ($current_page == 'home.php') ? 'data-aos="fade"' : ''; ?> class="<?php echo ($current_page == 'hr-blog.php') ? 'active' : ''; ?>"><a href="<?php echo $hr_blog_link;?>">Hr Blog</a></li>
        </ul>
    </div>
    <div <?php echo ($current_page == 'home.php') ? 'data-aos="fade"' : ''; ?> class="logo">
        <a href="home">
        <?php echo file_get_contents($logo); ?>
        </a>
    </div>
    <div class="nav">
        <ul>
            <li <?php echo ($current_page == 'home.php') ? 'data-aos="fade"' : ''; ?> class="<?php echo ($current_page == 'trainers.php') ? 'active' : ''; ?>"><a href="<?php echo $trainers_link;?>">Ligjerues</a></li>

            <?php
                if (isset($_COOKIE['user_id'])) {
                    
                    echo '<li ' . ($current_page == 'home.php' ? 'data-aos="fade"' : '') . '><a href="dashboard">Dashboard</a></li>';

                } else {
                    
                    echo '<li'  . ($current_page == 'home.php' ? 'data-aos="fade"' : '') . '><a href="' . $login_link . '">Kycu</a></li>';
                }
                ?>
        </ul>
    </div>
    
</div>


</header>


<style>
    .responsive{
        width: 100vw;
        background: white;
        filter: drop-shadow(0 0 1vh #B7B7B7);
        z-index: 100;
        display: none;
        position: fixed;
        justify-content: center;
        height: 10vh;
        align-items: center;
    }
    .r_burger {
        width: 9vw;
        height: 2.7vh; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        cursor: pointer;
        position: absolute;
        left: 5vw;
    }

    .r_burger .r_line {
        width: 100%;
        height: 0.4vh;
        background-color: #353572;
        border-radius: 2px; 
    }
    .r_nav {
        position: fixed;
        width: 100vw;
        top: 0;
        left: -100vw; 
        height: 100vh;
        background: white;
        z-index: 100000;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        transition: left 0.3s ease-in-out; 
    }
    .r_nav.open {
        left: 0; 
    }
    .r_nav ul {
        padding-left: 10vw;
    }
    .r_nav li {
        list-style: none;
        margin-bottom: 2vh;
    }
    .r_nav li a {
        color: #353572;
        font-size: 5vh;
        text-decoration: none;
        font-family: 'Regular';
    }
    .r_nav .close-btn {
        position: absolute;
        top: 5vw;
        right: 5vw;
        font-size: 7vh;
        font-family: 'Regular';
        color: #353572;
        cursor: pointer;
    }
    .r_logo svg {
        width: 25vw;
        height: 5vh;
    }
    .r_close-btn{
        position: absolute;
        top: 3vh;
        left: 6vw;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<header <?php echo ($current_page == 'home.php') ? 'data-aos="fade-down"' : ''; ?> class="responsive">
    <div <?php echo ($current_page == 'home.php') ? 'data-aos="fade-right"' : ''; ?> class="r_burger">
        <div class="r_line"></div>
        <div class="r_line"></div>
        <div class="r_line"></div>
    </div>

    <div <?php echo ($current_page == 'home.php') ? 'data-aos="fade"' : ''; ?> class="r_logo">
        <a href="home">
        <?php echo file_get_contents($logo); ?>
        </a>
    </div>  

    <div class="r_nav">
        <div class="r_close-btn">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="5" y1="5" x2="35" y2="35" stroke="#353572" stroke-width="3" stroke-linecap="round"/>
                <line x1="35" y1="5" x2="5" y2="35" stroke="#353572" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div> 
        <ul>
            <li class="<?php echo ($current_page == 'home.php') ? 'active' : ''; ?>"><a href="<?php echo $home_link;?>">Për ne</a></li>
            <li class="<?php echo ($current_page == 'programs.php') ? 'active' : ''; ?>"><a href="<?php echo $programs_link;?>">Programet</a></li>
            <li class="<?php echo ($current_page == 'hr-blog.php') ? 'active' : ''; ?>"><a href="<?php echo $hr_blog_link;?>">Hr Blog</a></li>
            <li class="<?php echo ($current_page == 'trainers.php') ? 'active' : ''; ?>"><a href="<?php echo $trainers_link;?>">Ligjerues</a></li>
        </ul>
    </div>
</header>

<script>
    document.querySelector('.r_burger').addEventListener('click', function() {
        document.querySelector('.r_nav').classList.add('open');
    });

    document.querySelector('.r_close-btn').addEventListener('click', function() {
        document.querySelector('.r_nav').classList.remove('open');
    });
</script>


<style>
    @media screen and (max-width: 1000px) {
    .window{
        display:none !important;
    }
    .responsive{
        display:flex !important;
    }
}



text {
      font-family: 'Regular';
    }
</style>