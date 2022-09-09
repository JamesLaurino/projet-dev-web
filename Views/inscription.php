<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <title>Document</title>
</head>
<body>

<?php include("Views/template/navbar.php") ?>



<?php if(isset($_SESSION["inscription"])): ?> 
    <div class="container d-flex justify-content-center mt-5">
        <div class="d-flex flex-column">
            <div>
                <h1 class="h1 text-primary">User add with success</h1>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href=<?php print(ROOT_PATH . "login"); ?> class="btn btn-info">Retour</a>
            </div>
        </div>
        
    </div>

    <script type="text/javascript">
        $(document).ready(function() 
        {
            swal({
                title: "Your are add",
                text: "Nice your are add to the system now you can choice eyour activity !",
                icon: "success",
                button: "Ok",
            })

        });
    </script>
<?php endif; ?>



<?php if(!isset($_SESSION["inscription"])): ?>

    <div class="container mt-3 d-flex justify-content-center">
        <h1 class="h2 text-info">Inscription</h1>
    </div>


    <div class="container mt-5 d-flex justify-content-center">

        <form action=<?php print(ROOT_PATH . "inscription"); ?> method="post" name="formulaire">

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required class="form-control" id="email" placeholder="Email">
                </div>

                <div class="form-group col-md-6">
                    <label for="password">Password (min 3) </label>
                    <input name="mdp" minlength="3" type="password" require class="form-control" id="passwordp" placeholder="password">
                </div>

            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="nom" type="text" minlength="3" pattern="[a-zA-Z0-9]+"  required class="form-control" id="nom" placeholder="Aude">
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input name="prenom" type="text" pattern="[a-zA-Z0-9]+" minlength="3" required class="form-control" id="prenom" placeholder="Javel">
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="codePostal">Code postal</label>
                    <input name="codePostal" required type="number" class="form-control" id="codePostal">
                </div>

                <div class="form-group col-md-5">
                    <label for="locomotion">Locomotion</label>
                    <select required name="locomotion" id="locomotion" class="form-control">
                        <?php foreach ($locomotions as $locomotion): ?>
                            <option value=<?php print($locomotion["id"]) ?>><?php print($locomotion["nom"]) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="departement">Département</label>
                    <select required name="departement" id="departement" class="form-control">
                        <?php foreach ($departements as $departement): ?>
                            <option value=<?php print($departement["id"]) ?>><?php print($departement["nom"]) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

<?php endif; ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    
</body>
</html>