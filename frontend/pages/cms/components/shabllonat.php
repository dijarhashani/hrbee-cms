<style>
   html, body{
        overflow:hidden;
    }
.shabllonat{
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
.shabllonat::-webkit-scrollbar {
    display: none;
}

.shabllonat {
    -ms-overflow-style: none;  
    scrollbar-width: none;     
}
.shabllon-item{
    width:90%;
    height:12vh;
    background:white;
    border-radius:1.5vh;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    margin-bottom:5vh;
    display:flex;
    overflow:hidden;
    
    
}
.sh_text{
    width: 80%;
    height:100%;
    display:flex;
    justify-content:flex-start;
    align-items:center;
}
.sh_link{
    width: 20%;
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
}
.sh_text h1{
    font-size: 3.5vh;
    font-family:'Regular';
    font-weight:bold;
    margin:0px;
    padding:0px;
    margin-left:2vw;
    color:#353572;
}
.sh_link a{
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
.sh_link a:hover{
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



<div class="shabllonat">


</div>









<script>
   document.addEventListener("DOMContentLoaded", function() {
    fetch("backend/shabllonat.php")
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }
            const shabllonat = document.querySelector('.shabllonat');
            if (data.length === 0) {
                const noDataMessage = document.createElement('p');
                noDataMessage.className = "noDataMessage";
                noDataMessage.textContent = 'Nuk keni shtuar asnjë shabllon.';
                shabllonat.appendChild(noDataMessage);
            } else {
            data.forEach(shabllon => {
                const shabllon_item = document.createElement('div');
                shabllon_item.className = "shabllon-item";
                shabllon_item.innerHTML = `
                <div class="sh_text"> 
                    <h1> ${shabllon.shabllon_name} </h1>

                </div>
                <div class="sh_link">
                    <a href="dashboard-programet-shabllonat-edit?id=${shabllon.shabllon_id}">Ndrysho</a>
                </div>
                
                
                
                
                
                
                
                
                `;

                shabllonat.appendChild(shabllon_item);
            });
            } 
    
        })
        .catch(error => console.error('Error fetching course data:', error));
});

</script>