<style>
    .apply-form {
        width: 100%;
        margin-top: 12vh;
    }
    .apply-form h1 {
        margin: 0px;
        padding: 0px;
        color: #353572;
        font-size: 2vh;
        font-family: 'Bold';
        margin-bottom: -1.5vh;
    }
    .af-line {
        width: 100%;
        height: .2vh;
        background: #353572;
        border-radius: 3vh;
    }
    .apply-form form {
        width: 100%;
        margin: 0px;
        padding: 0px;
        margin-top: 3vh;
    }
    .f-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-grow: 1;
    }
    .f-row label {
        display: block;
        text-align: left;
        margin-bottom: 2vh;
    }
    .f-row h3 {
        margin: 0px;
        padding: 0px;
        color: #353572;
        font-size: 1.8vh;
        font-family: 'Regular';
        margin-bottom: 1.5vh;
    }
    .f-row input, .f-row select {
        border: 0px;
        background: #F1F2F2;
        width: 16.71875vw;
        height: 5vh;
        border-radius: 1vh;
        font-size: 1.8vh;
        font-family: 'Regular';
        padding: 0px 2vh;
    }
    .apply-form button {
        outline: none;
        background: #91278D;
        color: white;
        border: 0px;
        border-radius: 3vh;
        font-size: 2vh;
        font-family: 'Regular';
        padding: 1.5vh 4vw;
        cursor: pointer;
        margin-top: 3vh;
        transition: all .3s ease-in-out;
        position: relative;
    }
    .apply-form button:hover {
        background: transparent;
        border: .1vh solid #91278D;
        color: #91278D;
    }
    .apply-form {
        margin-bottom: 5vh;
    }
    .apf-company {
        display: none;
    }
    @media screen and (max-width: 1000px) {
        .apply-form h1 {
            margin: 0px;
            padding: 0px;
            color: #353572;
            font-size: 2.4vh;
            font-family: 'Bold';
            margin-bottom: -1.5vh;
        }
        .pppe_e {
            font-size: 1.4vh;
            font-family: 'Regular';
            color: #353572;
            margin: 2vh 0px;
        }
        .all_desc p{
            font-size: 1.4vh;
            font-family:'Regular';
            color:#353572;
            margin:0px !important;
            padding:0px !important;
        }
        .f-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            flex-grow: 1;
        }
        .f-row label {
            display: block;
            text-align: left;
            margin-bottom: 2vh;
            width: 100%;
        }
        .f-row input, .f-row select {
            border: 0px;
            background: #F1F2F2;
            width: 100%;
            height: 5vh;
            border-radius: 1vh;
            font-size: 1.8vh;
            font-family: 'Regular';
            padding: 0px 2vh;
        }
        .apply-form button {
            outline: none;
            background: #91278D;
            color: white;
            border: 0px;
            border-radius: 3vh;
            font-size: 2vh;
            font-family: 'Regular';
            padding: 1.5vh 30vw;
            margin-top: 3vh;
            transition: all .3s ease-in-out;
            position: relative;
        }
        .apply-form {
            width: 100%;
            margin-top: 6vh;
        }
    }

</style>

<div class="apply-form">
    <h1>Forma për Aplikim</h1>
    <p class="pppe_e">Ju lutem qe ti plotesoni te gjitha fushat e nevojshme ne menyre qe aplikimi te jete i suksesshem.</p>
    <div class="af-line"></div>
    <form id="applyForm">
        <div class="f-row">
            <label for="name"><h3>Emri (*)</h3><input type="text" id="name" name="name"></label>
            <label for="surname"><h3>Mbiemri (*)</h3><input type="text" id="surname" name="surname"></label>
            <label for="profession"><h3>Profesioni juaj (*)</h3><input type="text" id="profession" name="profession"></label>
        </div>
        <div class="f-row">
            <label for="currently_working"><h3>A punoni aktualisht (*)</h3>
                <select id="currently_working" name="currently_working">
                    <option value=" "></option>
                    <option class="apg-jo" value="Jo">Jo</option>
                    <option class="apf-po" value="Po">Po</option>
                </select>
            </label>
            <label class="apf-company" for="company"><h3>Kompania (*)</h3><input type="text" id="company" name="company"></label>
            <label for="email"><h3>E-mail (*)</h3><input type="email" id="email" name="email"></label>
        </div>
        <div class="f-row">
            <label for="phone_number"><h3>Numri i telefonit (*)</h3><input type="text" id="phone_number" name="phone_number"></label>
            <label for="city"><h3>Qyteti (*)</h3><select name="city" id="city">
                <option value=" "></option>
                <option value="Deçan">Deçan</option>
                <option value="Dragash">Dragash</option>
                <option value="Drenas">Drenas</option>
                <option value="Ferizaj">Ferizaj</option>
                <option value="Fushë Kosovë">Fushë Kosovë</option>
                <option value="Gjakova">Gjakova</option>
                <option value="Gjilan">Gjilan</option>
                <option value="Istog">Istog</option>
                <option value="Kaçaniku">Kaçaniku</option>
                <option value="Dardanë">Dardanë</option>
                <option value="Klinë">Klinë</option>
                <option value="Lipjan">Lipjan</option>
                <option value="Malishevë">Malishevë</option>
                <option value="Mitrovicë">Mitrovicë</option>
                <option value="Kastriot">Kastriot</option>
                <option value="Pejë">Pejë</option>
                <option value="Besianë">Besianë</option>
                <option value="Prishtinë">Prishtinë</option>
                <option value="Prizreni">Prizreni</option>
                <option value="Rahoveci">Rahoveci</option>
                <option value="Skenderaj">Skenderaj</option>
                <option value="Therandë">Therandë</option>
                <option value="Shtërpc">Shtërpc</option>
                <option value="Shtime">Shtime</option>
                <option value="Viti">Viti</option>
                <option value="Vushtrri">Vushtrri</option>
            </select></label>
            <label for="source"><h3>Ku keni degjuar per kete trajnim (*)</h3><input type="text" id="source" name="source"></label>
        </div>
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        <button type="button" onclick="submitForm()">Apliko</button>
    </form>
</div>

<?php require 'components/message.php'; ?>

<script>
    var apf_po = document.querySelector('#currently_working');
    var ap_company = document.querySelector('.apf-company');
    ap_company.style.display = "none";
    
    apf_po.addEventListener('change', () => {
        const apf = apf_po.value;
        if (apf === "Po") {
            ap_company.style.display = 'block';
        } else {
            ap_company.style.display = 'none';
        }
    });

    function submitForm() {
        const form = document.getElementById('applyForm');
        const inputs = form.querySelectorAll('input, select');
        let allFilled = true;

        inputs.forEach(input => {
            if (input.value.trim() === '' && input.type !== 'hidden' && input.name !== 'company') {
                allFilled = false;
                input.style.border = '1px solid red';
            } else {
                input.style.border = '';
            }
        });

        if (allFilled) {
            const formData = new FormData(form);
            formData.append('token', 'hr/bee-admin@dijarbossi.com-hello');
            
            fetch('backend/apply.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                var popup_m = document.querySelector('.popup-message');
                popup_m.style.display = 'flex';

                const pm_t = document.querySelector('.popup-message p');
                pm_t.textContent = data.message;
                if (data.success) {
                    form.reset();
                    ap_company.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
           
            var popup_m = document.querySelector('.popup-message');
                popup_m.style.display = 'flex';

                const pm_t = document.querySelector('.popup-message p');
                pm_t.textContent = 'Ju lutemi plotësoni të gjitha fushat e detyrueshme.';
        }
    }
</script>
