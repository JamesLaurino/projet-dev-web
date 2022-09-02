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
        $nomUser = $_POST["nom"];
        $mdpUser = $_POST["mdp"];
        $user = new LoginDatabase();
        $check = $user->checkMdp($nomUser, $mdpUser);
        if($check == 0)
        {
            include("Views/error.php");
        }
        else
        {
            include("Views/accueil.php");
        }

    }
?>