<?php

function getDoctors ($conn) {
    $query = "SELECT name, doctors.id, specialties.description, document
              FROM doctors 
              JOIN specialties ON doctors.specialty_id = specialties.id";
    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}

function getDoctor ($conn, int $doctorId){
    $query = "SELECT name, doctors.id, specialties.description, document
              FROM doctors 
              JOIN specialties ON doctors.specialty_id = specialties.id
              WHERE doctors.id = {$doctorId}";
    $stmt = $conn->query($query);
    return $stmt->fetch();
}

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