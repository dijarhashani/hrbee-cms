<?php 
// Component: Footer
// Author: Dijar Hashani

$fb = '../assets/img/fb.svg';
$in = '../assets/img/in.svg';
$ig = '../assets/img/ig.svg';
$evolux = './cms/components/img/pw-evolux.svg';
?>

<style>
@font-face {
    font-family: 'Regular';
    src: url("./frontend/assets/fonts/Poppins-Regular.ttf") format('truetype');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'Extra Bold';
    src: url("./frontend/assets/fonts/Poppins-ExtraBold.ttf") format('truetype');
    font-weight: normal;
    font-style: normal;
}



    footer{
    height:22.96296296296296vh;
    width: 100vw;
    background-color:white;
    filter: drop-shadow(0px -1vh 1vh #DBDBDB);
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction: column;
   
}
.f-p{
    width: 80%;
    border-bottom:.1vh solid black;
    display:flex;
    justify-content:center;
    align-items:center;
}
.f-dd{
    width: 80%;
    display:flex;
    justify-content:center;
    align-items:center;
}
.fd-one , .fd-two, .fd-three, .fd-socials{
    width: 25%;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
}
footer p{
    font-size:1.703703703703704vh;
    font-family:'Regular';
}
.fd-one{
    font-size:1.703703703703704vh;
    font-family:'Regular';
}
footer a{
    font-size:1.703703703703704vh;
    font-family:'Regular';
    text-decoration:none;
    color:black;
    transition: filter .3s ease;
}
footer a:hover{
    filter: drop-shadow(0px 0vh .3vh #353572);
}
.fb svg, .in svg, .ig svg{
    width: 1.543229166666667vw;
}
.in{
    margin:0px 1vh;
}
</style>
<footer>
    <div class="f-p">
        <p>We help entrepreneurs manage their employees and job seeker to find the dream job. Also hey can: seek, find and contract each other.</p>
    </div>
    <div class="f-dd">
        <div class="fd-one">Të gjitha të drejtat e rezervuara © 2023 HR bee Academy llc </div>   
        <div class="fd-two"><a href="policy&privatcy">Politika e privatësisë </a></div> 
        <div class="fd-three"><a href="terms&conditions">Termat & Kushtet</a></div>
        <div class="fd-socials">
            <a href="https://www.facebook.com/hrbee.academy/">
                <div class="fb">
                    <?php echo file_get_contents($fb); ?>
                </div>
            </a>
            <a href="https://www.linkedin.com/company/hr-bee-academy/">
                <div class="in">
                    <?php echo file_get_contents($in); ?>
                </div>
            </a>
            <a href="https://www.instagram.com/hrbee.academy/">
                <div class="ig">
                    <?php echo file_get_contents($ig); ?>
                </div>
            </a>
        </div>
    </div>

    <style>
    .evolux{
        position:absolute;
        bottom:2.4vh;
        right:2vw;
        z-index: 10;
        
    }
    .evolux a{
        text-decoration:none;
        color:black;
        background:white;
        padding:2vh 2vw;
        border-radius:1vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .evolux svg{
        width: 6.208333333333333vw;
      
        
    }
    @media screen and (max-width: 1000px) {
        footer{
            display:none;
        }
    }
    </style>



    <div class="evolux">
    <a href="https://www.instagram.com/evolux_digital/">
        <?php echo file_get_contents($evolux); ?>
    </a>
 </div>
</footer>




    
</body>


</html>