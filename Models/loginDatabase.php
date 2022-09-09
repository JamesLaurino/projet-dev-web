<?php

class LoginDatabase
{
    private $database;
    private $dbb;

    function __construct()
    {
        $this->database = new Database();
        $this->dbb = new PDO($this->database::$databaseLaptop, '', '');
    }

    
    public function checkIfActiviteIsAlreadySet($idUser)
    {
        $reponse = $this->dbb->prepare("SELECT activiteId FROM employe WHERE id = :idUser");
        $reponse->execute(array(
            "idUser" => $idUser
        ));

        $checkIfSet = $reponse->fetch();

        if($checkIfSet["activiteId"] > 0)
        {
            $_SESSION["validationActivite"] = true;
        }
        else  
        {
            unset($_SESSION["validationActivite"]);
        }
    }



    public function checkMdp($nom, $mdpUser)
    {

        $req = $this->dbb->prepare("EXECUTE checkPawword :nom, :mdp");
        $req->execute(array(
            "nom" => $nom,
            "mdp" => $mdpUser
        ));

        $check = $req->fetch();

        if(!isset($check["id"]))
        {
            $req2 = $this->dbb->prepare("EXECUTE checkPasswordAdmin  :nom, :mdp");
            $req2->execute(array(
                "nom" => $nom,
                "mdp" => $mdpUser
            ));

            $checkAdmin = $req2->fetch();

            if(isset($checkAdmin["id"]))
            {
                $_SESSION["id"] = $checkAdmin["id"];
                $_SESSION["nom"] = $checkAdmin["nom"];
                $_SESSION["admin"] = true;
                return $checkAdmin["id"];
            }
            else 
            {
                return 0;
            }

            
        }
        else 
        {
            $_SESSION["id"] = $check["id"];
            $_SESSION["nom"] = $check["nom"];
            unset($_SESSION["admin"]);
            return $check["id"];
            
        }

    }

}