
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
    <title>Details Activite</title>
</head>
<body>

    <?php include('Views/template/navbar.php'); ?>
    
    <form action=<?php print(ROOT_PATH . "validationActivite"); ?> method="post">
        <div class="container-fluid bg-light d-flex justify-content-center pb-5 pt-5" style="height: 100vh;">
            <?php foreach($activiteDetail as $detail): ?>
               <div class="d-flex flex-column">
                    
               <div class="text-center text-info h3"> <?php print($detail["nom"]); ?> </div>
                        <div class="d-flex"> 
                            <div class="mr-3"> <img class="rounded shadow border mb-2 mt-2 mr-2"  width="200px" height="200px" src="../Views/assets/<?php print($detail["image"]); ?>" alt=""> </div>
                            <div class="ml-2 mt-2"> 
                                <p class="text-center" style="text-decoration: underline;" >Description: </p>
                                <p><?php print($detail["description"]); ?></p> 
                                <p class="text-center" style="text-decoration: underline;">Nombre de place : </p> 
                                <p style="font-weight: bolder;" ><?php print($detail["quantite"]); ?></p> 
                            </div>
                        </div>
                        <div class="d-flex ml-5 mt-3">
                            <input type="hidden" name="idActivite" value=<?php print($detail["id"]); ?>>
                            <?php if(isset($_SESSION["id"]) && !isset($_SESSION["validationActivite"]) && $detail["quantite"] >0): ?>
                                <div>
                                    <button  type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#exampleModalCenter">
                                        Submit
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if(!isset($_SESSION["id"]) || isset($_SESSION["validationActivite"])): ?>
                                <div>
                                    <button disabled type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#exampleModalCenter">
                                        Submit
                                    </button>
                                </div>
                            <?php endif; ?>
                            
                            <a class="btn btn-danger" href=<?php print(ROOT_PATH . "activite"); ?>>Retour</a>
                        </div>

               </div>
            <?php endforeach; ?>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Plus qu'une étape avant de finaliser votre inscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <p>Je participe au souper : </p>
                    <div class="d-flex">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioCheck" id="oui" value="oui">
                        <label class="form-check-label" for="oui">Oui</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioCheck" id="non" value="non">
                        <label class="form-check-label" for="non">Non</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="nomActivite" value=<?php print($detail["nom"]); ?>>
                    <button type="submit" class="btn btn-success mr-5">Submit</button>
                </div>
                </div>
            </div>
        </div>
    <form>



<?php include('Views/template/footer.php'); ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>
</html>