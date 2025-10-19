
<style>
.popup-message {
    position: fixed;
    left: 0px;
    top: 3vh;
    width: 100vw;
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 100;
    transition: transform .3s ease-in-out;
    transform: translateY(-30vh);
}

.popup {
    width: 25vw;
    height: 12vh;
    background: white;
    filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 3vh;
}

.popup p {
    font-size: 2vh;
    font-weight: bolder;
    font-family: 'Regular';
    margin-left: 1.2vw;
    color: #9E258D;
}

.popme-close {
    font-size: 1.7vh;
    font-family: 'Regular';
    font-weight: bolder;
    padding: 1vh 1.8vh;
    border-radius: 50%;
    border: .1vh solid #353572;
    color: #353572; 
    cursor: pointer;
    transition: .3s ease-in-out;
    margin-right: 1.2vw;
}

.popme-close:hover {
    background: #353572;
    color: white;
}

.pmpm_active {
    transform: translateY(0); 
}

</style>



<div class="popup-message">
    <div class="popup">
        <p></p>
        <div class="popme-close">X</div>

    </div>
</div>



<script>
   document.querySelector('.popme-close').addEventListener('click', () => {
    var pmpm = document.querySelector('.popup-message');
    pmpm.classList.remove('pmpm_active');
    setTimeout(() => {
        pmpm.style.display = "none";
    }, 300);
});
</script>
