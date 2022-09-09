<?php 

if(REQ_TYPE_ID)
{
    if(REQ_ACTION == 'edit')
    {
        include("Models/adminDatabase.php");
        $admin = new AdminDatabase();
        $donnees = $admin->infoUserForAdminEdit((int)REQ_TYPE_ID);
        $activites = $admin->getAllActivites();
        $departements = $admin->getAllDepartement();
        $locomotions = $admin->getAllLocomotion();
        

        include("Views/editUser.php");
    }
    else if(REQ_ACTION == 'delete')
    {
        include("Models/userDatabase.php");
        $user = new UserDatabase();
        $user->deleteUser((int)REQ_TYPE_ID);
        include("Views/userDeleted.php");
    }
    
}
else  
{
    include("Views/error");
}