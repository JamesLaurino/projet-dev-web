
<?php 

    include("Models/adminDatabase.php");
    include("Models/inscriptionDatabase.php");

?>

<?php 

    if(isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["locomotion"]) 
    && isset($_POST["departement"]) && isset($_POST["nom"]) && isset($_POST["prenom"])
    && isset($_POST["codePostal"]))
    {
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $email = htmlspecialchars($_POST["email"]);
        $locomotionId = htmlspecialchars($_POST["locomotion"]);
        $departementId = htmlspecialchars($_POST["departement"]);
        $codePostal = htmlspecialchars($_POST["codePostal"]);
        $mdp = htmlspecialchars($_POST["mdp"]);

        $user = new InscriptionDatabase();
        $user->insertNewEmployee($nom, $prenom, $email, $codePostal, $departementId,$locomotionId,$mdp);
        $_SESSION["inscription"] = true;
        include("Views/inscription.php");
    }
    else 
    {
        $insertData = new AdminDatabase();
        $departements = $insertData->getAllDepartement();
        $locomotions = $insertData->getAllLocomotion();

        include("Views/inscription.php");
    }


?>