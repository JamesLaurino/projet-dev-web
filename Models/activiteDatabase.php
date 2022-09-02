<?php 

include("database.php");

class ActivtiteDatabase 
{

    private $database;
    private $dbb;

    function __construct()
    {
        $this->database = new Database();
        $this->dbb = new PDO($this->database::$databaseLaptop, '', '');
    }

    public function getAllActivite()
    {
        $reponse = $this->dbb->prepare("SELECT * FROM activite");
        $reponse->execute();
        $activite = $reponse->fetchAll();
        return $activite;
    }

    public function getActiviteById($id)
    {
        $reponse = $this->dbb->prepare("SELECT * FROM activite WHERE id= :id");
        $reponse->execute(array(
            "id" => $id
        ));

        $activite = $reponse->fetchAll();

        return $activite;
    }

}

?>