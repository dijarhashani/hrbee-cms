<?php 
// CMS HEADER - HRBEE ACADEMY
// Author: Dijar Hashani
if (!isset($_COOKIE['user_id'])) {
    header("Location: login");
    exit;
}define('ACCESS_GRANTED', true);

$current_page = basename($_SERVER['PHP_SELF']);




$filePath = dirname(__DIR__, 4) . '/frontend/pages/cms/components/img/logo.svg';
$d1 = dirname(__DIR__, 4) . '/frontend/pages/cms/components/img/d1.svg';
$d2 = dirname(__DIR__, 4) . '/frontend/pages/cms/components/img/d2.svg';
$d3 = dirname(__DIR__, 4) . '/frontend/pages/cms/components/img/d3.svg';
$d4 = dirname(__DIR__, 4) . '/frontend/pages/cms/components/img/d4.svg';
$d5 = dirname(__DIR__, 4) . '/frontend/pages/cms/components/img/d5.svg';
$d6 = dirname(__DIR__, 4) .  '/frontend/pages/cms/components/img/d6.svg';
$evolux = dirname(__DIR__, 4) .  '/frontend/pages/cms/components/img/pw-evolux.svg';



$icon = 'frontend/assets/img/icon.png';

require dirname(__DIR__, 4) . '/backend/database/connect.php';



$user_id = intval($_COOKIE['user_id']);
$sql = "SELECT name, photo FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo 'Course not found.';
    exit;
}

$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $icon;?>" type="image/icon type">
   
    <script src="frontend/pages/cms/components/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    
    
    <script>
        tinymce.init({
            selector: '#editor', 
            menubar: false,
            plugins: 'lists link code',
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
        });
    </script>
    <title>Dashboard</title>
</head>
<body>
<style>
    @font-face {
        font-family: 'Regular';
        src: url("./frontend/assets/fonts/Poppins-Regular.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    header{
        width: 25vw;
        height:100vh;
        position:fixed;
        top:0px;
        left:0px;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        background: white;
        
    }
    .logo{
        display:flex;
        justify-content:center;
        align-items:center;
        width: 100%;
        margin-top:2.777777777777778vh;

    }
    .logo svg{
        height:5.210185185185185vh;
    }
    .menu{
        width: 80%;
        margin-top:11.2962962962963vh;
        display:flex;
        justify-content:flex-start;
        flex-direction:column;

    }
    .link{
        display:flex;
        justify-content:flex-end;
        align-items:center;
        width: 100%;
        height:6.537037037037037vh;
        border-radius:3vh;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        background:white;
        margin-bottom:2.777777777777778vh;
        margin-left:-20%;
        cursor:pointer;
        transition:all .3s ease-in-out;
        
    }
    .link h1{
        font-size:1.966666666666667vh;
        font-family:'Regular';
        margin-right:1.5625vw;
        color:#9E258D;
        transition:all .3s ease-in-out;

    }
    .link svg g{
        stroke: #9E258D;
        transition:all .3s ease-in-out;
        
    }
    .link svg{
        height:3.12962962962963vh; 
        margin-right:.7vw;
    }
    .menu a:hover .link{
        width: 120%;
        background:#9E258D;
    }
    .menu a:hover h1{
        color:white;
    }
    .menu a:hover svg g{
        stroke: white;
    }
    .menu a:hover path{
        fill: white !important;
        stroke: white !important;
    }
    .menu a:hover svg line{
        stroke: white !important;
    }
    .active{
        width: 120% !important;
        background:#9E258D !important;
    }
    .active h1{
        color:white !important;
    }
    .active svg g{
        stroke: white !important;
    }
    .active path{
        fill: white !important;
    }
    .active svg line {
        stroke:white !important;
    }
    .menu a{
        text-decoration:none;
        transition:all .3s ease-in-out;
    }
    .tox-statusbar__branding{
        display:none !important;
    }
    .svg-small svg{
        width: 2vw !important;
    }
    
    
</style>




 <header>
    <div class="logo">
        <a href="home">
        <?php echo file_get_contents($filePath); ?>
        </a>
    </div>

    <div class="menu">
        <a href="dashboard">
            <div class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?> link">
                <?php echo file_get_contents($d1); ?>
                <h1>Dashboard</h1>
            </div>
        </a>
        <a href="dashboard-programet">
            <div class="_dash_programet <?php echo ($current_page == 'c-programet.php') ? 'active' : ''; ?> link">
                <?php echo file_get_contents($d2); ?>
                <h1>Programet</h1>
            </div>
        </a>
        <a href="dashboard-trajneret">
            <div class="_dash_trajneret <?php echo ($current_page == 'c-trajneret.php') ? 'active' : ''; ?> link">
                <?php echo file_get_contents($d3); ?>
                <h1>Trajnerët</h1>
            </div>
        </a>    
        <a href="dashboard-newsletter">
            <div class="<?php echo ($current_page == 'c-newsletter.php') ? 'active' : ''; ?> link">
                <?php echo file_get_contents($d4); ?>
                <h1>Buletin</h1>
            </div>
        </a>
        <a href="dashboard-reviews">
            <div class="<?php echo ($current_page == 'c-reviews.php') ? 'active' : ''; ?> _dash_review   link svg-small">
                <?php echo file_get_contents($d5); ?>
                <h1>Vlerësimet</h1>
            </div>
        </a>
        <a href="dashboard-client-potential">
            <div class="<?php echo ($current_page == 'c-potencial.php') ? 'active' : ''; ?> _dash_potential   link ">
                <?php echo file_get_contents($d6); ?>
                <h1>Kandidatët</h1>
            </div>
        </a>
    </div>


    <style>
        .admin-info{
            display:flex;
            justify-content: center;
            align-items:center;
            position:absolute;
            bottom: 2.777777777777778vh;
            left:1.5625vw;
        }
        .ai-photo{
            width: 4.59375vw;
            height: 4.59375vw;
            border-radius:50%;
            background:url('frontend/pages/cms/components/img/admin.jpg') !important;
            background-position:center !important;
            background-size:cover !important;
            background-repeat:no-repeat !important;
            background-color:#E8E3E3 !important;
        }
        .ai-double h1{
            font-size:2vh;
            font-family:'Regular';
            color:#353572;
            margin:0px;
            padding:0px;
        
        }
        .logout{
            font-size:1.8vh;
            font-family:'Regular';
            color:#9E258D;
            margin:0px;
            padding:0px;
            cursor:pointer;
            transition: color .3s ease-in-out;
        }
        .ai-double{
            margin-left:1vw;
        }
        .logout:hover{
            color:#353572;
        }
    </style>

    <div class="admin-info">
        <div class="ai-photo"></div>
        <div class="ai-double">
            <h1>Mirësevjen, <?php echo htmlspecialchars($user['name']); ?>!</h1>
            <div class="logout" onclick="logout()"> Logout</div>
        </div>
    </div>

 </header>

 <style>
    .evolux{
        position:absolute;
        bottom:2.777777777777778vh;
        right:1.5625vw;
        z-index: 10;
    }
    .evolux a{
        text-decoration:none;
        color:black;
    }
    .evolux svg{
        width: 8.208333333333333vw;
    }

 </style>

 <div class="evolux">
    <a href="https://www.instagram.com/evolux_digital/">
        <?php echo file_get_contents($evolux); ?>
    </a>
 </div>
 <script>
    function logout() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "backend/logout.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log(xhr.responseText); // Log the response to debug
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'success') {
                            window.location.href = 'login';
                        } else {
                            alert('Logout failed. No cookie found.');
                        }
                    } catch (e) {
                        alert('Failed to parse JSON response.');
                    }
                } else {
                    alert('Request failed. Status: ' + xhr.status);
                }
            }
        };
        xhr.send();
    }
</script>

