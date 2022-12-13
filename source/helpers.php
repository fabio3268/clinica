<?php

function getEspecialties ($conn){
    $query = "SELECT * 
              FROM specialties";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}

function getDoctorsBySpecialty ($conn, int $specialtyId){
    $query = "SELECT * 
              FROM doctors
              JOIN specialties ON doctors.specialty_id = specialties.id
              WHERE specialty_id = {$specialtyId}";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}