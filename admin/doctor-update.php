<?php
    include __DIR__ . "/../source/connection.php";
    include __DIR__ . "/../source/helpers.php";

    $idDoctor = filter_input(INPUT_GET, "idDoctor");

    $doctor = getDoctor($conn,$idDoctor);
    var_dump($doctor);
?>