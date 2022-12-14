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
    <!-- Latest compiled and minified CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>.:: Clínica - Área Administrativa ::..</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Perfil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Atualizar</a></li>
                        <li><a class="dropdown-item" href="#>">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Projetos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Submeter</a></li>
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
        <select name="category" class="form-select">
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