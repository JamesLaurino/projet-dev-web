<?php

include("database.php");

class AdminDatabase
{
    private $database;
    private $dbb;

    function __construct()
    {
        $this->database = new Database();
        $this->dbb = new PDO($this->database::$databaseLaptop, '', '');
    }

    public function ajouterAdmin($nom, $prenom, $mdp)
    {
        $req = $this->dbb->prepare("INSERT INTO admin (nom, prenom, mdp) VALUES (:nom, :prenom, :mdp)");
        $req->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "mdp" => $mdp
        ));

    }

    public function displayTableauActivite()
    {
        $req = $this->dbb->prepare("EXECUTE tableauActivite");
        $req->execute();
        $activites = $req->fetchAll();
        return $activites;
    }

    public function infoUserForAdminEdit($idUser)
    {
                    
        $req = $this->dbb->prepare("EXECUTE ifoUserForAdminEdit :idUser");
        $req->execute(array(
            "idUser" => $idUser
        ));

        $donnees = $req->fetchAll();
        return $donnees;
    }

    public function getAllActivites()
    {
        $req = $this->dbb->prepare("SELECT * FROM activite");
        $req->execute();
        $activites = $req->fetchAll();
        return $activites;

    }

    public function getAllDepartement()
    {
        $req = $this->dbb->prepare("SELECT * FROM departement");
        $req->execute();
        $departements = $req->fetchAll();
        return $departements;
    }

    public function getAllLocomotion()
    {
        $req = $this->dbb->prepare("SELECT * FROM locomotion");
        $req->execute();
        $locomotions = $req->fetchAll();
        return $locomotions;
    }


    public function getInfoUser()
    {
        $req = $this->dbb->prepare("EXECUTE infoUserForAdmin");
        $req->execute();
        $donnees = $req->fetchAll();
        return $donnees;
    }

}