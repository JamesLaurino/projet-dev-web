<?php include('Models/adminDatabase.php'); ?>



<?php 
    $admin = new UserDatabase();
    $update = $admin->editUser();
    include("Views/admin.php");