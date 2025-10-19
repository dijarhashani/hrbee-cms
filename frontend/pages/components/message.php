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


   
</style>

<div class="popup-message">
    <p></p>
    <div class="pmm_btn">
        Mbyll
    </div>
</div>




<style>
     @media screen and (max-width: 1000px) {

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
<script>
    document.querySelector('.pmm_btn').addEventListener('click', () => {
        var pmpm = document.querySelector('.popup-message');
        pmpm.style.display = "none";
    });
</script>