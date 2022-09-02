<?php include('Models/activiteDatabase.php'); ?>
<?php 

    $activite = new ActivtiteDatabase();
    $listActivite = $activite->getAllActivite();
    include("Views/activite.php");

?>