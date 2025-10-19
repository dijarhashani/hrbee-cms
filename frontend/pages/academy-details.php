<?php

require dirname(__DIR__, 2) . '/backend/database/connect.php';

if (!isset($_GET['id'])) {
    echo 'Course ID is not specified.';
    exit;
}

$course_id = intval($_GET['id']);
$sql = "SELECT academy_name, description, academy_image, start_date FROM academy WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo 'Course not found.';
    exit;
}

$course = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<style>
    @font-face {
        font-family: 'Semi Bold';
        src: url("./frontend/assets/fonts/Poppins-SemiBold.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'Bold';
        src: url("./frontend/assets/fonts/Poppins-Bold.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    body,html{
        overflow-x:hidden;
    }
    .courses {
        width: 80%;
        margin: 0;
        padding: 0;
        margin-bottom: 3vh;
        margin-top: 3vh;
    }
    .a-s2 {
        display: flex;
        flex-grow: 1;
        justify-content: center;
        align-items: flex-end;
        position: relative;
    }
    .a-s2 p {
        font-family: 'Semi Bold';
        font-size: 1.9vh;
        color: #4F469D;
        padding: 0;
        margin: 0;
    }
    .line2 {
        content: '';
        height: .2vh;
        flex-grow: 1;
        background: #4F469D;
        margin-bottom: 0vh;
        margin: 0 2vh;
    }
   
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

</style>
<?php require 'components/header.php';?>
<main>
<div class="prg-head">
    <p>
    HR Academy ofron një gamë të gjerë të trajnimeve të specializuara për të zhvilluar aftësitë tuaja në menaxhimin e 
    burimeve njerëzore dhe menaxhimin e organizatave.           
    </p>
    <p>
        
    Trajnimet tona janë të projektuara për të përmirësuar aftësitë tuaja profesionale dhe për të ju bërë gati për sfidat e botes së biznesit. 
    Këtu janë disa nga trajnimet tona të përzgjedhura: 
    </p>
</div>



<style>
    .course-container{
        display:flex;
        justify-content:center;
        width: 100%;
        align-items:flex-start;
        margin-top:3vh;
    }
    .course-item{
        flex-basis:200;
        margin-right:3vw;
        display: flex;
        flex-direction:column;
        justify-content: flex-start;
        align-items: flex-start;
        cursor:auto;
        transition:filter .3s ease;
        background:white;
        padding:1vh;
        border-radius:2vh;
    }
    .course-item .course-img{
        width: 16.71875vw;
        height:23.888889vh;
        border-radius:2vh;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-color: #F3F3F3 !important;
    }
    .course-item h1{
        margin:0px;
        padding:0px;
        color:#9E258D;
        font-family: 'Bold';
        font-size: 1.9vh;
        text-align:left;
        margin-top:2vh;
        margin-bottom:.1vh;
    }
    .course-item p{
        color:#9E258D;
        font-family: 'Regular';
        font-size: 1.5vh;
        text-align:left;
        margin:0px;
        padding:0px;
    }
    .course-description{
        flex-grow:1;
        text-align:center;
    }
    .course-description p{
        font-size:1.8vh;
        font-family:'Regular';
        color:#353572;
    }
</style>
<div class="courses">
    <div class="a-s2">
        <p>Plane Programet e Akademis</p>
        <div class="line2"></div>
    
    </div>
    <div class="course-container">
        <div class="course-item">
            <div style="background:url('data:image/jpeg;base64,<?php echo base64_encode($course['academy_image']); ?>')" class="course-img"></div>
            <h1><?php echo htmlspecialchars($course['academy_name']); ?></h1>
            <p>Grupi fillon me: <?php echo htmlspecialchars($course['start_date']); ?></p>
        </div>
        <div class="course-description">
            <p><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>
        </div>
        
    </div>
</div>


</main>
    <?php require 'components/footer.php';?>