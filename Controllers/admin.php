<?php 

if(isset($_SESSION["admin"]))
{
    include("Models/adminDatabase.php");
    $admin = new AdminDatabase();
    $donnees = $admin->getInfoUser();

    include("Views/admin.php");
}