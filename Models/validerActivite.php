<?php 

include("database.php");

class ValidationDatabase
{

    private $database;
    private $dbb;

    function __construct()
    {
        $this->database = new Database();
        $this->dbb = new PDO($this->database::$databaseLaptop, '', '');
    }

    public function validationActivite($idUser, $nomActivite)
    {
        $reponse = $this->dbb->prepare("EXECUTE validationActivite :idUser, :nomActivite");
        $reponse->execute(array(
            "idUser" => $idUser,
            "nomActivite" => $nomActivite
        ));
    }

    public function validationSouper($idUser, $souper)
    {
        if(strcmp($souper, 'oui') == 0)
        {
            $reponse = $this->dbb->prepare("UPDATE employe SET participeSoupe = :souper WHERE id = :idUser");
            $reponse->execute(array(
                "souper" => 1,
                "idUser" => $idUser
            ));
        }
        else 
        {
            $reponse = $this->dbb->prepare("UPDATE employe SET participeSoupe = :souper WHERE id = :idUser");
            $reponse->execute(array(
                "souper" => 0,
                "idUser" => $idUser
            ));
        }
    }

}

?>