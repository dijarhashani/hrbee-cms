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
        font-size:4.55555555vh;
        font-family:'Regular';
        color:#353572;
        font-weight:lighter;
    }
    .___l_add{
        margin-left:3vw;
    }
    .___l_add a{
        padding:1.5vh 2.5vw;
        color:white;
        text-decoration:none;
        font-size:1.8vh;
        font-family:'Regular';
        background:#9E258D;
        border-radius:3vh;
        margin-right:2vw;
        transition:background .3s ease-in-out;
    }
    .___l_add a:hover{
        background:#353572;
    } 
    .p_header{
        display:flex;
        margin-top:8.333333333vh;
        margin-left:3.125vw;
        justify-content:flex-start;
        align-items:center;
    }
    ._dash_review  {
        width: 120% !important;
        background: #9E258D !important;
    }
    ._dash_review  h1 {
        color: white !important;
    }
    ._dash_review  svg g {
        stroke: white !important;
    }
    ._dash_review path {
        fill: white !important;
    }
   
    

</style>
<h1 class="dash-text">HRBEE ACADEMY CMS 1.0</h1>

<?php require 'components/popup-message.php';?>

<main>
<div class="p_header">
<h1 class="wb-a">Edito Vlerësimin</h1>
<div class="___l_add">
    <a href="dashboard-reviews">Kthehu prapa</a>
</div>

</div>
    <?php require 'components/review-edit.php';?>
</main>



</body>
</html>