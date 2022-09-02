
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
                            <div class="mr-3"> <img class="rounded-circle border mb-2 mt-2 mr-2"  width="150px" height="150px" src="../Views/assets/<?php print($detail["image"]); ?>" alt=""> </div>
                            <div class="ml-2 mt-2"> 
                                <p>Description: </p>
                                <p><?php print($detail["description"]); ?></p> 
                            </div>
                        </div>
                        <div class="d-flex ml-5 mt-3">
                            <input type="hidden" name="idActivite" value=<?php print($detail["id"]); ?>>
                            <div> <button type="submit" class="btn btn-success mr-5" >Submit</button> </div>
                            <a class="btn btn-danger" href=<?php print(ROOT_PATH . "activite"); ?>>Retour</a>
                        </div>

               </div>
            <?php endforeach; ?>
        </div>

    <form>
    

    <script type="text/javascript">
            // $(document).ready(function() 
            // {


            //     $("#btnPannier").click(function() 
            //     {
            //         let quantite = $("#selectItem").val();

            //         swal({
            //             title: "Product add to basket!",
            //             text: "Thank you",
            //             icon: "success",
            //             button: "Ok",
            //         }).then( (value) => 
            //         {
            //             window.location.href = "pannier.php?id=" . $_GET["id"] + "&quantite=" + quantite;
            //         })
            //     })

            // });
    </script>

<?php include('Views/template/footer.php'); ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>
</html>