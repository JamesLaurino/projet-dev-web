<?php 

include("Models/validerActivite.php");

if(isset($_POST["idActivite"]))
{
    $idUser = $_SESSION["id"];
    $nomActivite = htmlspecialchars($_POST["nomActivite"]);
    $souper = htmlspecialchars($_POST["radioCheck"]);

    $valider = new ValidationDatabase();
    $valider->validationActivite($idUser, $nomActivite);
    $valider->validationSouper($idUser, $souper);

    $_SESSION["validationActivite"] = true;
    include("Views/validationActivite.php");
    
}
