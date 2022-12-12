<?php
   include __DIR__ . "/../source/connection.php";
   $query = "SELECT * 
             FROM specialties";
   $stmt = $conn->query($query);
   $specialties = $stmt->fetchAll();
?>
<form id="doctor-register">
    <div>
        Nome: <input name="name" type="text">
    </div>
    <div>
        CRM: <input name="document" type="text">
    </div>
    <div>
        Especialidade:
        <select name="specialty">
            <?php
              foreach ($specialties as $specialty){
                echo "<option value='{$specialty->id}'>{$specialty->description}</option>";
              }
            ?>
        </select>
    </div>
    <button>Salvar</button>
</form>
<div id="message"></div>
<script type="text/javascript" async>
    const form = document.querySelector("#doctor-register");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async  (e) => {
        e.preventDefault();
        const dataDoctor = new FormData(form);
        const data = await fetch("http://localhost/clinica/api/doctor-insert.php", {
            method : "POST",
            body : dataDoctor
        });
        const doctor = await data.json();
        console.log(doctor);
        message.setAttribute("style","display");
        if(doctor.type === "success"){
            message.classList.remove("alert-danger");
            message.classList.add("alert-success");
        } else {
            message.classList.remove("alert-success");
            message.classList.add("alert-danger");
        }
        message.textContent = doctor.message;
        setTimeout(() => {
            message.setAttribute("style","display: none");
        },3000);
    });
</script>
