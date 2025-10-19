<?php require 'components/header.php'; ?>
<style>
    @font-face {
        font-family: 'Regular';
        src: url("./frontend/assets/fonts/Poppins-Regular.ttf") format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    .dash-text{
        position:absolute;
        top:2.777777777777778vh;
        right:1.5625vw;
        color:#353572;
        font-size:1.8vh;
        font-family:'Regular';
        margin:0px;
        padding:0px;
    }
    main{
        position:absolute;
        top:0px;
        right:0px;
        width: 75vw;
        height:100vh;
    }
    .wb-a{
        margin:0px;
        padding:0px;
        font-size:4.55555555vh;
        font-family:'Regular';
        color:#353572;
        font-weight:lighter;
    }
    .___l_add{
        margin-left:3vw;
    }
    .___l_add a{
        padding:1.5vh 2.5vw;
        color:white;
        text-decoration:none;
        font-size:1.8vh;
        font-family:'Regular';
        background:#9E258D;
        border-radius:3vh;
        margin-right:2vw;
        transition:background .3s ease-in-out;
    }
    .___l_add a:hover{
        background:#353572;
    } 
    .p_header{
        display:flex;
        margin-top:8.333333333vh;
        margin-left:3.125vw;
        justify-content:flex-start;
        align-items:center;
    }
    #category {
        padding: 1.6vh 3vw 1.6vh 2.5vw; 
        color: #4F469D;
        background-color: white;
        border: .1vh solid #4F469D;
        border-radius: 3vh;
        text-align: center;
        font-size: 1.8vh;
        font-family: 'Regular';
        cursor: pointer;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        transition: all .1s ease-in-out;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAiIGhlaWdodD0iNiIgdmlld0JveD0iMCAwIDEwIDYiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBvbHlnb24gcG9pbnRzPSIxLDIgNSw1IDksMiIgc3R5bGU9ImZpbGw6IzdGOTkxRDtzdHJva2U6Izc0NDY5RCIgc3Ryb2tlLXdpZHRoPSIyIi8+PC9zdmc+');
        background-repeat: no-repeat;
        background-position: right 1.5vw center;
    }

    #category::-ms-expand {
        display: none;
    }

    #category option {
        background-color: white; 
        color: #4F469D;
        text-align: left;
    }

    #category:hover {
        background-color: #4F469D; 
        color: white;
    }

    #category:focus {
        outline: none;
    }

    

</style>
<h1 class="dash-text">HRBEE ACADEMY CMS 1.0</h1>

<main>
<div class="p_header">
<h1 class="wb-a">Programet</h1>
<div class="___l_add">
    <a href="dashboard-programet-add">Publiko një program</a>
    <a href="dashboard-programet-shabllonat">Shabllonat</a>
    <select name="category" id="category">
        <option value=" ">All </option>
        <option value="active" default selected>Active </option>
        <option value="inactive">Inactive </option>
    </select>
</div>

</div>
<?php require 'components/programet.php'; ?>
</main>

<script>
window.addEventListener('pageshow', function(event) {
    
    if (event.persisted) {
        
        window.location.reload();
    }
});


const selekti = document.querySelector('#category');

selekti.addEventListener('change', () => {
    if (selekti.value === 'active') {
        document.querySelectorAll('.st-inactive').forEach(klas => {
            klas.style.display = "none";
        });
        document.querySelectorAll('.st-active').forEach(klas => {
            klas.style.display = "flex";
        });
    } else if (selekti.value === 'inactive') {
        document.querySelectorAll('.st-active').forEach(klas => {
            klas.style.display = "none";
        });
        document.querySelectorAll('.st-inactive').forEach(klas => {
            klas.style.display = "flex";
        });
    } else {
        document.querySelectorAll('.st-active').forEach(klas => {
            klas.style.display = "flex";
        });
        document.querySelectorAll('.st-inactive').forEach(klas => {
            klas.style.display = "flex";
        });
    }
});

</script>


</body>
</html>