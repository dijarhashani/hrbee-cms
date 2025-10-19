<?php 
// Template Name: Home HRBEE
// Author: Dijar Hashani

require 'components/header.php';
?>
<style>
 @font-face {
        font-family: 'Bold';
        src: url("./frontend/assets/fonts/Poppins-Bold.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'Light';
        src: url("./frontend/assets/fonts/Poppins-Light.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
main{
 padding-top:19vh;
 width: 100vw;
 display:flex;
 justify-content:center;
 align-items:center;
 flex-direction:column;
}

body, html{
    overflow-x:hidden;
}
.trainers {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 2vh;
    width: 80%;

} 
.trainer-item{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    cursor:pointer;
    margin:0px 1.5vh;
    transition:filter .3s ease-in-out;
}
.trainer-item:hover{
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
}
.trainer-photo {
    max: 400;
    height: auto;
    width: 7.8125vw;
    height: 13.8888889vh;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #E4E4E4;
}
.trainer-name{
    margin:0px;
    padding:0px;
    font-size:2.2vh;
    font-family:'Bold';
    margin-top:3vh;
    transition: color .3s ease;
}
.trainer-position{
    margin:0px;
    padding:0px;
    font-size:1.2vh;
    font-family:'Light';
    margin-top:.2vh;
    transition: color .3s ease;
}
.t-header{
    color:#9E258D;
    font-size:2vh;
    font-family:'Bold';
    margin:0px;
    padding:0px;
    margin-top:2vh;
    margin-bottom:5vh;
}
.t-description{
    width: 80%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top:3vh;
    margin-bottom:5vh;
    flex-direction:column;

}
._t_description{
    font-size:1.7vh;
    color:#353572;
    font-family:'Regular';
    text-align:center;
    display:none;
    opacity:0%;
    transition:opacity .3s ease-in-out;

}
.d_active{
    
    opacity:100%;
}
.active .trainer-photo{
    filter: drop-shadow(0px 0vh 2vh #9E258D) !important;
}
.active h1{
    color:#9E258D !important;
    transition: color .3s ease;
}
.active h3{
    color:#353572 !important;
    transition: color .3s ease;
}
main{
    height:80vh;
}

@media screen and (max-width: 1000px) {
    main {
        height: auto !important;
        width: 80%;
        margin: 0px 10%;
        padding-top: 15vh;
    }
    .t-header {
        color: #9E258D;
        font-size: 2.4vh;
        font-family: 'Bold';
        margin: 0px;
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 5vh;
    }
    .trainers {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column;
        padding: 0px;
        width: 100%;
    }
    .trainer-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: row;
        width: 100%;
        cursor: pointer;
        margin: 0px;
        transition: filter .3s ease-in-out;
        margin-bottom: 4vh;
    }
    .trainer-photo {
        max: 400;
        height: auto;
        width: 30vw;
        height: 30vw;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .trainer-guxh{
        width: 45vw;
    }
    .trainer-name {
        margin: 0px;
        padding: 0px;
        font-size: 2.2vh;
        font-family: 'Bold';
        margin-top: 0px;
        transition: color .3s ease;
    }
    .t-description {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 3vh;
        margin-bottom: 5vh;
        flex-direction: column;
    }
    .active .trainer-photo{
        filter: drop-shadow(0px 0vh 0vh #9E258D) !important;
    }
}
</style>

<main>
    <h1 class="t-header">Ligjëruesit të programeve në Hr bee Academy</h1>
    <div class="trainers"></div>
    <div class="t-description"></div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("backend/trainers.php")
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                const trainerList = document.querySelector('.trainers');
                const trainerDescription = document.querySelector('.t-description');

                data.forEach(trainer => {
                    const trainerItem = document.createElement('div');
                    trainerItem.className = "trainer-item";


                    const trainerItem_ss = document.createElement('div');
                    trainerItem_ss.className = "trainer-guxh";

                    const trainerPhoto = document.createElement('div');
                    trainerPhoto.className = "trainer-photo";
                    if(trainer.t_photo_path){
                        trainerPhoto.style.backgroundImage = `url('frontend/uploads/trajneret/${trainer.t_photo_path}')`;
                    }

                    trainerItem.appendChild(trainerPhoto);

                    const trainerName = document.createElement('h1');
                    trainerName.className = "trainer-name";
                    trainerName.textContent = trainer.t_name;
                    trainerItem_ss.appendChild(trainerName);

                    const trainerPosition = document.createElement('h3');
                    trainerPosition.className = "trainer-position";
                    trainerPosition.textContent = trainer.t_position;
                    trainerItem_ss.appendChild(trainerPosition);

                    const trainerDescriptionText = document.createElement('p');
                    trainerDescriptionText.className = "_t_description";
                    trainerDescriptionText.innerHTML = trainer.t_description;
                    

                    
                    trainerItem.appendChild(trainerItem_ss);

                    trainerItem.addEventListener('click', function() {
                        
                        document.querySelectorAll('.trainer-item').forEach(item => item.classList.remove('active'));
                        document.querySelectorAll('._t_description').forEach(item_d => item_d.classList.remove('d_active'));

                        trainerItem.classList.add('active');
                        trainerDescription.querySelectorAll('._t_description').forEach(desc => desc.style.display = "none")
                        trainerDescriptionText.style.display = "block";

                        setTimeout(() => {
                            trainerDescription.querySelector('.d_active')?.classList.remove('d_active');
                            trainerDescriptionText.classList.add('d_active');
                        }, 100);
                        
                        
                    });
                    trainerDescription.appendChild(trainerDescriptionText);

                    trainerList.appendChild(trainerItem);
                });
            })
            .catch(error => console.error('Error fetching trainers data:', error));
    });
</script>

<?php
require 'components/footer.php';
?>
