<?php
require dirname(__DIR__, 4) . '/backend/database/connect.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo 'Application ID is not specified or invalid.';
    exit;
}

$application_id = intval($_GET['id']);

// Fetch the application data
$sql = "SELECT * FROM applications WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $application_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No application found.";
    exit();
}


$sql_courses = "SELECT id, course_name, status FROM courses";
$result_courses = $conn->query($sql_courses);

if ($result_courses === false) {
    
    echo "Error: " . $conn->error;
    exit();
}

$active_courses = [];
$inactive_courses = [];

if ($result_courses->num_rows > 0) {
    while ($course = $result_courses->fetch_assoc()) {
        if ($course['status'] == 'active') {
            $active_courses[] = $course;
        } else {
            $inactive_courses[] = $course;
        }
    }
}

$stmt->close();
$conn->close();
?>




<style>
          html, body{
        overflow:hidden;
    }
.ap-detajet{
    margin-left:3.125vw;
    width: 65vw;
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
.ap-detajet::-webkit-scrollbar {
    display: none;
}

.ap-detajet {
    -ms-overflow-style: none;  
    scrollbar-width: none;     
}
#ap-d-s{
    width: 90%;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
}
#ap-d-s div{
    display:flex;
    align-items:center;
    justify-content:space-between;
    width: 100%;
    margin-bottom:2vh;
}
#ap-d-s label{
    width: 30%;
    padding:0px 1.5%;
    overflow:hidden;
}
#ap-d-s h3{
    font-size:1.7vh;
    font-family:'Regular';
    color:#9E258D;
    margin:0px;
    padding:0px;
    margin-bottom: 1vh;
}
#ap-d-s h1{
    color:#353572;
    font-size:4vh;
    font-family:'Regular';
    margin-top:3vh;
    margin-bottom:3vh;
}
#ap-d-s input{
    width: 87%;
    outline:none;
    stroke:none;
    border: 0px;
    border-bottom:.1vh solid #353572;
    padding:1vh 1vw;
    color:#353572;
    font-size:2vh;
    font-family:'Regular';
    margin-bottom: 1vh;
    

}
#ap-d-s select{
    width: 100%;
    outline:none;
    stroke:none;
    border: 0px;
    border-bottom:.1vh solid #353572;
    padding:1vh 1vw;
    color:#353572;
    font-size:2vh;
    font-family:'Regular';
    margin-bottom: 1vh;
    

}
#ap-d-s button{
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
#ap-d-s button:hover{
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




<div class="ap-detajet">
    <form id="ap-d-s">
        <h1><?php echo htmlspecialchars($row['name']); ?> <?php echo htmlspecialchars($row['surname']); ?></h1>
        <div class="na-su-pr">
            <label for="name">
                <h3>Emri:</h3>
                <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
            </label>
            <label for="surname">
                <h3>Mbiemri:</h3>
                <input type="text" name="surname" value="<?php echo htmlspecialchars($row['surname']); ?>">
            </label>
            <label for="profession">
                <h3>Profesioni:</h3>
                <input type="text" name="profession" value="<?php echo htmlspecialchars($row['profession']); ?>">
            </label>
        </div>
        <div class="p-k-em">
            <label for="puna">
                <h3>A punoni aktualisht:</h3>
                <select name="apa" id="apa">
                    <option value="po" <?php if ($row['currently_working'] == 'po') echo 'selected'; ?>>Po</option>
                    <option value="jo" <?php if ($row['currently_working'] == 'jo') echo 'selected'; ?>>Jo</option>
                </select>
            </label>
            <label for="company">
                <h3>Kompania:</h3>
                <input type="text" name="company" value="<?php echo htmlspecialchars($row['company']); ?>">
            </label>
            <label for="email">
                <h3>Emaili:</h3>
                <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
            </label>
        </div>
        <div class="t-q-k">
            <label for="tel">
                <h3>Telefoni:</h3>
                <input type="tel" name="tel" value="<?php echo htmlspecialchars($row['phone_number']); ?>">
            </label>
            <label for="city">
                <h3>Qyteti:</h3>
                <select name="city" id="city">
                    <?php
                    $cities = ["Deçan", "Dragash", "Drenas", "Ferizaj", "Fushë Kosovë", "Gjakova", "Gjilan", "Istog", "Kaçaniku", "Dardanë", "Klinë", "Lipjan", "Malishevë", "Mitrovicë", "Kastriot", "Pejë", "Besianë", "Prishtinë", "Prizreni", "Rahoveci", "Skenderaj", "Therandë", "Shtërpc", "Shtime", "Viti", "Vushtrri"];
                    foreach ($cities as $city) {
                        echo "<option value=\"$city\" " . ($row['city'] == $city ? 'selected' : '') . ">$city</option>";
                    }
                    ?>
                </select>
            </label>
            <label for="heard_about">
                <h3>Ku keni dëgjuar për këtë trajnim:</h3>
                <input type="text" name="heard_about" value="<?php echo htmlspecialchars($row['source']); ?>">
            </label>
        </div>
        <div class="s-f">
            <label for="statusi">
                <h3>Statusi:</h3>
                <select name="status" id="status">
                    <option value="a" <?php if ($row['status'] == 'a') echo 'selected'; ?>>Aplikim i ri</option>
                    <option value="b" <?php if ($row['status'] == 'b') echo 'selected'; ?>>I/E Konfirmuar</option>
                    <option value="c" <?php if ($row['status'] == 'c') echo 'selected'; ?>>E Paguar</option>
                    <option value="d" <?php if ($row['status'] == 'd') echo 'selected'; ?>>Anuluar</option>
                    <option value="p" <?php if ($row['status'] == 'p') echo 'selected'; ?>>Kandidat Potencial</option>
                </select>
            </label>
            <label for="faktura">
                <h3>Faktura:</h3>
                <input type="text" name="faktura" value="<?php echo htmlspecialchars($row['faktura']); ?>">
            </label>
            <label for="course_id">
                <h3>Transfero:</h3>
                <select name="course_id" id="course_id">
                    <optgroup label="Trajnimet Aktive">
                        <?php foreach ($active_courses as $course): ?>
                            <option value="<?php echo $course['id']; ?>" <?php if ($row['course_id'] == $course['id']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($course['course_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </optgroup>
                    <optgroup label="Trajnimet Joaktive">
                        <?php foreach ($inactive_courses as $course): ?>
                            <option value="<?php echo $course['id']; ?>" <?php if ($row['course_id'] == $course['id']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($course['course_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
            </label>
        </div>
        
        <div class="all_btn">
            <button type="button" onclick="submitForm()">Update</button>
            <button class="delete-btn" type="button" onclick="deleteForm()">Delete</button>
        </div>
        
    </form>
</div>

<script>
function submitForm() {
    var formData = new FormData(document.getElementById('ap-d-s'));
    formData.append('token', 'hr/bee-admin@dijarbossi.com-hello');
    formData.append('id', '<?php echo $application_id; ?>');
    
    fetch('backend/aplikimet-change.php', {
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






function deleteForm() {
    
    if (!confirm("Are you sure you want to delete this applicant?")) {
        return; 
    }

    var formData = new FormData();
    formData.append('token', 'hr/bee-admin@dijarbossi.com-hello');
    formData.append('id', '<?php echo $application_id; ?>'); 

    fetch('backend/aplikimet-delete.php', {
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
                history.back();
            }, 1000);
            
        });
    })
    .catch(error => console.error('Error:', error));
}
</script>
