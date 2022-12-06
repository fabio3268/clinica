<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Novena- Health & Care Medical template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="top">

<header>
    <?php
    include __DIR__ . "/includes/header.php";
    include __DIR__ . "/includes/navigation.php";
    ?>
</header>

<!-- contact form start -->

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Login</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-5">Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="login-form" class="contact__form">
                    <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div id="message" class="alert alert-success contact__msg" style="display: none"  role="alert">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder="Seu e-amail..." >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="password" id="password" type="password" class="form-control" placeholder="Sua senha...">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-main btn-round-full" name="submit" type="submit" value="Enviar"></input>
                    </div>
                </form>
                <script async>
                    const form = document.querySelector("#login-form");
                    const message = document.querySelector("#message");
                    form.addEventListener("submit", async (e) => {
                        e.preventDefault();
                        const dataUser = new FormData(form);
                        const data = await fetch("http://localhost/clinica/api/user-login.php",{
                            method: "POST",
                            body: dataUser,
                        });
                        const user = await data.json();
                        console.log(user);
                        message.textContent = user.message;
                        message.setAttribute("style","display")
                        if(user.type === "error"){
                            // trocar o status da message
                            message.classList.remove("alert-success");
                            message.classList.add("alert-danger");
                        } else {
                            // trocar o status da message
                            message.classList.remove("alert-danger");
                            message.classList.add("alert-success");
                        }
                        setTimeout(() => {
                            message.setAttribute("style","display: none")
                        }, 3000);
                    });
                </script>
            </div>
        </div>
    </div>
</section>
<div class="google-map ">
    <div id="map"></div>
</div>
<!-- footer Start -->
<?php
include __DIR__ . "/includes/footer.php";
?>

<!--
Essential Scripts
=====================================-->


<!-- Main jQuery -->
<script src="plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4.3.2 -->
<script src="plugins/bootstrap/js/popper.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/counterup/jquery.easing.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<!-- Counterup -->
<script src="plugins/counterup/jquery.waypoints.min.js"></script>

<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="plugins/counterup/jquery.counterup.min.js"></script>

<script src="js/script.js"></script>
<script src="js/contact.js"></script>

</body>
</html>