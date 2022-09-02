<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Accueil</title>
</head>
<body class="bg-light">
    
    <?php include("template/navbar.php"); ?>
    <?php include("template/header.php"); ?>

    <div class="container-fluid bg-light d-flex justify-content-center mt-5">
        <h1 class="h1 text-success text-center">Bienvenue au team building annuelle </h1>
    </div>

    <div class="container-fluid bg-light d-flex justify-content-left mt-5">
        <h4 class="h4 text-info text-center ml-5">L'objectif de cette journée : </h4>
    </div>

    <div class="container-fluid bg-light d-flex justify-content-center mt-5">
        <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit enim aspernatur accusantium sint sed. Repudiandae.</p>
        </div>
    </div>

        <div class="container d-flex justify-content-center mt-5">
            <div id="carouselExampleIndicators" class="carousel slide rounded shadow" data-ride="carousel" style="width: 450px; height:450px;">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" width="450px" height="450px" src='Views/assets/<?php print($slider->getImageOne());?>' alt="First slide">

                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" width="450px" height="450px"  src='Views/assets/<?php print($slider->getImageTwo()); ?>' alt="First slide">
                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" width="450px" height="450px"  src='Views/assets/<?php print($slider->getImageThree()); ?>' alt="First slide">
                            </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </div>

    <?php include("template/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>