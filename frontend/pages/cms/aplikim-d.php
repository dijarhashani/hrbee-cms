<?php require 'components/header.php'; ?>
<style>
    @font-face {
        font-family: 'Regular';
        src: url("./frontend/assets/fonts/Poppins-Regular.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    .dash-text {
        position: absolute;
        top: 2.78vh;
        right: 1.56vw;
        color: #353572;
        font-size: 1.8vh;
        font-family: 'Regular';
        margin: 0;
        padding: 0;
    }
    main {
        position: absolute;
        top: 0;
        right: 0;
        width: 75vw;
        height: 100vh;
    }
    .wb-a {
        margin: 0;
        padding: 0;
        font-size: 4.56vh;
        font-family: 'Regular';
        color: #353572;
        font-weight: lighter;
    }
    .___l_add {
        margin-left: 3vw;
    }
    .___l_add a {
        padding: 1.5vh 2.5vw;
        color: white;
        text-decoration: none;
        font-size: 1.8vh;
        font-family: 'Regular';
        background: #9E258D;
        border-radius: 3vh;
        margin-right: 2vw;
        transition: background 0.3s ease-in-out;
    }
    .___l_add a:hover {
        background: #353572;
    }
    .p_header {
        display: flex;
        margin-top: 8.33vh;
        margin-left: 3.13vw;
        justify-content: flex-start;
        align-items: center;
    }
    ._dash_programet {
        width: 120% !important;
        background: #9E258D !important;
    }
    ._dash_programet h1 {
        color: white !important;
    }
    ._dash_programet svg g {
        stroke: white !important;
    }
    
</style>
<h1 class="dash-text">HRBEE ACADEMY CMS 1.0</h1>


<?php require 'components/popup-message.php'; ?>

<main>
<div class="p_header">
        <h1 class="wb-a">Detajet e Aplikimit</h1>
        <div class="___l_add">
            <a href="javascript:history.back()">Kthehu prapa</a>
        </div>
    </div>


    <?php require 'components/ap-d.php'; ?>

</main>




</body>
</html>