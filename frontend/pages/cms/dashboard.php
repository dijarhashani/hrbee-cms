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
    .dash-all{
        margin-left:3.125vw;
        width: 70vw;
        margin-top:2.777777777777778vh;
    }
    .dash-double{
        width: 100%;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }
    .dash-single{
        width: 100%;
        margin-top:2.777777777777778vh;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }
    .dash-box{
        width: 49%;
        height:34.44444444444444vh;
        background:white;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        border-radius:3vh;
        position:relative;
    }
    .dash-box-g{
        width: 100%;
        height:34.44444444444444vh;
        background:white;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        border-radius:3vh;
        position:relative;
    }
    .dash-box h1{
        position:absolute;
        top:2.014814814814815vh;
        left:1.302083333333333vw;
        color:#9E258D;
        font-family:'Regular';
        font-size:3.981481481481481vh;
        margin:0px;
        padding:0px;
        font-weight:lighter;
    }
    .dash-box p{
        position:absolute;
        bottom:2.014814814814815vh;
        left:1.302083333333333vw;
        color:#353572;
        font-family:'Regular';
        font-size:1.574074074074074vh;
        margin:0px;
        padding:0px;
        width: 27.86458333333333vw;
    }
    .dash-box a{
        position:absolute;
        top:2.014814814814815vh;
        right:1.302083333333333vw;
        color:#9E258D;
        text-decoration:none;
        padding:1.388888888888889vh 2.8125vw;
        filter: drop-shadow(0px 0vh .5vh #DBDBDB);
        border-radius:3vh;
        background:white;
        font-family:'Regular';
        font-size:1.574074074074074vh;
        transition:all .3s ease-in-out;

    }
    .dash-box a:hover{
        color:white;
        background:#9E258D;
    }
    .dash-box-g p{
        width: 44.375vw;
    }
</style>

<h1 class="dash-text">HRBEE ACADEMY CMS 1.0</h1>

<main>
 <h1 class="wb-a">Mirësevini përsëri,  <?php echo htmlspecialchars($user['name']); ?>!</h1>

 <div class="dash-all">
    <div class="dash-double">
        <div class="dash-box">
            <h1>Programet</h1>
            <p>Ju keni mundësinë të ndryshoni, shtoni ose hiqni programet ekzistuese në sistemin tonë. Përveç kësaj, mund të shikoni dhe menaxhoni lehtësisht aplikuesit për çdo program. Kjo ju ndihmon të mbani një pasqyrë të qartë dhe të organizuar të të gjithë aplikuesve dhe të bëni ndryshime sipas nevojave tuaja.</p>
            <a href="dashboard-programet">Ndryshoni</a>
        </div>
        <div class="dash-box">
            <h1>Trajnerët</h1>
            <p>Ju keni mundësinë të ndryshoni, shtoni ose hiqni trajnerët ekzistues në sistemin tonë. Me këtë funksionalitet, ju mund të mbani një pasqyrë të qartë dhe të organizuar të të gjithë trajnerëve, duke siguruar që të gjitha informatat të jenë të përditësuara dhe të sakta. Kjo ju ndihmon të bëni ndryshime dhe përmirësime sipas nevojave tuaja, duke siguruar një menaxhim më efikas të trajnerëve në sistemin tuaj.</p>
            <a href="dashboard-trajneret">Ndryshoni</a>
        </div>
    </div>
    <div class="dash-single">
        <div class="dash-box dash-box-g">
            <h1>Buletin Informativ</h1>
            <p>Ju keni mundësinë të ndryshoni, shtoni ose hiqni abonimet ekzistuese në sistemin tonë. Përveç kësaj, mund të shikoni dhe menaxhoni lehtësisht aplikuesit që janë regjistruar për newsletter-in tuaj. Kjo ju ndihmon të mbani një pasqyrë të qartë dhe të organizuar të të gjithë abonentëve, duke siguruar që të gjitha informatat të jenë të përditësuara dhe të sakta. Ju gjithashtu mund të kopjoni listën e abonentëve për t'u dërguar email-e në mënyrë efikase dhe të shpejtë.</p>
            <a href="dashboard-newsletter">Ndryshoni</a>
        </div>
    </div>
 </div>

</main>





</body>
</html>

