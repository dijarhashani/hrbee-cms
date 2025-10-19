<?php
// Component: Trajnimet Akademike
// Author: Dijar Hashani

?>

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
        width: 80%;
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

</style>


<div class="academy">
    <div class="a-s1">
        <p>Plane Programet e Akademis</p>
        <div class="line"></div>
    </div>

    <div id="academy-list"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("backend/academy.php")
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                const academyList = document.getElementById('academy-list');
                data.forEach(academy => {
                    const academyItem = document.createElement('div');
                    academyItem.className = 'academy-item';

                    

                    if (academy.academy_image) {
                        const academyImage = document.createElement('div');
                        academyImage.className = 'academy-img';
                        academyImage.style.background = `url('data:image/jpeg;base64,${academy.academy_image}')`;
                        academyItem.appendChild(academyImage);
                    }
                    const academyName = document.createElement('h1');
                    academyName.textContent = academy.academy_name;
                    academyItem.appendChild(academyName);
                    const academyDate = document.createElement('p');
                    academyDate.textContent = `Grupi fillon me: ${academy.start_date}`;
                    academyItem.appendChild(academyDate);
                    academyItem.addEventListener('click', function() {
                        window.location.href = `academy-detail?id=${academy.id}`;
                    });
                    academyList.appendChild(academyItem);
                });
            })
            .catch(error => console.error('Error fetching academy data:', error));
    });
</script>






