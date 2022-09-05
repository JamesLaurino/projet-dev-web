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
<body class="bg-light">


    <?php include("Views/template/bannerAdmin.php"); ?>
    <?php include("Views/template/navAdmin.php"); ?>


    <div class="container mt-3 d-flex justify-content-center">
        <div>
            <h3 class="h3 text-center text-info" >Ajouter un administrateur</h3>
        </div>
    </div>

    <form action="addAdmin" method="post">
        <div class="container mt-2 d-flex justify-content-center">
            <div class="d-flex flex-column">
                <p>Nom </p>
                <input name="nom" type="text" class="form-control mb-3">
                
                <p>Prenom </p>
                <input name="prenom" type="text" class="form-control mb-3">

                <p>Mot de passe </p>
                <input name="mdp" type="password" class="form-control mb-3">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>
</html>