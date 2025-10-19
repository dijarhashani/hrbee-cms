<?php
require dirname(__DIR__, 4) . '/backend/database/connect.php';


if (isset($_GET['shabllon_id']) && is_numeric($_GET['shabllon_id'])) {
    $shabllon_id = intval($_GET['shabllon_id']);

    $sql = "SELECT shabllon_text FROM shabllonat WHERE shabllon_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['error' => 'Prepare failed: ' . htmlspecialchars($conn->error)]);
        exit;
    }

    $stmt->bind_param("i", $shabllon_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['shabllon_text' => $row['shabllon_text']]);
    } else {
        echo json_encode(['error' => 'No shabllon found.']);
    }

    $stmt->close();
    $conn->close();
    exit;
}


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo 'Program ID is not specified or invalid.';
    echo '<script>window.location.href = "dashboard-programet";</script>';
    exit;
}

$course_id = intval($_GET['id']);

$sql = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No program found.";
    exit();
}

$sql_shabllonat = "SELECT shabllon_id, shabllon_name, shabllon_text FROM shabllonat";
$result_shabllonat = $conn->query($sql_shabllonat);

if ($result_shabllonat === false) {
    echo "Error: " . $conn->error;
    exit();
}

$stmt->close();
$conn->close();
?>
<style>
   html, body{
        overflow:hidden;
    }
    .all_edit{
        width: 72%;
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
    .all_edit::-webkit-scrollbar {
        display: none;
    }

    .all_edit {
        -ms-overflow-style: none;  
        scrollbar-width: none;     
    }
    .edit_box{
        padding:4vh 2vw;
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
       
    }
    .edit_settings{
        width: 25%;
        height:70vh;
        overflow-y:scroll;
        overflow-x: visible;
        display:flex;
        justify-content:flex-start;
        align-items:center;
        flex-direction:column;
        border-radius:3vh;
        background:white;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
        position:relative;
    }
    ._flexx{
        width: 70vw;
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        margin-left:2.525vw;
        margin-top:3.777777777777778vh;
    }
    .edit_settings::-webkit-scrollbar {
        display: none;
    }

    .edit_settings {
        -ms-overflow-style: none;  
        scrollbar-width: none;     
    }
    #title-text{
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
    }
    #title-text input{
        border:0px;
        padding:.5vh 2vw; 
        width: 70%;
        outline:none;
        border-bottom:.3vh solid #353572;
        margin-bottom:4vh;
        font-size:3vh;
        font-family:'Regular';
        color:#353572;
        text-align:center;

    }
    .tox {
    width: 100% !important;
}
.tox::-webkit-scrollbar {
        display: none;
    }
    .in_settings{
        width: 90%;
        padding:1vh 1vw;
        position:relative;
    }
    .ins_header{
        margin:0px;
        padding:0px;
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .in_settings h1{
        
        text-align:center;
        font-size:2.3vh;
        font-family:'Regular';
        margin-top:2vh;
        color:#353572;
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
        position: sticky;
        margin-left: -10%;
        background: white;
        bottom: 0vh;
        padding-bottom: 2vh;
        left: 0px;
    }
    .status{
        width: 100%;
        margin: 2vh 0px;

    }
    .status h3{
        margin:0px;
        padding:0px;
        font-size:1.5vh;
        font-family:'Regular';
        color:#9E258D;
        margin-bottom:1.5vh;
    }
    .status select{
        width: 100%;
        padding:1vh 1vw;
        border: .1vh solid #353572;
        outline:none;
        border-radius:1vh;
        color:#353572;
        font-family:'Regular';
        font-size:2vh;
    }
    .status input{
        width: 87%;
        padding:1vh 1vw;
        border: .1vh solid #353572;
        outline:none;
        border-radius:1vh;
        color:#353572;
        font-family:'Regular';
        font-size:2vh;
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
    }

    .custom-file-upload:hover {
        background: #353572;
        color: white;
    }

    #image-preview img {
        border-radius: 1vh;
        filter: drop-shadow(0px 0vh 2vh #DBDBDB);
    }

</style>
<div class="_flexx">
    <div class="all_edit">
        <div class="edit_box">
            <form id="title-text">
                <input type="text" value="<?php echo htmlspecialchars($row['course_name']); ?>" name="title" id="title">
                <textarea id="editor" name="text" rows="10" cols="80">
                    <?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8'); ?>
                </textarea>
            </form>
        </div>
    </div>
    <div class="edit_settings">
        <div class="in_settings">
            <div class="ins_header">
                <h1>Settings</h1>
            </div>
            <div class="status">
                <h3>Imazhi i programit:</h3>
                <label for="file" class="custom-file-upload">
                    <span id="file-label">Zgjidhni një foto</span>
                    <input type="file" name="file" id="file" style="display:none;" accept="image/*">
                </label>
                <div id="image-preview" style="margin-top: 10px;">
                    <?php if (!empty($row['course_image_path'])): ?>
                        <img src="frontend/uploads/programs/<?php echo htmlspecialchars($row['course_image_path']); ?>" alt="Program Image" style="max-width: 100%;">
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="status">
                <h3>Statusi:</h3>
                <select name="status" id="status">
                    <option value="inactive" <?php if ($row['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                    <option value="active" <?php if ($row['status'] == 'active') echo 'selected'; ?>>Active</option>
                </select>
            </div>
            <div class="status">
                <h3>Kategoria:</h3>
                <select name="category" id="category">
                    <option value="course" <?php if ($row['course_category'] == 'course') echo 'selected'; ?>>Course</option>
                    <option value="academy" <?php if ($row['course_category'] == 'academy') echo 'selected'; ?>>Academy</option>
                </select>
            </div>
            <div class="status">
                <h3>Shablloni:</h3>
                <select name="shablloni" id="shablloni">
                    <option value=" ">Selekto Shabllonin</option>
                    <?php while ($shabllon = $result_shabllonat->fetch_assoc()) { ?>
                        <option value="<?php echo htmlspecialchars($shabllon['shabllon_id']); ?>" >
                            <?php echo htmlspecialchars($shabllon['shabllon_name']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="status">
                <h3>Data e fillimit:</h3>
                <input type="date" name="date" id="date" value="<?php echo htmlspecialchars($row['start_date']); ?>">
            </div>
            
            <div class="all_btn">
                <button class="__btn">Update</button>
                <button class="__btn delete-btn" onclick="deleteForm()">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>
  document.getElementById('shablloni').addEventListener('change', function() {
    const shabllonId = this.value;

    if (shabllonId !== "") {
        fetch(`backend/get_shabllon_text.php?shabllon_id=${shabllonId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.shabllon_text) {
                    tinymce.get('editor').setContent(data.shabllon_text);
                } else {
                    console.error('Error:', data.error);
                }
            })
            .catch(error => console.error('Error:', error));
    }
});

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
    formData.append('course_id', <?php echo json_encode($course_id); ?>);
    formData.append('title', document.getElementById('title').value);
    formData.append('text', tinymce.get('editor').getContent());
    formData.append('status', document.getElementById('status').value);
    formData.append('category', document.getElementById('category').value);
    formData.append('start_date', document.getElementById('date').value);
    const fileInput = document.getElementById('file');
    if (fileInput.files[0]) {
        formData.append('file', fileInput.files[0]);
    }

    fetch('backend/program-update.php', {
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





function deleteForm() {
    
    if (!confirm("Are you sure you want to delete this post?")) {
        return; 
    }

    var formData = new FormData();
    formData.append('token', 'hr/bee-admin@dijarbossi.com-hello');
    formData.append('course_id', '<?php echo ($course_id); ?>'); 

    fetch('backend/program-delete.php', {
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

