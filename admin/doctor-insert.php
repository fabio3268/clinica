<?php
   include __DIR__ . "/../source/connection.php";
   include __DIR__ . "/../source/helpers.php";
   $specialties = getEspecialties($conn);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>.:: Clínica - Área Administrativa ::..</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home - Adm</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Perfil Administrador
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Atualizar</a></li>
                        <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Médicos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="doctor-insert.php">Criar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
<form id="doctor-register">
    <div class="form-group">
        <label for="name">Nome: </label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nome do Médico...">
    </div>
    <div class="form-group">
        <label for="document">CRM:</label>
        <input type="document" name="document" class="form-control" id="document" placeholder="CRM do Médico...">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Especialidade</label>
        <select name="specialty" class="form-control" id="exampleFormControlSelect1">
            <option value="">Selecione Especialidade...</option>
            <?php
            foreach ($specialties as $specialty){
                echo "<option value='{$specialty->id}'>{$specialty->description}</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <div class="form-group">
        <div id="message" class="alert" style="display: none">
        </div>
    </div>
</form>
</div>
</body>
</html>
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
