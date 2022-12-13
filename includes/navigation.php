<?php
  include __DIR__ . "/../source/connection.php";
  include __DIR__ . "/../source/helpers.php";
  $especialties = getEspecialties($conn);
?>
<nav class="navbar navbar-expand-lg navigation" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="" class="img-fluid">
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icofont-navigation-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarmain">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="about.php">Sobre nós</a></li>
                <li class="nav-item"><a class="nav-link" href="service.php">Serviços</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastro <i class="icofont-thin-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown02">
                        <li><a class="dropdown-item" href="register.php">Registre-se</a></li>
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="doctor.html" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Especialidades <i class="icofont-thin-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown03">
                        <?php
                          foreach ($especialties as $especialty){
                              echo "<li><a class=\"dropdown-item\" href=\"especialty.php?idEspecialty={$especialty->id}\">{$especialty->description}</a></li>";
                          }
                        ?>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                        <li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>

                        <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>