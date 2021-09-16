<?php

    require("./funcoes.php");

    $idEmployee = $_POST["idEmployee"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $ip_address = $_POST["ip_address"];
    $country = $_POST["country"];
    $department = $_POST["department"];
    $gender = $_POST["gender"];

    $editedEmployee = new stdClass;
    $editedEmployee->id = $idEmployee;
    $editedEmployee->first_name = $first_name;
    $editedEmployee->last_name = $last_name;
    $editedEmployee->email = $email;
    $editedEmployee->gender = $gender;
    $editedEmployee->ip_address = $ip_address;
    $editedEmployee->country = $country;
    $editedEmployee->department = $department;

    editEmployee("./empresaX.json", $editedEmployee);

    header('Location: ./index.php');