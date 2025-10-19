<?php require 'components/header.php'; ?>
<style>
    @font-face {
        font-family: 'Regular';
        src: url("./frontend/assets/fonts/Poppins-Regular.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    .dash-text{
        position:absolute;
        top:2.777777777777778vh;
        right:1.5625vw;
        color:#353572;
        font-size:1.8vh;
        font-family:'Regular';
        margin:0px;
        padding:0px;
    }
    main{
        position:absolute;
        top:0px;
        right:0px;
        width: 75vw;
        height:100vh;
    }
    .wb-a{
        margin:0px;
        padding:0px;
        margin-top:8.333333333vh;
        margin-left:3.125vw;
        font-size:4.55555555vh;
        font-family:'Regular';
        color:#353572;
        font-weight:lighter;
    }
</style>
<h1 class="dash-text">HRBEE ACADEMY CMS 1.0</h1>
<?php require 'components/popup-message.php'; ?>
<main>
<h1 class="wb-a">Kandidatët Potencial</h1>

<?php require 'components/potencial.php'; ?> 
</main>



</body>
</html>