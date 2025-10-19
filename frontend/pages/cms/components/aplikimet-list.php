<style>
      html, body{
        overflow:hidden;
    }
.aplikimet{
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
.aplikimet::-webkit-scrollbar {
    display: none;
}

.aplikimet {
    -ms-overflow-style: none;  
    scrollbar-width: none;     
}
.aplikant-item{
    width:90%;
    height:12vh;
    background:white;
    border-radius:1.5vh;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    margin-bottom:5vh;
    display:flex;
    overflow:hidden;
    
    
}
.api-name{
    width: 25%;
    display:flex;
    justify-content:flex-start;
    margin-top:3vh;
    align-items:flex-start;
    padding-left:2vw;
    flex-direction:column;
    height:100%;
}
.api-status{
    width: 25%;
    display:flex;
    justify-content:flex-start;
    margin-top:3vh;
    align-items:flex-start;
    padding-left:2vw;
    flex-direction:column;
    height:100%;
}
.api-phone{
    width: 15%;
    display:flex;
    justify-content:flex-start;
    margin-top:3vh;
    align-items:flex-start;
    padding-left:2vw;
    flex-direction:column;
    height:100%;
}
.api-date{
    width: 15%;
    display:flex;
    justify-content:flex-start;
    margin-top:3vh;
    align-items:flex-start;
    padding-left:2vw;
    flex-direction:column;
    height:100%;
}
.api-details{
    width: 15%;
}
.api-name h3{
    margin:0px;
    padding:0px;
    font-size:1.5vh;
    font-family:'Regular';
    color:#353572;
}
.api-name h1{
    margin:0px;
    padding:0px;
    font-size:2.5vh;
    font-family:'Regular';
    color:#9E258D;
}
.api-date h3{
    margin:0px;
    padding:0px;
    font-size:1.5vh;
    font-family:'Regular';
    color:#353572;
}
.api-date h1{
    margin:0px;
    padding:0px;
    font-size:1.7vh;
    font-family:'Regular';
    color:#9E258D;
}
.api-phone h3{
    margin:0px;
    padding:0px;
    font-size:1.5vh;
    font-family:'Regular';
    color:#353572;
}
.api-phone h1{
    margin:0px;
    padding:0px;
    font-size:1.7vh;
    font-family:'Regular';
    color:#9E258D;
}
.api-status h3{
    margin:0px;
    padding:0px;
    font-size:1.5vh;
    font-family:'Regular';
    color:#353572;
}
.api-status h1{
    margin:0px;
    padding:0px;
    font-size:1.5vh;
    font-family:'Regular';
    color:white;
}
.sbg_a{
    background:#019AB9;
    padding:1vh 2vw !important;
    border-radius:1vh;
    text-align:center;
}
.sbg_b{
    background:#4A7329;
    padding:1vh 2vw !important;
    border-radius:1vh;
    text-align:center;
}
.sbg_c{
    background:#76B741;
    padding:1vh 2vw!important;
    border-radius:1vh;
    text-align:center;
}
.sbg_d{
    background:#D12329;
    padding:1vh 2vw!important;
    border-radius:1vh;
    text-align:center;
}
.sbg_p{
    background:#F9B617;
    padding:1vh 2vw!important;
    border-radius:1vh;
    text-align:center;
}
.api-details a{
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
.api-details a:hover{
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

</style>




<div class="aplikimet"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const courseId = document.querySelector('main').getAttribute('data-course-id');
        
        if (courseId) {
            fetch(`backend/aplikimet-list.php?id=${courseId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        console.error(data.message);
                        return;
                    }

                    const aplikimet = document.querySelector('.aplikimet');
                    aplikimet.innerHTML = ''; 
                    if (data.length === 0) {
                        const noDataMessage = document.createElement('p');
                        noDataMessage.className = "noDataMessage";
                        noDataMessage.textContent = 'Nuk ka aplikanta për këtë kurs.';
                        aplikimet.appendChild(noDataMessage);
                    } else {
                    data.forEach(aplikant => {
                        const ap_item = document.createElement('div');
                        ap_item.className = 'ap_item';
                        let stats = " ";
                        let stats_bg = " ";
                        if (aplikant.status === "a") {
                            stats = "Aplikim i ri";
                            stats_bg = "sbg_a";
                        } else if (aplikant.status === "b") {
                            stats = "I/E Konfirmuar";
                            stats_bg = "sbg_b";
                        } else if (aplikant.status === "c") {
                            stats = "Pagesa e kryer";
                            stats_bg = "sbg_c";
                        } else if (aplikant.status === "p") {
                            stats = "Kandidat Potencial";
                            stats_bg = "sbg_p";
                        } else {
                            stats = "E anuluar";
                            stats_bg = "sbg_d";
                        }

                        ap_item.innerHTML = `
                            <div class="aplikant-item"> 
                                <div class="api-name">
                                    <h3>Emri dhe Mbiemri</h3>
                                    <h1>${aplikant.name || 'N/A'} ${aplikant.surname || 'N/A'}</h1>
                                </div>
                                <div class="api-phone">
                                    <h3>Numri kontaktues</h3>
                                    <h1>${aplikant.phone_number || 'N/A'}</h1>
                                </div>
                                <div class="api-date">
                                    <h3>Data e regjistrimit</h3>
                                    <h1>${aplikant.time_r || 'N/A'} </h1>
                                </div>
                                <div class="api-status">
                                    <h3>Statusi</h3>
                                    <h1 class="${stats_bg || 'N/A'}">${stats || 'N/A'}</h1>
                                </div>
                                
                                <div class="api-details">
                                    <a href="dashboard-programet-aplikimet-details?id=${aplikant.id || 'N/A'}" > Detajet </a>
                                </div>
                            </div>
                        `;

                        aplikimet.appendChild(ap_item);
                    });
                    }
                })
                .catch(error => console.error('Error fetching applications data:', error));
        } else {
            console.error('No course ID provided');
        }


    });
 
window.addEventListener('pageshow', function(event) {
    
    if (event.persisted) {
        
        window.location.reload();
    }
});

</script>



