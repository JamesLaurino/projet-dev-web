<?php

include("database.php");

class UserDatabase
{
    private $database;
    private $dbb;

    function __construct()
    {
        $this->database = new Database();
        $this->dbb = new PDO($this->database::$databaseLaptop, '', '');
    }


    public function editUser($idUser, $locomotion, $departement, $activite, $souper)
    {
        $req = $this->dbb->prepare("EXECUTE updateEmploye :idUser, :locomotion, :departement, :activite, :souper");

        $req->execute(array(
            "idUser" => $idUser,
            "locomotion" => $locomotion,
            "departement" => $departement,
            "activite" => $activite,
            "souper" => $souper
        ));
    }

    public function deleteUser($idUser)
    {
        $req = $this->dbb->prepare("DELETE FROM employe WHERE id = :idUser");

        $req->execute(array(
            "idUser" => $idUser
        ));

    }

}