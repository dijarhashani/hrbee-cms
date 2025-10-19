<?php 
// Template Name: Home HRBEE
// Author: Dijar Hashani

require 'components/header.php';
?>

<style>
    main{
        padding-top:14.111111vh ;
        content:'';
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
    }
    .prg-head{
        margin:7.62962962962963vh 0px;
        width: 80%;
    }
    .prg-head{
        text-align:center;
        color:#353572;
        font-family:'Regular';
        font-size:2.296296296296296vh;
        line-height:2.196296296296296vh;
    }


    @media screen and (max-width: 1000px) {
    .prg-head {
        text-align: left;
        color: #353572;
        font-family: 'Regular';
        font-size: 1.4vh;
        line-height: 2.196296296296296vh;
        margin: 0px;
        margin-bottom: 3vh;
    }
    }
</style>
<main>
<div class="prg-head">
    <p >
    HR Academy ofron një gamë të gjerë të trajnimeve të specializuara për të zhvilluar aftësitë tuaja në menaxhimin e 
    burimeve njerëzore dhe menaxhimin e organizatave.           
    </p>
    <p >
        
    Trajnimet tona janë të projektuara për të përmirësuar aftësitë tuaja profesionale dhe për të ju bërë gati për sfidat e botes së biznesit. 
    Këtu janë disa nga trajnimet tona të përzgjedhura: 
    </p>
</div>




<?php require 'components/courses.php';?>

<?php require 'components/reviews.php';?>

</main>


<?php

require 'components/footer.php';
?>