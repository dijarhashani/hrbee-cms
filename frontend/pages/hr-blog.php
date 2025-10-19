<?php 
// Template Name: Home HRBEE
// Author: Dijar Hashani

require 'components/header.php';
?>


<style>
main{
    display:flex;
    justify-content:center;
    align-items:center;
    width: 100vw;
    margin:0px;
    padding:0px;
    padding-top:16.111111vh;
    flex-wrap:wrap;
    margin-bottom:20vh;
}
html, body{
    overflow-x:hidden;
}
.section{
    margin-top:5vh;
    width: 80%;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    

}
.item-small{
    width: 22%;
    cursor:pointer;
}
.item-big{
    width: 53%;
    cursor:pointer;
}
.bg{
    width: 100%;
    height:30vh;
    
    border-radius:1vh;
    transition: filter .3s ease-in-out;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center !important;
    background-color:#E4E4E4 !important;
}
.bg:hover{
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
}
.section h1{
    font-size:1.8vh;
    font-family:'Regular';
    color:#4F469D;
}
.section a{
    text-decoration:none;
}



@media screen and (max-width: 1000px) {
main {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    margin: 0px;
    padding: 0px;
    padding-top: 14.111111vh;
    flex-wrap: wrap;
    margin-bottom: 5vh;
}
.section {
    margin-top: 0px;
    width: 80%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}
.item-small {
    width: 100%;
    cursor: pointer;
    margin-top: 5vh;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
}
.item-big {
    width: 100%;
    margin-top: 5vh;
    cursor: pointer;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
}

}
</style>




<main>



<div class="section">
    
    <div class="item-small">
    <a href="https://www.aihr.com/blog/what-is-human-resources/">
        <div style="background:url('https://www.aihr.com/wp-content/uploads/What-Is-Human-Resources-Definition.png');" class="bg"></div>
        <h1>What is human resources</h1>
    </a>
    </div>
    

    
    <div class="item-big">
    <a href="https://factorialhr.com/blog/weighted-goals/">
        <div style="background:url('https://factorialhr.com/wp-content/uploads/2024/07/17174709/weighted-goals-1.png');" class="bg"></div>
        <h1>Weighted Goals: Boost your team’s performance with goal weights</h1>
        </a>
    </div>
 

  
    <div class="item-small">
    <a href="https://www.evilhrlady.org/2024/07/the-swiss-just-do-a-lot-of-things-better-the-mini-internship-is-one-of-them.html">
        <div style="background:url('https://www.evilhrlady.org/wp-content/uploads/2023/03/cropped-Suzanne-Lucas-1640-%C3%97-640-px-1640-%C3%97-500-px.png');" class="bg"></div>
        <h1>The Swiss Just Do a Lot of Things Better. The Mini-Internship Is One of Them</h1>
        </a>
    </div>

</div>
   
<div class="section">
<div class="item-small">
    <a href="https://blog.ongig.com/job-description-management/job-description-workflow/">
        <div style="background:url('https://d1emgcifyo4rdp.cloudfront.net/ongig-blue-logo-48-small.png');" class="bg"></div>
        <h1>9 Steps for Creating a Job Description Workflow</h1>
        </a>
    </div>
    <div class="item-small">
    <a href="https://www.paycor.com/resource-center/guides-white-papers/2025-hr-insights-predictions/">
        <div style="background:url('https://www.paycor.com/wp-content/uploads/2024/06/HRTrendsSurveyGuide_ShortGated_Open.png');" class="bg"></div>
        <h1>HR in 2025: Insights & Predictions</h1>
        </a>
    </div>
    <div class="item-big">
    <a href="https://blog.bernieportal.com/crowdstrike-payroll-continuity-planning">
        <div style="background:url('https://blog.bernieportal.com/hubfs/windows%20blue%20error%20screen%20crowdstrike%20outage.jpg');" class="bg"></div>
        <h1>CrowdStrike Outage Proves HR's Need for Payroll Continuity Planning</h1>
        </a>
    </div>
</div>
<div class="section">
<div class="item-big">
    <a href="https://www.hibob.com/blog/hr-training-programs-courses/">
        <div style="background:url('https://res.cloudinary.com/www-hibob-com/w_763,h_325,c_fit/fl_lossy,f_auto,q_auto/wp-website/uploads/HR-training-programs-and-courses.png');" class="bg"></div>
        <h1>HR training programs and courses</h1>
        </a>
    </div>
    <div class="item-small">
    <a href="https://www.glassdoor.com/employers/blog/help-employees-overcome-isolation-at-work/">
        <div style="background:url('https://www.glassdoor.com/employers/app/uploads/sites/2/2023/08/Stocksy_txpbdbc9b3abyl300_Small_1238553.jpg');" class="bg"></div>
        <h1>How to help employees overcome isolation at work</h1>
        </a>
    </div>
    <div class="item-small">
    <a href="https://www.hrbartender.com/2024/leadership-and-management/imposter-syndrome-how-impacts-workplace/">
        <div style="background:url('https://www.hrbartender.com/wp-content/uploads/2024/07/Imposter-Syndrome-Wellbeing.png');" class="bg"></div>
        <h1>Imposter Syndrome: What It Is and How It Impacts the Workplace</h1>
        </a>
    </div>
</div>


</main>



<?php

require 'components/footer.php';
?>