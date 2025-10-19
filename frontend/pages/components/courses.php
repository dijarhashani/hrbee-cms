<?php

// Component: Kurset
// Author: Dijar Hashani

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
        color: #9E258D;
        padding: 0;
        margin: 0;
    }
    .line2 {
        content: '';
        height: .2vh;
        flex-grow: 1;
        background: #9E258D;
        margin-bottom: 0vh;
        margin: 0 2vh;
    }
    .course-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 2vh;
    }
    .course-item img {
        max-width: 100%;
        height: auto;
    }
    .course-item p {
        margin: 0.5vh 0;
    }
    #course-list{
        width: 100%;
        display:flex;
        align-items:flex-start;
        justify-content:flex-start;
        flex-wrap:wrap;
        margin:3vh 0px;
    }
    .course-item{
        flex-basis:200;
        margin-right:2vw;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        cursor:pointer;
        transition:filter .3s ease;
        background:white;
        padding:1vh;
        border-radius:2vh;
    }
    .course-item:hover{
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
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
  
</style>
<style>
    @font-face {
    font-family: 'Semi Bold';
        src: url("./frontend/assets/fonts/Poppins-SemiBold.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }


    .academy{
        width: 80%;
        margin:0px;
        padding:0px;
        margin-bottom:3vh;
    }
    .a-s1{
        display:flex;
        flex-grow:1;
        justify-content:center;
        align-items:flex-end;
        position:relative;
    }
    .a-s1 p{
        font-family:'Semi Bold';
        font-size:1.9vh;
        color:#4F469D;
        padding:0px;
        margin:0px;

    }
    .line{
        content:'';
        height:.2vh;
        flex-grow:1;
        background:#4F469D;
        margin-bottom:0vh;
        margin:0px 2vh;
        
    }
    
    .academy-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 2vh;
    }
    .academy-item img {
        max-width: 100%;
        height: auto;
    }
    .academy-item p {
        margin: 0.5vh 0;
    }
    #academy-list{
        width: 100%;
        display:flex;
        align-items:flex-start;
        justify-content:flex-start;
        flex-wrap:wrap;
        margin:3vh 0px;
    }
    .academy-item{
        flex-basis:200;
        margin-right:2vw;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        cursor:pointer;
        transition:filter .3s ease;
        background:white;
        padding:1vh;
        border-radius:2vh;
    }
    .academy-item:hover{
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    }
    .academy-item .academy-img{
        width: 16.71875vw;
        height:23.888889vh;
        border-radius:2vh;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-color: #F3F3F3 !important;
    }
    .academy-item h1{
        margin:0px;
        padding:0px;
        color:#9E258D;
        font-family: 'Bold';
        font-size: 1.9vh;
        text-align:left;
        margin-top:2vh;
        margin-bottom:.1vh;
    }
    .academy-item p{
        color:#9E258D;
        font-family: 'Regular';
        font-size: 1.5vh;
        text-align:left;
        margin:0px;
        padding:0px;
    }

    @media screen and (max-width: 1000px) {
        .course-item {
            flex-basis: 200;
            margin-right: 0px;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            cursor: pointer;
            transition: filter .3s ease;
            background: white;
            padding: 0px;
            border-radius: 2vh;
            width: 100%;
            margin-top: 4vh;
        }
        .course-item .course-img {
            width: 100%;
            height: 23.888889vh;
            filter: drop-shadow(0px 0vh 4vh #DBDBDB);
            border-radius: 2vh;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-color: #F3F3F3 !important;
        }
        .line{
            display:none;
        }
        .a-s1 {
        
            display: block;
        }
        .a-s1 p, .a-s2 p{
            font-size: 2.4vh;
            color: #4F469D !important; 
        }
        .line2{
            display:none;
        }
        .a-s2 {
         
            display: block;
        }
        #academy-list {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-wrap: wrap;
            margin: 0px;
        }
        .courses{
            width: 80%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-wrap: wrap;
            margin: 0px;
        }
        #course-list {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-wrap: wrap;
            margin: 1vh 0px;
        }
        .a-s2{
            margin-top:3vh;
        }
        .course-item h1 {
            margin: 0px;
            padding: 0px;
            color: #9E258D;
            font-family: 'Bold';
            font-size: 2.3vh;
            text-align: left;
            margin-top: 3vh;
            margin-bottom: 1vh;
        }
    }
</style>

<div class="academy">
    <div  class="a-s1">
        <p >Plane Programet e Akademis</p>
        <div class="line"></div>
    </div>

    <div  id="academy-list"></div>
</div>

<div class="courses">
    <div  class="a-s2">
        <p>Plane Programet e Kurseve</p>
        <div class="line2"></div>
    </div>
    <div  id="course-list"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("backend/courses.php")
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }
                
                const academyList = document.getElementById('academy-list');
                const courseList = document.getElementById('course-list');
                data.forEach(course => {
                    if(course.status === 'inactive'){
                        return;
                    }else{
                    const courseItem = document.createElement('div');
                    courseItem.className = 'course-item';
                    const courseImage = document.createElement('div');
                    courseImage.className = 'course-img';
                    

                    if (course.course_image_path) {
                        
                        courseImage.style.background = `url('frontend/uploads/programs/${course.course_image_path}')`;
                        
                    }
                    courseItem.appendChild(courseImage);
                    const courseName = document.createElement('h1');
                    courseName.textContent = course.course_name;
                    courseItem.appendChild(courseName);
                    const courseDate = document.createElement('p');
                    courseDate.textContent = `Grupi fillon me: ${course.start_date}`;
                    courseItem.appendChild(courseDate);
                    courseItem.addEventListener('click', function() {
                        window.location.href = `course-detail?id=${course.id}`;
                    });

                    if(course.course_category === 'academy'){
                        academyList.appendChild(courseItem);
                    }else if(course.course_category === 'course'){
                        courseList.appendChild(courseItem);
                    }else{
                        console.error('Warning: You have some courses without a category in the database!');
                    }
                }
                });
            })
            .catch(error => console.error('Error fetching course data:', error));
    });
</script>
