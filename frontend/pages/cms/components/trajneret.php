<style>
      html, body{
        overflow:hidden;
    }
.trajneret{
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
.trajneret::-webkit-scrollbar {
    display: none;
}

.trajneret {
    -ms-overflow-style: none;  
    scrollbar-width: none;     
}
.trajner-item{
    width:90%;
    height:12vh;
    background:white;
    border-radius:1.5vh;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    margin-bottom:5vh;
    display:flex;
    overflow:hidden;
    
    
}
.t-picture{
    width: 15%;
    display:flex;
    justify-content: center;
    margin-top: 0px;
    align-items:center;
    padding-left:2vw;
    flex-direction:column;
    height:100%;
}
.t-name{
    width: 25%;
    display:flex;
    justify-content:flex-start;
    margin-top:3vh;
    align-items:flex-start;
    padding-left:2vw;
    flex-direction:column;
    height:100%;
}

.t-position{
    width: 45%;
    display:flex;
    justify-content:flex-start;
    margin-top:3vh;
    align-items:flex-start;
    padding-left:2vw;
    flex-direction:column;
    height:100%;
}

.update-btn{
    width: 15%;
}

.t-name h3{
    margin:0px;
    padding:0px;
    font-size:1.5vh;
    font-family:'Regular';
    color:#353572;
}
.t-name h1{
    margin:0px;
    padding:0px;
    font-size:2.5vh;
    font-family:'Regular';
    color:#9E258D;
}
.t-position h3{
    margin:0px;
    padding:0px;
    font-size:1.5vh;
    font-family:'Regular';
    color:#353572;
}
.t-position h1{
    margin:0px;
    padding:0px;
    font-size:1.7vh;
    font-family:'Regular';
    color:#9E258D;
}
.update-btn a{
    width: 100%;
    height: 100%;
    background: #4F469D;
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
.update-btn a:hover{
    background:white;
    color:#4F469D;
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

.t-photo{
    width: 4.59375vw;
    height: 4.59375vw;
    border-radius:50%;
    background-position:center !important;
    background-size:cover !important;
    background-repeat:no-repeat !important;
    background-color:#E8E3E3 !important;
}
</style>



<div class="trajneret"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        
        
            fetch(`backend/trajneret-list.php`)
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        console.error(data.message);
                        return;
                    }

                    const aplikimet = document.querySelector('.trajneret');
                    aplikimet.innerHTML = ''; 
                    if (data.length === 0) {
                        const noDataMessage = document.createElement('p');
                        noDataMessage.className = "noDataMessage";
                        noDataMessage.textContent = 'Nuk keni asnje trajner momentalisht.';
                        aplikimet.appendChild(noDataMessage);
                    } else {
                    data.forEach(trajner => {
                        const ap_item = document.createElement('div');
                        ap_item.className = 'ap_item';
                       

                        ap_item.innerHTML = `
                            <div class="trajner-item"> 
                                <div class="t-picture">
                                    <div style='background:url("frontend/uploads/trajneret/${trajner.t_photo_path}")' class="t-photo"></div>
                                </div>
                                <div class="t-name">
                                    <h3>Emri dhe Mbiemri</h3>
                                    <h1>${trajner.t_name || 'N/A'} </h1>
                                </div>
                                <div class="t-position">
                                    <h3>Position</h3>
                                    <h1>${trajner.t_position || 'N/A'}</h1>
                                </div>
                                <div class="update-btn">
                                    <a href="dashboard-programet-trajner-edit?id=${trajner.id || 'N/A'}">Ndrysho</a>
                                </div>
                            </div>
                        `;

                        aplikimet.appendChild(ap_item);
                    });
                    }
                })
                .catch(error => console.error('Error fetching applications data:', error));
        


    });
 


</script>