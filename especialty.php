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
<section class="section about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color">Médicos</h2>
                    <?php
                        $specialtyId = filter_input(INPUT_GET, "idEspecialty");
                        $doctors = getDoctorsBySpecialty($conn,$specialtyId);
                    ?>
                    <p class="mt-4 mb-5">Lista de Médicos - <?=$doctors[0]->description; ?></p>
                    <?php
                      foreach ($doctors as $doctor){
                          echo "<p class=\"mt-4 mb-5\">Nome Dr(a).: {$doctor->name} - CRM: {$doctor->document}</p>";
                      }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

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


