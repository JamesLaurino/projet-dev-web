<?php include('Models/userDatabase.php'); ?>


<?php 

    $idUser = htmlspecialchars($_POST["id"]);
    $locomotion = htmlspecialchars($_POST["locomotion"]);
    $departement = htmlspecialchars($_POST["departement"]);
    $activite = htmlspecialchars($_POST["activite"]);
    $souper = htmlspecialchars($_POST["souper"]);

    $admin = new UserDatabase();
    $update = $admin->editUser($idUser, $locomotion, $departement, $activite, $souper);
    include("Views/accueil.php");

