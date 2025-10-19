<?php 
// LOGIN PAGE
// Author: Dijar Hashani
// Note: This page is secured and is not viewable by any unauthorized user!

$logo = '../assets/img/login-txt.svg';
$icon = 'frontend/assets/img/icon.png';
$l1 = '../assets/img/login.png';



if (isset($_COOKIE['user_id'])) {
    header("Location: dashboard");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $icon;?>" type="image/icon type">
    <title>Login</title>
    <style>
        @font-face {
            font-family: 'Black';
            src: url("./frontend/assets/fonts/Poppins-Black.ttf") format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'Bold';
            src: url("./frontend/assets/fonts/Poppins-Bold.ttf") format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'Regular';
            src: url("./frontend/assets/fonts/Poppins-Regular.ttf") format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'Medium';
            src: url("./frontend/assets/fonts/Medium.ttf") format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        html, body{
            overflow:hidden;
            margin:0px;
            padding:0px;
        }
        .bg_login{
            width: 50vw;
            height:100vh;
            background: url('frontend/assets/img/login.png');
            background-position:center;
            background-size:cover;
            background-repeat:no-repeat;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .bg_login svg{
            width: 20.26041666666667vw;
        }
        main{
            width: 100vw;
            display:flex;
        }
        .login-form{
            width: 50vw;
            height:100vh;
            position:relative;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:flex-start;
        }
        .login-form a{
            position:absolute;
            left:10.41666666666667vw;
            top:14.35185185185185vh;
            color:#9E258D;
            font-family:'Regular';
            font-size:1.7vh;
            text-decoration:none;
            transition:color .3s ease-in-out;
        }
        .login-form span{
            font-family:'Medium';
            margin-right:.4vw;
            transition:margin .3s ease-in-out;
        }
        .login-form a:hover{
            color:#4F469D;
        }
        .login-form a:hover span{
            margin-right:.8vw;
        }
        .login-c{
            margin-left:10.41666666666667vw;
        }
        .login-c h1{
            font-family:'Black';
            color:#4F469D;
            font-size:5.703703703703704vh;
            margin:0px;
            padding:0px;
            margin-bottom:6.481481481481481vh;
        }
        .login-c form{
            width: 28.395833vw;
            margin: 0px;
            padding: 0px;
            overflow: hidden;
        }
        .login-c .input-container {
            position: relative;
            margin-bottom: 5vh;
            width: 100%;
        }
        .login-c input {
            border: 0px;
            outline: none;
            padding: 1.3vh 1vw;
            font-family: 'Regular';
            color: #9E258D;
            font-size: 1.9vh;
            width: 100%;
            border-bottom: 0.1vh solid #BCBCBC;
            background: transparent;
            position: relative;
            z-index: 1;
        }
        .login-c .input-container::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 0.3vh;
            background-color: #9E258D;
            transition: width 0.3s ease-in-out;
        }
        .login-c .input-container.focus::after {
            width: 100%;
        }
        .login-c button{
            padding:1.5vh 5.166666666666667vw;
            border:0px;
            background:#9E258D;
            color:white;
            font-size:2vh;
            font-family:'Regular';
            border-radius:3vh;
            cursor:pointer;
            transition:background .3s ease-in-out;
        }
        .login-c button:hover{
            background:#4F469D;
        }
        .responsive{
            display:none;
        }
        text {
            font-family: 'Regular';
            }
        @media screen and (max-width: 1000px) {
            main{
                display: none !important;
            }
            .responsive {
                width: 100vw;
                height: 100vh;
                background: #4F469D;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .r_content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 90vh;
                flex-direction: column;
            }
            .r_content svg{
                width: 60vw;
            }
            .r_content h1{
                color: white;
                font-size: 2vh;
                font-family: 'Regular';
                text-align: center;
                margin: 0px;
            }
            .r_content a{
                color:white;
                font-family:'Regular';
                font-size:1.7vh;
                text-decoration:none;
                transition:color .3s ease-in-out;
            }
        }
    </style>
</head>
<body>

<div class="responsive">
    <div class="r_content">
        <?php echo file_get_contents($logo); ?>

        <h1>Për të kycur HrBee Academy, ju lutemi sigurohuni që po përdorni një laptop ose kompjuter desktop.</h1>
        <br>
        <a href="home"><span><</span> Kthehu prapa</a>

    </div>
    
</div>


<main>
    <div class="bg_login">
        <?php echo file_get_contents($logo); ?>
    </div>
    <div class="login-form">
        <a href="home"><span><</span> Kthehu prapa</a>
        <div class="login-c">
            <h1>LOGIN</h1>
            <form id="login-form">
                <div class="input-container">
                    <label for="email">
                        <input placeholder="Email:" type="email" name="email" id="login-email">
                    </label>
                </div>
                <div class="input-container">
                    <label for="password">
                        <input placeholder="Fjalekalimi:" type="password" name="password" id="login-password">
                    </label>
                </div>
                <button type="submit">Kyqu</button>
            </form>
        </div>
    </div>
</main>

<?php require 'components/message.php';?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.login-c input');
    inputs.forEach(input => {
        input.addEventListener('focus', (e) => {
            const container = e.target.closest('.input-container');
            container.classList.add('focus');
        });
        input.addEventListener('blur', (e) => {
            const container = e.target.closest('.input-container');
            container.classList.remove('focus');
        });
    });

    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const email = document.getElementById('login-email').value;
        const password = document.getElementById('login-password').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'backend/login.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            console.log(this.responseText);
            if (this.status === 200) {
                try {
                    const response = JSON.parse(this.responseText);
                    if (response.status === 'success') {
                        window.location.href = 'dashboard';
                    } else {
                        var popup_m = document.querySelector('.popup-message');
                        popup_m.style.display = 'flex';

                        const pm_t = document.querySelector('.popup-message p');
                        pm_t.textContent = response.message;
                        
                    }
                } catch (e) {
                    console.error("Parsing error:", e);
                    
                }
            }
        };

        xhr.send(`email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`);
    });
});
</script>

</body>
</html>
