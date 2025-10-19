<?php 
// Template Name: Home HRBEE
// Author: Dijar Hashani


require 'components/header.php';
$p1 = '../assets/img/home-one.png';
$p2 = '../assets/img/home-two.png';
$p3 = '../assets/img/home-three.svg';

$s1 = '../assets/img/verdh.svg';
$s2 = '../assets/img/gjelbert.svg';
?>


<style>
    @font-face {
    font-family: 'Black';
        src: url("./frontend/assets/fonts/Poppins-Black.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
    font-family: 'Bold';
        src: url("./frontend/assets/fonts/Poppins-Bold.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    main{
        width: 100vw;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin-top:14.111111vh ;
    }
    .section-one{
        width: 80%;
        display:flex;
        justify-content:center;
        align-items:center;
        height:80vh;
    }

    html, body{
        overflow-x:hidden;
    }
    .so-first{
        width: 50%;
    }
    .so-second{
        width: 50%;
    }
    .sos-1{
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .sos-1 svg{
        width: 35.634375vw;
    }
    .so-first h1{
        font-size:5.703703703703704vh;
        font-family:'Black';
        color:#353572;
        padding-left:0vh;
        margin-top:0px;
        padding-top:0px;
        margin-bottom:1vh;
    }
    .so-first h1::after{
        width: 18.2359375vw;
        height:.4vh;
        background-color:#353572;
        content: ' ';
        border-radius:3vh;
        display: block;
        padding-left:-1vh;
        margin-top:2vh;
        margin-left:-1vh;
        margin-bottom:0px;

    }
    .so-first h2{
        font-size:3.051851851851852vh;
        font-family:'Regular';
        color:#353572;
        margin:0px;
        padding:0px;
        font-weight:lighter;
        margin-bottom:3.333333333333333vh;
    }
    .so-first strong{
        font-family:'Black' !important;
    }
    .so-first p{
        font-size:1.851851851851852vh;
        font-family:'Regular';
        color:black;
        margin-bottom:7.777777777777778vh;
    }
    .so-first .abn{
        background-color:#92278E;
        padding:1.703703703703704vh 3.28125vw;
        border-radius:3vh;
        text-decoration:none;
        color:white;
        font-size:2.051851851851852vh;
        font-family:'Black';
        margin-bottom:1vh;
        transition:background .3s ease;
        text-align:center;
        cursor:pointer;
        justify-content: center;
        display: flex;
        width: 40%;
    }
    .so-first .abn:hover{
        background:#353572;
    }
    .section-two{
        width: 80%;
        display:flex;
        justify-content:center;
        align-items:center;
        height:80vh;
        margin-top:13.33333333333333vh;
        position:relative;
    }
    .st-first{
        width: 50%;
    }
    .st-second{
        width: 50%;
    }
    .sos-2{
        width: 100%;
        display:flex;
        justify-content:left;
        align-items:left;
    }
    .sos-2 img{
        width: 31.5796875vw;
    }
    .st-second h1{
        color:#4F469D;
        font-family:'Black';
        font-size:2.8vh;
        margin:0px;
        padding:0px;
        margin-bottom:3.5vh;
    }
    .st-second h2{
        color:#92278E;
        font-family:'Bold';
        font-size:2.3vh;
        margin:0px;
        padding:0px;
    }
    .st-second p{
        color:black;
        font-family:'Regular';
        font-size:1.851851851851852vh;
        margin:0px;
        padding:0px;
        margin-bottom:3.5vh;
    }
    .v-hover{
        position:absolute;
        right:7.916666666666667vw;
        top:-10.5vh;
    }
    .v-hover svg{
        width: 8.396875vw;
    }
    .g-hover{
        position:absolute;
        bottom:5.2vh;
        right:11.1vw;
    }
    .g-hover svg{
        width:7.595833333333333vw;
    }
    .responsive_h{
        display: none;
    }
    .r_txt{
        display:none;
    }

    @media screen and (max-width: 1000px) {

        .responsive_h{
            display:block;
            margin-top: 10vh;
        }
        .window_h{
            display: none;
        }
        .responsive_h h1{
            font-size: 3.703704vh;
            font-family:'Black';
            color:#353572;
            padding-left:0vh;
            margin-top:0px;
            padding-top:0px;
            margin-bottom: 0vh;
        }
        
        .responsive_h h2{
            font-size: 2.051852vh;
            font-family: 'Regular';
            color: #353572;
            margin: 0px;
            padding: 0px;
            font-weight: lighter;
            margin-bottom: 1.333333vh;
            margin-top: -1vh;
        }
        .responsive_h strong{
            font-family:'Black' !important;
        }
        .responsive_h p{
            font-size: 1.451851851851852vh;
            font-family:'Regular';
            color:black;
            margin-bottom: 1.777778vh;
        }
        .section-one {
            width: 100%;
            display: flex;
            flex-direction: column-reverse;
            justify-content: center;
            align-items: center;
            height: auto !important;
            margin-top: 4vh;
            margin-bottom: 5vh;
        }
        .so-first {
            width: 86%;
        }
        .so-second {
            width: 86%;
        }
        .sos-1 img{
            width: 85.98130841121495vw;
        }
        .sos-1{
            flex-direction: column;
        }
        .so-first .abn {
            background-color: #92278E;
            padding: 1.703703703703704vh 3.28125vw;
            border-radius: 3vh;
            text-decoration: none;
            color: white;
            font-size: 2.051851851851852vh;
            font-family: 'Black';
            margin-bottom: 1vh;
            transition: background .3s ease;
            width: 80%;
            text-align: center;
            cursor: pointer;
        }
        .dijarbossi{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2vh;
        }
        .so-first p {
            font-size: 1.451851851851852vh;
            font-family: 'Regular';
            color: black;
            margin-bottom: 1.777778vh;
            display:none;
        }
        .r_txt{
            display:block;
            font-size: 1.451851851851852vh;
            font-family: 'Regular';
            color: black;
            margin-bottom: 0vh;

        }
        main {
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 0px;
        }
        .v-hover, .g-hover{
            display:none;
        }
        .section-two {
            width: 100%;
            display: flex;
            flex-direction: column-reverse;
            justify-content: center;
            align-items: center;
            height: auto;
            margin-top: -2vh;
        }
        .st-first {
            width: 86%;
        }
        .st-second {
            width: 86%;
        }
        .st-second h1 {
            color: #4F469D;
            font-family: 'Black';
            font-size: 2.703704vh;
            margin: 0px;
            padding: 0px;
            margin-bottom: 1.5vh;
        }
        .st-second h2 {
            color: #92278E;
            font-family: 'Bold';
            font-size: 1.8vh;
            margin: 0px;
            padding: 0px;
            margin-bottom:.5vh;
        }
        .st-second p {
            color: black;
            font-family: 'Regular';
            font-size: 1.451851851851852vh;
            margin: 0px;
            padding: 0px;
            margin-bottom: 3.5vh;
        }
        .sos-2 img {
            width: 85.98130841121495vw;
        }

        .section-three {
            width: 100% !important;
            display: flex;
            flex-direction: column-reverse;
            justify-content: center;
            align-items: center;
            height: auto;
            margin-top: 1vh !important;
            margin-bottom: 0px !important;
           
        }
        .sth-second{
            display:none;
        }
    }

</style>

<?php
require 'components/newsletter.php';
?>


<main>
    <div class="section-one">
        <div class="so-first">
            <div class="window_h">
            <h1 data-aos="fade-right">HR BEE ACADEMY</h1>
            <h2 data-aos="fade-right">NE BËJMË<strong> DIFERENCEN </strong></h2>
            <p data-aos="fade-right">Mirësevini në faqen kryesore të HR Academy - një destinacion i fuqishëm 
                për ata që janë të gatshëm të ndërtojnë një karrierë të suksesshme dhe të 
                ngrisin shkathtësitë e tyre në fushën e Menaxhimit të Burimeve Njerëzore (HR).
                <br>    <br>
                Ky është një hapje emocionuese drejt një aventurë të re dhe një mundësie për
                të eksploruar thellësinë e botës së zhvillimit personal dhe profesional. </p>
            </div>
           <div class="dijarbossi" data-aos="fade-up"> <div class="abn">Abonohu falas</div></div>
            <p data-aos="fade-up" style="margin-top:3vh;">Për tu informuar rreth ngjarjeve, trendeve dhe ndryshimeve në fushën e HR/BNJ</p>
        </div>
        <div class="so-second">
            <div class="responsive_h">
                <h1 data-aos="fade-right">HR BEE ACADEMY</h1>
                <h2 data-aos="fade-right">NE BËJMË<strong> DIFERENCEN </strong></h2>
                <p data-aos="fade-right">Mirësevini në faqen kryesore të HR Academy - një destinacion i fuqishëm 
                    për ata që janë të gatshëm të ndërtojnë një karrierë të suksesshme dhe të 
                    ngrisin shkathtësitë e tyre në fushën e Menaxhimit të Burimeve Njerëzore (HR).
                    <br>    <br>
                    Ky është një hapje emocionuese drejt një aventurë të re dhe një mundësie për
                    të eksploruar thellësinë e botës së zhvillimit personal dhe profesional. </p>
                </div>
            <div data-aos="fade-up" class="sos-1">
                <img src="frontend/assets/img/home-one.png" alt="">
                <p class="r_txt" data-aos="fade-up" style="margin-top:1vh;">Për tu informuar rreth ngjarjeve, trendeve dhe ndryshimeve në fushën e HR/BNJ</p>
            </div>
        </div>
    </div>
    <div class="section-two">  
        <div data-aos="fade-up" class="v-hover">
            <?php echo file_get_contents($s1); ?>
        </div>
        <div  class="st-first">
            <div data-aos="fade-up" class="sos-2">
                <img src="frontend/assets/img/home-two.png" alt="">
            </div>
        </div>
        <div class="st-second">
            <h1 data-aos="fade-left">PSE HR ACADEMY:</h1>
            <h2 data-aos="fade-left">Eksperiencë e Përgjegjshme: </h2>
            <p data-aos="fade-left">Ne jemi të përkushtuar në sigurimin e një eksperience të trajnimeve të përgjegjshme dhe të vlefshme, duke e bërë udhën tuaj të mësimit një përvojë të paharrueshme.            </p>
            <h2 data-aos="fade-left">Fleksibilitet dhe Akses:</h2>
            <p data-aos="fade-left">Me mundësinë për të mësuar online, ju keni fleksibilitetin për të studiuar në orarin që ju përshtatet më mirë.</p>
            <h2 data-aos="fade-left">Rrjeti dhe Bashkëveprimi: </h2>
            <p data-aos="fade-left">Duke u bërë pjesë e HR Bee Academy, ju hapni dyert për rrjetizim dhe bashkëveprim me profesionistë të tjera të fushës nga e gjithë bota.</p>
        </div>
        <div data-aos="fade-up" class="g-hover">
            <?php echo file_get_contents($s2); ?>
        </div>
    </div>

    <script>
    document.querySelector('.abn').addEventListener('click', () => {
        var popup = document.querySelector('.popup');

        popup.classList.add("cb-active");
        document.querySelector('.black').style.opacity = '35%';
        document.querySelector('.p-f').style.opacity = '100%';
        document.querySelector('.p-f').style.transform = 'translateY(0px)';
        

    });
</script>

<style>
    .section-three{
        width: 80%;
        display:flex;
        justify-content:center;
        align-items:center;
        height:80vh;
        margin-top:8.833333333333333vh;
        position:relative;
        margin-bottom:6.4vh;
    }
    .sth-second{
        width: 50%;
    }
    .sos-3{
        width: 100%;
        display:flex;
        justify-content:right;
        align-items:right;
    }
    .sos-3 img{
        width: 33.14947916666667vw;
    }
    .st-second a{
        color:#019AB9;
        font-family:'Bold';
        text-decoration:none;
    }
</style>
    <div class="section-three">
        <div class="st-second">
            <h1 data-aos="fade-right">MË SHUMË INFO PËR:</h1>
            <h2 data-aos="fade-right">Kush Jemi:</h2>
            <p data-aos="fade-right">HR Academy nuk është thjesht një platformë trajnimesh; është një komunitet i njerëzve të apasionuar për ndryshimin dhe përmirësimin në botën e HR.</p>
            <h2 data-aos="fade-right">Oferta Trajnimesh :</h2>
            <p data-aos="fade-right">Shfletoni seksionin <a href="programs">Trajnimet</a> për të eksploruar gamën tonë të kurseve dhe trajnimeve. 
            Përgatitur me kujdes për të përmbushur nevojat e ndryshme të profesionistëve të HR dhe menaxherëve, këtu do të gjeni informacion detajuar mbi çdo kurs, duke përfshirë përmbajtjen, kohën e kursit, dhe trajnerin përgjegjës.</p>
            <h2 data-aos="fade-right">Ekipi ynë: </h2>
            <p data-aos="fade-right">Në seksionin <a href="trainers">Trajnerat</a> ju do të njihni me ekspertët tanë të fushës. 
            Trajnuesit tanë janë profesionistë me përvojë, të përkushtuar për të ndihmuar 
            studentët të arrijnë suksesin dhe të zhvillohen në karrierë.
            </p>
            <h2 data-aos="fade-right">Raste Suksesi:</h2>
            <p data-aos="fade-right">Për t'ju sjellë inspirim dhe dëshmi të fuqishme të ndikimit pozitiv të trajnimeve tona, vizitoni seksionin "Raste Suksesi." 
            Ketu do të dëgjoni historitë e njerëzve të vërtetë që kanë ndryshuar jetën e tyre përmes përmirësimit të shkathtësive në fushën e HR.</p>
        </div>
        <div class="sth-second">
            <div data-aos="fade-up" class="sos-3">
                <img src="frontend/assets/img/home-three.png" alt="">
            </div>
        </div>
    </div>
</main>

<script>
    window.addEventListener('load', function() {
    var loadingScreen = document.getElementById('loading-screen');
    var loader = document.querySelector('.loader');

   
    loader.classList.add('final-shadow');

    
    setTimeout(function() {
        loadingScreen.style.opacity = '0';
        
        
        setTimeout(function() {
            loadingScreen.style.display = 'none';

            
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }, 1000); 
    }, 1000); 
});


</script>





<?php

require 'components/footer.php';
?>