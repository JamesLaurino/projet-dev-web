<?php 
    include('Models/activiteDatabase.php'); 
    include('Models/loginDatabase.php'); 
?>

<?php 

    if(!isset($_POST["nom"]) || !isset($_POST["mdp"]))
    {
        include("Views/login.php");
    }
    
    if(isset($_POST["nom"]) && isset($_POST["mdp"]))
    {
        $nomUser = htmlspecialchars($_POST["nom"]);
        $mdpUser = htmlspecialchars($_POST["mdp"]);
        $user = new LoginDatabase();
        $check = $user->checkMdp($nomUser, $mdpUser);
        if($check == 0)
        {
            include("Views/error.php");
        }
        else
        {
            $isParticipe = $user->checkIfActiviteIsAlreadySet($_SESSION["id"]);
            include("Views/accueil.php");
        }

    }
?>