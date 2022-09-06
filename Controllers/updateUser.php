<?php include('Models/userDatabase.php'); ?>


<?php 

    $idUser = $_POST["id"];
    $locomotion = $_POST["locomotion"];
    $departement = $_POST["departement"];
    $activite = $_POST["activite"];
    $souper = $_POST["souper"];

    $admin = new UserDatabase();
    $update = $admin->editUser($idUser, $locomotion, $departement, $activite, $souper);
    include("Views/accueil.php");

