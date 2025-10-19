
<style>
      html, body{
        overflow:hidden;
    }
.trajneret{
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
    background:white;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
}
.trajneret::-webkit-scrollbar {
    display: none;
}

.trajneret {
    -ms-overflow-style: none;  
    scrollbar-width: none;     
}
.custom-file-upload {
        display: inline-block;
        padding: 1vh 2vw;
        border: .1vh solid #353572;
        color: #353572;
        border-radius: 1vh;
        cursor: pointer;
        font-family: 'Regular';
        font-size: 2vh;
        background-color: white;
        text-align: center;
        width: 74%;
        transition:all .3s ease-in-out;
    }

    .custom-file-upload:hover {
        background: #353572;
        color: white;
    }

    #image-preview img {
        border-radius: 50%;
        height:10vw;
        width: 10vw;
       
    }
    #image-preview{
        border-radius: 50%;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        width: 10vw;
        height:10vw;
        background:#E5E5E5;
        margin-bottom:1.5vh;
    }
    .imazhi{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin:5vh 0px;
    }
    .name-surname{
        width: 40%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin:3vh 0px;
    }
    .name-surname h3{
        margin:0px;
        padding:0px;
        font-size:1.6vh;
        font-family:'Regular';
        color:#4F469D;
        font-weight:lighter;

    }
    .name-surname input{
        border:0px;
        border-bottom:.1vh solid #9E258D;
        color: #9E258D;
        width: 100%;
        font-size:2.5vh;
        font-family:'Regular';
        padding:1vh 1vw;
        text-align:center;
        transition:all .1s ease-in-out;
        outline:0px;
        font-weight:bold;

    }
    .name-surname input:focus{
        outline:0px !important;
        border:0px;
        border-bottom:.3vh solid #4F469D;
    }
    .position{
        width: 40%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin:3vh 0px;
    }
    .position h3{
        margin:0px;
        padding:0px;
        font-size:1.6vh;
        font-family:'Regular';
        color:#4F469D;
        font-weight:lighter;

    }
    .position input{
        border:0px;
        border-bottom:.1vh solid #9E258D;
        color: #9E258D;
        width: 100%;
        font-size:2.5vh;
        font-family:'Regular';
        padding:1vh 1vw;
        text-align:center;
        transition:all .1s ease-in-out;
        outline:0px;
        font-weight:bold;

    }
    .position input:focus{
        outline:0px !important;
        border:0px;
        border-bottom:.3vh solid #4F469D;
    }
    .description{
        width: 90%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin:3vh 0px;
    }
    .description h3{
        margin:0px;
        padding:0px;
        font-size:2vh;
        font-family:'Regular';
        color:#4F469D;
        font-weight:lighter;
        margin-bottom:3vh;
        margin-top:1vh;

    }
    .__btn {
        background:#353572;
        color:white;
        font-size:1.6vh;
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
        margin-left:1vw;
    }
    .delete-btn:hover{
        background:white !important;
        color:#D12329 !important;
        border:.1vh solid #D12329 !important;
    }
    .all_btn {
        justify-content: center !important;
        width: 120%;
        display: flex;
        position: inline;
        background: white;
        bottom: 0vh;
        padding-bottom: 2vh;
        left: 0px;
    }
</style>







<div class="trajneret">
    <div class="imazhi">
                <div id="image-preview" style="margin-top: 10px;">
                    
                        <img src="" alt="" style="max-width: 100%;">
                   
                </div>
                <label for="file" class="custom-file-upload">
                    <span id="file-label">Zgjidhni një foto</span>
                    <input type="file" name="file" id="file" style="display:none;" accept="image/*">
                </label>
                
    </div>
    <div class="name-surname">
        <h3>Emri dhe mbiemri i trajnerit:</h3>
        <input type="text" name="name-surname" id="name-surname" value="">
    </div>
    <div class="position">
        <h3>Pozita e trajnerit:</h3>
        <input type="text" name="position" id="position" value="">
    </div>
    <div class="description">
        <h3>Biografia e trajnerit:</h3>
        <textarea id="editor" name="text" rows="10" cols="80">
                        
        </textarea>
    </div>
    <div class="all_btn">
            <button class="__btn" type="button">Shto Trajnerin</button>
            
    </div>

</div>



<script>
    document.getElementById('file').addEventListener('change', function(event) {
    const fileLabel = document.getElementById('file-label');
    const preview = document.getElementById('image-preview');
    const file = event.target.files[0];

    if (file) {
        fileLabel.textContent = file.name;
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Selected Image" style="max-width: 100%;">`;
        };
        reader.readAsDataURL(file);
    } else {
        fileLabel.textContent = 'Zgjidhni një foto';
        preview.innerHTML = '';
    }
});



document.querySelector('button.__btn').addEventListener('click', function(event) {
    event.preventDefault();

    const formData = new FormData();
    
    formData.append('name', document.getElementById('name-surname').value);
    formData.append('description', tinymce.get('editor').getContent());
    formData.append('position', document.getElementById('position').value);
    const fileInput = document.getElementById('file');
    if (fileInput.files[0]) {
        formData.append('file', fileInput.files[0]);
    }

    fetch('backend/trajner-add.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Server Response:', data); 
        var popup = document.querySelector('.popup-message');
        var messageElement = document.querySelector('.popup p');

        if (data.success) {
            messageElement.textContent = data.success;
        } else if (data.error) {
            messageElement.textContent = data.error;
        } else {
            messageElement.textContent = 'Unknown response from the server.';
        }

        popup.style.display = "flex";
        setTimeout(() => {
            popup.classList.add('pmpm_active');
        }, 100);
    })
    .catch(error => console.error('Error:', error));
});










</script>