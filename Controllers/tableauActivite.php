<?php 

    include("Models/adminDatabase.php");
    $admin = new AdminDatabase();
    $donnees = $admin->displayTableauActivite();

    include("Views/tableauActivite.php");


?>