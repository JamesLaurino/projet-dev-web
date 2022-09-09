
<?php 

    include("Models/adminDatabase.php");
    include("Models/inscriptionDatabase.php");

?>

<?php 

    if(isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["locomotion"]) 
    && isset($_POST["departement"]) && isset($_POST["nom"]) && isset($_POST["prenom"])
    && isset($_POST["codePostal"]))
    {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $locomotionId = $_POST["locomotion"];
        $departementId = $_POST["departement"];
        $codePostal = $_POST["codePostal"];
        $mdp = $_POST["mdp"];

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