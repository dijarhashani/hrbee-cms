<?php 
// Component: Newsletter
// Author: Dijar Hashani

$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
?>

<style>
    .popup{
        position:fixed;
        width: 100vw;
        height:100vh;
        top:0px;
        left:0px;
        z-index: 10;
        display:none;
        justify-content:center;
        align-items:center;
    }
    .black{
        position:absolute;
        width: 100vw;
        height:100vh;
        background:#353572;
        opacity:0%;
        top:0px;
        left:0px;
        z-index:-1;
        transition: opacity .3s ease;
    }
    .p-f{
        width: 51.66666666666667vw;
        height:58.33333333333333vh;
        border-radius:3vh;
        background:white;
        filter: drop-shadow(0px 0vh 4vh #DBDBDB);
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        position:relative;
        opacity:0;
        transform:translateY(5vh);
        transition: transform .5s ease, opacity .4s ease;
    }
    .close-btn{
        position:absolute;
        top:2.5555556vh;
        left:1.5333333vw;
        padding:1.1111111vh 1.5333333vw;
        background-color:#91278D;
        color:white;
        font-size:1.5333333vh;
        font-family:'Regular';
        cursor:pointer;
        border-radius:3vh;
        transition:background .3s ease;
        z-index:2;

    }
    .close-btn:hover{
        background:#353572;
    }
    .logo-p{
        position:absolute;
        top:2.5555556vh;
        width: 100%;
        z-index:1;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .logo-p svg{
        width:7.0886667vw;
    }
    .p-f h1{
        font-size:4.8888889vh;
        font-family:'Regular';
        font-weight:lighter;
        margin:0px;
        padding:0px;
        color:#353572;
        margin-bottom:3vh;
        margin-top:0vh;
    }
    .p-f form{
        width: 80%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        margin:0px;
        padding:0px;
    }
    .emri input, .emaili input, .numri input{
        width: 30.6vw;
        padding:1.488889vh 1.33333333vw;
        outline:none;
        border: .2vh solid #91278D;
        border-radius:3vh;
        color:#91278D;
        font-family:'Regular';
        font-size:2vh;

    }
    .emri input::placeholder, .emaili input::placeholder, .numri input::placeholder{
        color:#91278D;
        font-family:'Regular';
        font-size:2vh;
    }
    .emaili{
        margin:2.5vh 0px;
    }
    .submit input{
        background:#91278D;
        border:0px;
        outline:none;
        border-radius:3vh;
        padding:1.703703703703704vh 3.28125vw;
        color:white;
        font-size:2.051851851851852vh;
        font-family:'Black';
        cursor:pointer;
        margin-top:3vh;
        transition: background .3s ease;

    }
    .submit input:hover{
        background:#353572;
    }
    .cb-active{
        display: flex;
    }
    .cb-active .black{
        transition:all .3s ease;

    }

    .cb-active .p-f{
        transition: all .3s ease;
    }
</style>

<div class="popup">
    <div class="p-f">
        <div class="close-btn">MBYLL</div>
        <!-- <div class="logo-p">
            <?php echo file_get_contents($logo); ?>
        </div> -->
        <h1>ABONOHU FALAS</h1>
        <form id="newsletter-form">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <div class="emri">
                <input placeholder="Emri dhe Mbiemri" type="text" name="emri" id="emri" required>
            </div>
            <div class="emaili">
                <input placeholder="Emaili" type="email" name="email" id="email" required>
            </div>
            <div class="numri">
                <input placeholder="Numri i telefonit" type="tel" name="number" id="number" required>
            </div>
            <div class="submit">
                <input type="submit" value="Abonohu">
            </div>
        </form>
    </div>
    <div class="black"></div>
</div>

<style>
    .popup-message{
        position:fixed;
        width: 100vw;
        height:100vh;
        background-color: rgba(53, 53, 114, 0.35);
        display:none;
        justify-content:center;
        align-items:center;
        z-index:10;
        top:0px;
        left:0px;
        flex-direction:column;
    }
    .popup-message p{
        padding:10vh 5vw;
        color:#353572;
        font-family:'Regular';
        font-size:3vh;
        background:white;
        border-radius:3vh;
        
    }
    .pmm_btn{
        padding:1.1111111vh 1.5333333vw;
        background-color:#91278D;
        color:white;
        font-size:1.5333333vh;
        font-family:'Regular';
        cursor:pointer;
        border-radius:3vh;
        transition:background .3s ease;
        z-index:2;
        margin-top:-10vh;
    }
    .pmm_btn:hover{
        background:#353572;
    }
    @media screen and (max-width: 1000px) {

        .p-f {
                width: 100.666667vw;
                height: 58.33333333333333vh;
                border-radius: 3vh;
                background: white;
                filter: drop-shadow(0px 0vh 4vh #DBDBDB);
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                position: relative;
                opacity: 0;
                transform: translateY(5vh);
                transition: transform .5s ease, opacity .4s ease;
            }
            .close-btn {
                position: absolute;
                top: 2.5555556vh;
                left: 3vw;
                padding: 1.1111111vh 7.5333333vw;
                background-color: #91278D;
                color: white;
                font-size: 1.5333333vh;
                font-family: 'Regular';
                cursor: pointer;
                border-radius: 3vh;
                transition: background .3s ease;
                z-index: 2;
            }
            .p-f h1 {
                font-size: 3.8888889vh;
                font-family: 'Regular';
                font-weight: lighter;
                margin: 0px;
                padding: 0px;
                color: #353572;
                margin-bottom: 3vh;
                margin-top: 0vh;
            }
            .emri input, .emaili input, .numri input {
                width: 92.6vw;
                padding: 1.6vh 3.33333333vw;
                outline: none;
                border: .2vh solid #91278D;
                border-radius: 3vh;
                color: #91278D;
                font-family: 'Regular';
                font-size: 1.5vh;
            }
            .emri input::placeholder, .emaili input::placeholder, .numri input::placeholder{
                color:#91278D;
                font-family:'Regular';
                font-size: 1.5vh;
            }
            .submit input {
                background: #91278D;
                border: 0px;
                outline: none;
                border-radius: 3vh;
                padding: 1.203703703703704vh 23.28125vw;
                color: white;
                font-size: 1.7051852vh;
                font-family: 'Black';
                cursor: pointer;
                margin-top: 3vh;
                transition: background .3s ease;
            }
            .popup-message p {
                padding: 8vh 15vw !important;
                color: #353572;
                font-family: 'Regular';
                font-size: 2vh !important;
                background: white;
                border-radius: 3vh;
            }
            .pmm_btn {
                padding: 1.1111111vh 10.5333333vw !important;
                background-color: #91278D;
                color: white;
                font-size: 1.5333333vh !important;
                font-family: 'Regular';
                cursor: pointer;
                border-radius: 3vh;
                transition: background .3s ease;
                z-index: 2;
                margin-top: -8vh;
            }
        }
</style>

<div class="popup-message">
    <p></p>
    <div class="pmm_btn">
        Mbyll
    </div>
</div>
<script>
    document.querySelector('.close-btn').addEventListener('click', () => {
        var popup = document.querySelector('.popup');
        popup.classList.remove("cb-active");
    });

    document.querySelector('.pmm_btn').addEventListener('click', () => {
        var pmpm = document.querySelector('.popup-message');
        pmpm.style.display = "none";
    });

    document.getElementById('newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault(); 

        var formData = new FormData(this);

        fetch('backend/newsletter.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            
            var popup = document.querySelector('.popup');
            popup.classList.remove("cb-active");
            setTimeout( () => {
                var popup_m = document.querySelector('.popup-message');
                popup_m.style.display = 'flex';

                const pm_t = document.querySelector('.popup-message p');
                pm_t.textContent = data.message;
            }, 1000);
            
        })
        .catch(error => {
            alert('There was an error registering the newsletter.');
            console.error('Error:', error);
        });
    });
</script>
