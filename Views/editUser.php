<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <title>Edit</title>
</head>
<body>

    <?php include("Views/template/bannerAdmin.php"); ?>
    <?php include("Views/template/navAdmin.php"); ?>


    <div class="container mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">C.Postal</th>
                        <th scope="col">Locomotion</th>
                        <th scope="col">Département</th>
                        <th scope="col">Activite</th>
                        <th scope="col">Souper</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <form action=<?php print(ROOT_PATH . "updateUser"); ?> method="post">
                        <?php foreach($donnees as $donnee ): ?>
                        <tr>
                            <td> 
                                <p><?php print($donnee["nom"]); ?></p>
                            </td>

                            <td>
                                <p><?php print($donnee["prenom"]); ?></p>
                            </td>

                            <td>
                                 <p><?php print($donnee["mail"]); ?></p>
                            </td>

                            <td>
                                <p> <?php print($donnee["codePostal"]); ?> </p>
                            </td>

                            <td>
                                <p>

                                    <?php 

                                        if(!isset($donnee["locomotion"]))
                                        {
                                            print("NA");
                                        } 
                                        else
                                        {
                                            print($donnee["locomotion"]); 
                                        }

                                    ?>
                                
                                </p>
                                    <select class="form-control" name="locomotion">
                                        <?php foreach($locomotions as $locomotion): ?>
                                            <option value=<?php print($locomotion["nom"]) ?>>
                                                <?php print($locomotion["nom"]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                            </td>

                            <td>
                                <p>
                                    <?php 

                                        if(!isset($donnee["departement"]))
                                        {
                                            print("NA");
                                        } 
                                        else
                                        {
                                            print($donnee["departement"]); 
                                        }

                                    ?>
                                </p>
                                <select class="form-control" name="departement">
                                    <?php foreach($departements as $departement): ?>
                                        <option value=<?php print($departement["nom"]) ?>>
                                            <?php print($departement["nom"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td>

                                <p>
                                    <?php 

                                        if(!isset($donnee["activite"]))
                                        {
                                            print("NA");
                                        } 
                                        else
                                        {
                                            print($donnee["activite"]); 
                                        }

                                    ?>
                                </p>

                                <select class="form-control" name="activite">
                                    <?php foreach($activites as $activite): ?>
                                        <option value=<?php print($activite["nom"]) ?>>
                                            <?php print($activite["nom"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td>
                                <p>
                                    <?php 

                                        if(!isset($donnee["participeSoupe"]))
                                        {
                                            print("NA");
                                        } 
                                        else
                                        {
                                            print($donnee["participeSoupe"]); 
                                        }

                                    ?>
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="souper" id="oui" value="Oui" checked>
                                    <label class="form-check-label" for="oui">
                                        Oui
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="souper" id="non" value="Non">
                                    <label class="form-check-label" for="non">
                                        Non
                                    </label>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex mt-5">
                                    <input type="hidden" name="id" value=<?php print($donnee["id"]); ?>>
                                    <button type="submit" type="submit" class='btn btn-info mr-2'>Update</button>
                                </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </form>
                </tbody>
            </table>
        </div>




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>
</html>
