<style>
      html, body{
        overflow:hidden;
    }
.sh_edit{
    margin-left:3.125vw;
    width: 70vw;
    margin-top:2.777777777777778vh;
    height:70vh;
    overflow-y:scroll;
    overflow-x: visible;
    display:flex;
    justify-content:center;
    align-items:flex-start; 
    border-radius:3vh;
    background:white;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);

}
.sh_edit::-webkit-scrollbar {
    display: none;
}

.sh_edit {
    -ms-overflow-style: none;  
    scrollbar-width: none;     
}
#sh_edit{
    padding:4vh 2vw;
    width: 100%;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
}
#sh_edit input{
    border:0px;
    padding:.5vh 2vw; 
    width: 70%;
    outline:none;
    border-bottom:.3vh solid #353572;
    margin-bottom:6vh;
    font-size:3vh;
    font-family:'Regular';
    color:#353572;
    text-align:center;

}
.__btn {
    background:#353572;
    color:white;
    font-size:2vh;
    padding:1vh 2vw;
    border-radius:3vh;
    font-family:'Regular';
    border:0px;
    cursor:pointer;
    margin-top:2vh;
    transition:all .3s ease-in-out;
}
.__btn:hover{
    background:white;
    color:#353572;
    border:.1vh solid #353572;
}
.delete-btn{
    background:#D12329 !important;
    margin-left:2vw;
}
.delete-btn:hover{
    background:white !important;
    color:#D12329 !important;
    border:.1vh solid #D12329 !important;
}
.all_btn{
    justify-content:center !important;
}
</style>



<div class="sh_edit">
    <form id="sh_edit">
        <input placeholder="Titulli i Shabllonit" type="text" name="title" id="title" value="">
        <textarea id="editor" name="text" rows="10" cols="80">
            
        </textarea>
        <div class="all_btn">
            <button class="__btn" type="button" onclick="submitForm()">Shtoni Shabllonin</button>
            
        </div>
    </form>




</div>



<script>
function submitForm() {
    var formData = new FormData(document.getElementById('sh_edit'));
    formData.append('token', 'hr/bee-admin@dijarbossi.com-hello');
    formData.append('text', tinymce.get('editor').getContent());

    fetch('backend/shabllonet-add.php', {
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
                location.reload();
            }, 1000);
        });
    })
    .catch(error => console.error('Error:', error));
}


</script>