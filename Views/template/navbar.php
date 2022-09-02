<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-lg-1 d-flex justify-content-center text-white mt-2"> <a href=<?php print(ROOT_PATH . "accueil"); ?> class="pt-3 pb-3 text-white">Logo</a> </div>
        <div class="col-lg-1 d-flex justify-content-center text-white mt-2"> <a  href=<?php print(ROOT_PATH . "activite"); ?> class="pt-3 pb-3 text-white">Activite</a> </div>
        <div class="col-lg-1  d-flex justify-content-center text-white mt-2"> <a  href=<?php print( ROOT_PATH . "contact"); ?>  class="pt-3 pb-3 text-white">Contact</a> </div>
        <div class="col-lg-7 "></div>
        <div class="col-lg-1 d-flex justify-content-center text-white mt-3"> 
            
            <?php if(!isset($_SESSION["nom"])): ?>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Connection
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href=<?php print(ROOT_PATH . "login"); ?>>Login</a>
                        </div>
                    </div>
            <?php endif;  ?>

            <?php if(isset($_SESSION["nom"]) && !isset($_SESSION["admin"])): ?>
            <div class="col-lg-1 d-flex justify-content-center text-white">
                <a href=<?php print(ROOT_PATH . "logout"); ?> class="ml-0 mb-2 text-danger"  style="font-size: larger;"> 
                    <img width="50px" height="50px" class="rounded-circle" src="Views/assets/icons/logOff.jpeg" alt="">
                </a>
            </div>
            <?php endif; ?>

            <?php if(isset($_SESSION["nom"]) && ($_SESSION["admin"]) == true): ?>
                    <div class="col-lg-1 d-flex justify-content-center text-white">
                        <span class="mr-2 mt-2"><?php print($_SESSION['nom']); ?></span>
                        <a href=<?php print(ROOT_PATH . "admin"); ?> class="ml-0 mb-2 text-danger"  style="font-size: larger;"> 
                            <img width="50px" height="50px" class="rounded-circle" src="Views/assets/icons/admin.jpg" alt="">
                        </a>
                    </div>
            <?php endif;  ?>
        
        </div>
    </div>
</div>