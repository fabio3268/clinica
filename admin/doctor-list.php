<?php
include __DIR__ . "/../source/connection.php";
include __DIR__ . "/../source/helpers.php";

$doctors = getDoctors($conn);

foreach ($doctors as $doctor){
    echo "<div><a href='doctor-update.php?idDoctor={$doctor->id}'>Dr(a). $doctor->name - CRM: $doctor->document - $doctor->description</a></div>";
}