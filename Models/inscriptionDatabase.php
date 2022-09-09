<?php

class InscriptionDatabase
{
    private $database;
    private $dbb;

    function __construct()
    {
        $this->database = new Database();
        $this->dbb = new PDO($this->database::$databaseLaptop, '', '');
    }

    public function insertNewEmployee($nom, $prenom, $mail, $codePostal, $departementId,$locomotionId,$mdp)
    {
        $reponse = $this->dbb->prepare("INSERT INTO employe 
        (nom,prenom,mail,codePostal,departementId,locomotionId, mdp) 
            VALUES 
        (:nom,:prenom,:mail,:codePostal,:departementId,:locomotionId,:mdp)");

        $reponse->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "mail" => $mail,
            "codePostal" => $codePostal,
            "departementId" => $departementId,
            "locomotionId" => $locomotionId,
            "mdp" => $mdp,
        ));

        //$checkIfSet = $reponse->fetch();

    }
}