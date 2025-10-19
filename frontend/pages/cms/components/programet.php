<style>
    html, body{
        overflow:hidden;
    }
.programet{
    margin-left:3.125vw;
    width: 70vw;
    margin-top:2.777777777777778vh;
    height:70vh;
    overflow-y:scroll;
    overflow-x: visible;
    display:block;
    padding-left:2vw;
    justify-content:flex-start;
    align-items:center;
    flex-direction:column;
    padding-top:5vh;
}
.programet::-webkit-scrollbar {
    display: none;
}

.programet {
    -ms-overflow-style: none;  
    scrollbar-width: none;     
}
.program-item{
    width:90%;
    height:20vh;
    background:white;
    border-radius:1.5vh;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    margin-bottom:5vh;
    display:flex;
    overflow:hidden;
    
    
}
.program-item div{
    height:100%;
}
.program-text-t{
    width: 65%;
    display:flex;
    position:relative;
    justify-content:center;
    align-items:flex-start;
    flex-direction:column;
}
.program-text-t h2{
    position:absolute;
    bottom:-2.5vh;
    left:2vw;
    background:#9E258D;
    border-radius:1vh;
    margin:0px;
    padding:.5vh 2vw 3vh 2vw;
    color:white;
    font-size:1.5vh;
    font-family:'Regular';
}
.program-text-t h3{
    position:absolute;
    top:-2.5vh;
    right:2vw;
    background:#9E258D;
    border-radius:1vh;
    margin:0px;
    padding:3vh 2vw .5vh 2vw;
    color:white !important;
    font-size:1.5vh;
    font-family:'Regular';
}
.program-text-t h1{
    margin:0px;
    padding:0px;
    margin-left:2vw;
    color:#353572;
    font-size:3vh;
    font-family:'Regular';
}
.program-link-l{
    width: 15%;
}
.program-img{
    width: 20%;
    background-size:cover !important;
    background-repeat: no-repeat !important;
    background-color:#E5E5E5 !important;
  
}

.__link_one{
    height:50% !important;

}
.__link_one a{
    width: 100%;
    height: 100%;
    background: #9E258D;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration:none;
    color:white;
    font-size:2vh;
    font-family:'Regular';
    transition:all .3s ease-in-out;
}
.__link_one a:hover{
    background:white;
    color:#9E258D;
}
.__link_two{
    height:50% !important;
}
.__link_two a{
    width: 100%;
    height: 100%;
    background: #353572;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration:none;
    color:white;
    font-size:2vh;
    font-family:'Regular';
    transition:all .3s ease-in-out;
}
.__link_two a:hover{
    background:white;
    color:#353572;
}
.noDataMessage{
    width:90%;
    height:12vh;
    background:white;
    border-radius:1.5vh;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    margin-bottom:5vh;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
    text-align:center;
    color:#4F469D;
    font-family:'Regular';
    font-size:2vh;
}
.app_count{
    position:absolute;
    bottom:-2.5vh;
    right:2vw;
    background:#004756;
    border-radius:1vh;
    margin:0px;
    padding:.5vh 2vw 3vh 2vw;
    color:white !important;
    font-size:1.5vh;
    font-family:'Regular';
}
</style>



<div class="programet">


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
            const programet = document.querySelector('.programet');
            const selekti = document.querySelector('#category');
            if (data.length === 0) {
                const noDataMessage = document.createElement('p');
                noDataMessage.className = "noDataMessage";
                noDataMessage.textContent = 'Nuk keni shtuar asnjë kurs.';
                programet.appendChild(noDataMessage);
            } else {
               
                fetch("backend/course-app.php")
                    .then(response => response.json())
                    .then(applicantCounts => {
                        data.forEach(course => {
                           
                            
                            const courseItem = document.createElement('div');
                            courseItem.className = 'program-item';
                            const courseImage = document.createElement('div');
                            courseImage.className = 'program-img';
                            const courseName = document.createElement('h1');
                            courseName.textContent = course.course_name;
                            const courseCategory = document.createElement('h2');
                            courseCategory.textContent = course.course_category;
                            const courseStatus = document.createElement('h3');
                            courseStatus.textContent = course.status;
                            const courseApplicants = document.createElement('p');
                            courseApplicants.textContent = `Aplikimet: ${applicantCounts[course.id] || 0}`;
                            courseApplicants.className = "app_count";
                            const courseEdit = document.createElement('a');
                            courseEdit.className = 'program-edit-btn';
                            courseEdit.textContent = 'Edito';
                            const courseApp = document.createElement('a');
                            courseApp.className = 'program-app-btn';
                            courseApp.textContent = 'Applikimet';
                            const c_text = document.createElement('div');
                            c_text.className = 'program-text-t';
                            const c_links = document.createElement('div');
                            c_links.className = 'program-link-l';
                            const clink_one = document.createElement('div');
                            clink_one.className = '__link_one';
                            const clink_two = document.createElement('div');
                            clink_two.className = '__link_two';
                            c_text.appendChild(courseName);
                            c_text.appendChild(courseCategory);
                            c_text.appendChild(courseStatus);
                            c_text.appendChild(courseApplicants); 
                            clink_one.appendChild(courseEdit);
                            clink_two.appendChild(courseApp);

                            c_links.appendChild(clink_one);
                            c_links.appendChild(clink_two);

                            if(course.course_category === 'academy'){
                                courseCategory.style.backgroundColor = '#9E258D';
                            }else if(course.course_category === 'course'){
                                courseCategory.style.backgroundColor = '#353572';
                            }else{
                                console.error('Warning: You have some courses without a category in the database!');
                            }

                            if(course.status === 'active'){
                                courseStatus.style.backgroundColor = '#76B741';
                                courseItem.classList.add("st-active");
                                
                            }else if(course.status === 'inactive'){
                                courseStatus.style.backgroundColor = '#D12329';
                                courseItem.classList.add("st-inactive");
                                courseItem.style.display = "none";
                            }else{
                                console.error('Warning: You have some courses without a category in the database!');
                            }

                            if (course.course_image_path) {
                                courseImage.style.background = `url('frontend/uploads/programs/${course.course_image_path}')`;
                            }
                            courseItem.appendChild(courseImage);

                            courseEdit.href = `dashboard-programet-edit?id=${course.id}`;
                            courseApp.href = `dashboard-programet-applicants?id=${course.id}`;

                            courseItem.appendChild(c_text);
                            courseItem.appendChild(c_links);
                            programet.appendChild(courseItem);
                        });
                    })
                    .catch(error => console.error('Error fetching applicant counts:', error));
            }
        })
        .catch(error => console.error('Error fetching course data:', error));
});

</script>