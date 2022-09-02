<?php include('Models/activiteDatabase.php'); ?>

<?php 
    $activite = new ActivtiteDatabase();
    $activiteDetail = $activite->getActiviteById(REQ_TYPE_ID);
    include("Views/detailActivite.php");
    
