<?php 

if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mdp"]))
{
    include("Models/adminDatabase.php");

    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    
    $admin = new AdminDatabase();
    $admin->ajouterAdmin($nom, $prenom, $mdp);

    include("Views/adminAjouteSuccess.php");
}
else 
{
    include("Views/error.php");
}




?>