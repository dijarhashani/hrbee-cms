
<style>
    html, body{
        overflow:hidden;
    }
    .newsletter{
        margin-left:3.125vw;
        width: 65vw;
        margin-top:2.777777777777778vh;
        height:70vh;
        overflow-y:scroll;
        overflow-x: hidden;
        display:flex;
        justify-content:flex-start;
        align-items:center; 
        flex-direction:column;
        border-radius:3vh;
        position:relative;
        background:white;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    }
    .newsletter::-webkit-scrollbar {
        display: none;
    }

    .newsletter {
        -ms-overflow-style: none;  
        scrollbar-width: none;     
    }

    .sort{
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        background-color:white;
        height:10vh;
        position:sticky;
        bottom:0px;
        left:0px;
    }
    .copy_btn{
        font-size:1.8vh;
        font-family:'Regular';
        color:white;
        background:#76B741;
        border-radius:3vh;
        padding:1.5vh 2vw;
        margin:2.5vh 1vw;
        cursor:pointer;
        transition: all .3s ease-in-out;
    }
    .copy_btn:hover{
        color:#76B741;
        background:white;
        border:.1vh solid #76B741;
    }
    .n-list{
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
    }
    .abonues-item{
        width: 95%;
        border-bottom:.1vh solid #4F469D;
        display:flex;
        justify-content:center;
        align-items:center;
        padding:2vh 0px;
    }
    .abonues-item div{
        width: 20%;
    }
    .delete-btn{
        width: 20% !important;
    }
    .name{
        width: 20% !important;
    }
    .email{
        width: 20% !important;
    }
    .abonues-item h3{
        margin:0px;
        padding:0px;
        font-size:1.5vh;
        font-family:'Regular';
        color:#353572;
    }
    .abonues-item h1{
        margin:0px;
        padding:0px;
        font-size:2vh;
        font-family:'Regular';
        color:#9E258D;
    }
    .abonues-item button{
        background:#D12329;
        color:white;
        border:0px;
        padding:1vh 1vw;
        font-size:1.5vh;
        font-family:'Regular';
        border-radius:3vh;
        cursor:pointer;
        transition:all .3s ease-in-out;
    }
    .abonues-item button:hover{
        background:white;
        color:#D12329;
        border:.1vh solid #D12329;
    }
    .loading-overlay {
    position: sticky;
    top: 0;
    width: 100%;
    height: 100%;
    background: transparent;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    display: none; 
}


.loading-background {
    width: 65vw;
    height: 75vh;
    position: absolute;
    top: 0;
    left:0;
    background: #f5f5f5;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(1vh); 
    -webkit-backdrop-filter: blur(1vh);
}

.loading-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Regular';
    font-size: 2vh;
    font-weight:bolder;
    color: #353572;
}
.status_c{
    background:#F9B617 ;
    padding:1vh 2vw;
    border-radius:1vh ;
    text-align:center ;
    color:white ;
    font-size:1.5vh;
    font-family:'Regular';
    text-decoration:none;
    
}

</style>






<div class="newsletter">
    <div class="loading-overlay">
        <div class="loading-background">
            
            <div class="loading-text">Duke ngarkuar...</div>
        </div>
    </div>
    
    <div class="n-list">
        
    </div>
    


    
</div>




<script>










function showLoading() {
    document.querySelector('.loading-overlay').style.display = 'flex';
}

function hideLoading() {
    document.querySelector('.loading-overlay').style.display = 'none';
}



function fetchSubscribers() {
    showLoading();

    fetch(`backend/potencial-list.php`)
        .then(response => response.json())
        .then(data => {
            const aplikimet = document.querySelector('.n-list');
            aplikimet.innerHTML = ''; 
            if (data.message) {
                console.error(data.message);
                return;
            }
            if (data.length === 0) {
                const noDataMessage = document.createElement('p');
                noDataMessage.className = "noDataMessage";
                noDataMessage.textContent = 'Nuk keni asnje kandidat potencial momentalisht.';
                aplikimet.appendChild(noDataMessage);
            } else {
                data.forEach(abonues => {
                    const ap_item = document.createElement('div');
                    ap_item.className = 'abonues-item';

                    ap_item.innerHTML = `
                        <div class="name">
                            <h3>Emri dhe Mbiemri:</h3>
                            <h1>${abonues.name || 'N/A'} ${abonues.surname || 'N/A'}</h1>
                        </div>
                        <div class="email">
                            <h3>Numri Kontaktues:</h3>
                            <h1>${abonues.phone_number || 'N/A'} </h1>
                        </div>
                        <div class="phone">
                            <h3>Kursi i aplikuar:</h3>
                            <h1>${abonues.course_name || 'N/A'} </h1>
                        </div>
                        <div class="reg_date">
                            <h3>Statusi i kursit:</h3>
                            <h1>${abonues.course_status || 'N/A'}</h1>
                        </div>
                        <div class="delete-btn">
                            <h3 style="margin-bottom:1vh;">Statusi i Aplikantit:</h3>
                            <a href="dashboard-programet-aplikimet-details?id=${abonues.id}" class="status_c">Kandidat Potencial</a>
                        </div>
                        
                    `;
                    aplikimet.appendChild(ap_item);
                });
            }
            hideLoading();  
        })
        .catch(error => {
            console.error('Error fetching applications data:', error);
            hideLoading();
        });
}



document.addEventListener("DOMContentLoaded", fetchSubscribers);
</script>