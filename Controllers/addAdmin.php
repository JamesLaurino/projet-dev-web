<?php 

if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mdp"]))
{
    include("Models/adminDatabase.php");

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mdp = $_POST["mdp"];
    
    $admin = new AdminDatabase();
    $admin->ajouterAdmin($nom, $prenom, $mdp);

    include("Views/adminAjouteSuccess.php");
}
else 
{
    include("Views/error.php");
}




?>