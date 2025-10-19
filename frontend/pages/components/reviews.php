<?php
require dirname(__DIR__, 3) . '/backend/database/connect.php';

$sql = "SELECT name, position, description, photo_path FROM reviews";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo 'Reviews not found.';
    exit;
}

$stmt->close();
$conn->close();
?>

<style>
    .reviews {
        width: 80%;
        margin: 0 auto;
        padding: 0;
        margin-bottom: 3vh;
    }
    .a-r1 {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        position: relative;
        
    }
    .a-r1 p {
        font-family: 'Semi Bold';
        font-size: 1.9vh;
        color: #9E258D;
        padding: 0;
        margin: 0;
    }
    .r-line {
        height: 0.2vh;
        flex-grow: 1;
        background: #9E258D;
        margin: 0 2vh;
    }
    .reviews-container {
        overflow: hidden;
        position: relative;
        width: 100%;
        margin-top: 2vh;
        margin-bottom: 5vh;
        padding: 5vh 0;
    }
    .reviews-wrapper {
        display: flex;
        transition: transform 1s ease-in-out;
        align-items: center;
        justify-content: center;
    }
    .review-item {
        width: 25%;
        padding: 4vh 2vw;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        background: white;
        border-radius: 1vh;
        flex-shrink: 0;
        margin: 0px 1.5vw;
        height: 50vh;
    }
    .ri-item {
        display: flex;
        width: 100%;
        justify-content: flex-start;
        align-items: center;
        border-bottom: 0.3vh solid #E3E3E3;
        padding-bottom: 2vh;
    }
    .person-image {
        width: 5.2083333vw;
        height: 5.2083333vw;
        background: #F1F1F1;
        border-radius: 50%;
        margin-right: 2vh;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-color: #F3F3F3 !important;
    }
    .rit-t h3 {
        font-size: 2vh;
        font-family: 'Regular';
        color: #9E258D;
        margin: 0;
        padding: 0;
    }
    .rit-t p {
        font-size: 1.5vh;
        font-family: 'Regular';
        color: #9E258D;
        margin: 0;
        padding: 0;
    }
    .ri-d {
        font-size: 1.7vh;
        font-family: 'Regular';
        color: #686868;
        margin: 0;
        text-align:center;
        padding: 0;
        margin-top: 2vh;
    }
    .r-line {
        height: 0.2vh;
        flex-grow: 1;
        background: #9E258D;
        margin: 0 2vh;
        display: none;
    }

   
    @media (max-width: 1000px) {
        .review-item {
            width: 80vw;
            margin: 0px 6vw !important;
            margin: 0;
            padding: 2vh 4vw;
            height: auto;
            height: 40vh;
        }


        .reviews-wrapper {
            transform: translateX(0%);
        }

        .person-image {
            width: 20vw;
            height: 20vw;
            margin-right: 4vw;
        }

      

        .rit-t p {
            font-size: 1.5vh;
        }

        .ri-d {
            font-size: 2.5vh;
            margin-top: 4vh;
        }
        .reviews {
            width: 100%;
            margin: 0 auto;
            padding: 0;
            margin-bottom: 3vh;
        }
        .reviews-container {
            overflow: hidden;
            position: relative;
            width: 100vw;
            margin-top: 2vh;
            margin-bottom: 5vh;
            padding: 5vh 0;
        }
        .reviews-wrapper {
            display: flex;
            transition: transform 1s ease-in-out;
            align-items: center;
            justify-content: flex-start;
            width: 100vw;
        }
        .rit-t h3 {
            font-size: 2vh;
        }
        .ri-d {
            font-size: 1.4vh;
            margin-top: 4vh;
        }
        .a-r1 p {
            font-family: 'Semi Bold';
            font-size: 2.5vh;
            color: #9E258D;
            padding: 0;
            margin: 0;
            margin-top: 3vh;
        }
    }
</style>



<div class="reviews">
    <div  class="a-r1">
        <p>Vlersime nga pjesemarresit</p>
        <div class="r-line"></div>
    </div>

    <div  class="reviews-container">
        <div class="reviews-wrapper">
            <?php
            $numItems = 0;
            while ($review = $result->fetch_assoc()) : 
                $numItems++;
            ?>
                <div class="review-item">
                    <div class="ri-item">
                        <div style="<?php if (!is_null($review['photo_path'])): ?>background-image:url('frontend/uploads/reviews/<?php echo htmlspecialchars($review['photo_path']); ?>');<?php endif; ?>" class="person-image"></div>
                           
                        <div class="rit-t">
                            <h3><?php echo htmlspecialchars($review['name']); ?></h3>
                            <p><?php echo htmlspecialchars($review['position']); ?></p>
                        </div>
                    </div>
                    <div class="ri-d"> <?php echo $review['description']; ?> </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalItems = <?php echo $numItems; ?>;

        if (window.innerWidth <= 1000) {
            if (totalItems > 1) {
                const wrapper = document.querySelector('.reviews-wrapper');
                let currentIndex = 0;

                function updateCarousel() {
                    let offset = currentIndex * -100;
                    wrapper.style.transform = `translateX(${offset}vw)`;
                }

                setInterval(() => {
                    currentIndex++;
                    if (currentIndex >= totalItems) {
                        currentIndex = 0;
                    }
                    updateCarousel();
                }, 3000);
            }
        } else {
            
            if (totalItems >= 4) {
                const wrapper = document.querySelector('.reviews-wrapper');
                let currentIndex = 0;

                function updateCarousel() {
                    let offset = currentIndex * -25;
                    wrapper.style.transform = `translateX(${offset}%)`;
                }

                setInterval(() => {
                    currentIndex++;
                    if (currentIndex >= totalItems - 3) {
                        currentIndex = 0;
                    }
                    updateCarousel();
                }, 3000);
            }
        }
    });
</script>
