
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
        margin:2vh 1vw;
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
        padding:1.5vh 0px;
    }
    .abonues-item div{
        width: 20%;
    }
    .delete-btn{
        width: 15% !important;
    }
    .name{
        width: 20% !important;
    }
    .email{
        width: 25% !important;
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

</style>






<div class="newsletter">
    <div class="loading-overlay">
        <div class="loading-background">
            
            <div class="loading-text">Duke ngarkuar...</div>
        </div>
    </div>
    
    <div class="n-list">
        
    </div>
    <div class="sort">
        <div class="copy_btn">Kopjo Listen e Abonuesve</div>
        
    </div>


    
</div>




<script>

document.querySelector('.copy_btn').addEventListener('click', function() {
            fetch('backend/newsletter-export.php')
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'newsletter-export.csv'; 
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url); 
                })
                .catch(error => console.error('Error:', error));
        });









function showLoading() {
    document.querySelector('.loading-overlay').style.display = 'flex';
}

function hideLoading() {
    document.querySelector('.loading-overlay').style.display = 'none';
}

function deleteForm(id) {
    if (!confirm("Are you sure you want to delete this post?")) {
        return; 
    }
    
    var formData = new FormData();
    formData.append('token', 'hr/bee-admin@dijarbossi.com-hello');
    formData.append('id', id);

    showLoading();

    fetch('backend/newsletter-delete.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        var popup = document.querySelector('.popup-message');
        var messageElement = document.querySelector('.popup-message p');
        messageElement.textContent = data.message;
        popup.style.display = "flex";
        setTimeout(() => {
            popup.classList.add('pmpm_active');
        }, 100);
        document.querySelector('.popme-close').addEventListener('click', () => {
            setTimeout(() => {
                if (data.success) {
                    fetchSubscribers(); 
                }
                setTimeout(() => {
                    hideLoading(); 
                }, 1000);
                 
            }, 1000);
        });
    })
    .catch(error => {
        console.error('Error:', error);
        hideLoading();
    });
}

function fetchSubscribers() {
    showLoading();

    fetch(`backend/newsletter-list.php`)
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
                noDataMessage.textContent = 'Nuk keni asnje abonues momentalisht.';
                aplikimet.appendChild(noDataMessage);
            } else {
                data.forEach(abonues => {
                    const ap_item = document.createElement('div');
                    ap_item.className = 'abonues-item';

                    ap_item.innerHTML = `
                        <div class="name">
                            <h3>Emri dhe Mbiemri:</h3>
                            <h1>${abonues.name || 'N/A'} </h1>
                        </div>
                        <div class="email">
                            <h3>Email:</h3>
                            <h1>${abonues.email || 'N/A'} </h1>
                        </div>
                        <div class="phone">
                            <h3>Numri Kontaktues:</h3>
                            <h1>${abonues.phone || 'N/A'} </h1>
                        </div>
                        <div class="reg_date">
                            <h3>Data e regjistrimit:</h3>
                            <h1>${abonues.reg_date || 'N/A'}</h1>
                        </div>
                        <div class="delete-btn">
                            <button onclick="deleteForm(${abonues.id})" type="button">Fshi Abonuesin</button>
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