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
    
    <?php include("Views/template/bannerAdmin.php"); ?>
    <?php include("Views/template/navAdmin.php"); ?>

        <div class="container mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Code Postal</th>
                        <th scope="col">Locomotion</th>
                        <th scope="col">Département</th>
                        <th scope="col">Activite</th>
                        <th scope="col">Souper</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach($donnees as $donnee ): ?>
                        <tr>
                            
                            <td>
                                <?php 
                                    if(!isset($donnee["nom"]))
                                    {
                                        print("NA");
                                    } 
                                    else
                                    {
                                        print($donnee["nom"]); 
                                    }
                                ?>
                            </td>
                            
                            <td>
                                <?php 
                                    if(!isset($donnee["prenom"]))
                                    {
                                        print("NA");
                                    } 
                                    else
                                    {
                                        print($donnee["prenom"]); 
                                    }
                                ?>
                            </td>
                            
                            <td>
                                <?php 
                                    if(!isset($donnee["mail"]))
                                    {
                                        print("NA");
                                    } 
                                    else
                                    {
                                        print($donnee["mail"]); 
                                    }
                                ?>
                            </td>

                            <td>
                                <?php 
                                    if(!isset($donnee["codePostal"]))
                                    {
                                        print("NA");
                                    } 
                                    else
                                    {
                                        print($donnee["codePostal"]); 
                                    }
                                ?>
                            </td>

                            <td>
                                
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

                            </td>

                            <td>
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
                            </td>

                            <td>
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
                            
                            </td>

                            <td>

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

                            </td>

                            <td>
                                <div class="d-flex">
                                    <a href=<?php print(ROOT_PATH . "users/" . $donnee['id'] . "/delete");?> class='btn btn-danger mr-2'>Delete</a>
                                    <a href=<?php print(ROOT_PATH . "users/" . $donnee['id'] . "/edit");?> class='btn btn-info'>Edit</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>
</html>