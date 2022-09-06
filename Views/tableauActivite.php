<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

   

    <title>Login</title>
</head>
<body class="bg-light">

    <?php include("Views/template/bannerAdmin.php"); ?>
    <?php include("Views/template/navAdmin.php"); ?>

     <div class="container d-flex justify-content-center mt-3 flex-wrap">
         <div class="mt-3 mr-3">
            <table class="table shadow" style="max-width:400px;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Nombre de participant</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach($donnees as $donnee ): ?>
                            <tr>
                                <td><?php print($donnee["nom"]); ?></td>
                                <td><?php print($donnee["NombreEmployee"]); ?></td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
         </div>


            <div class="mt-3 mb-3">
                <div class="rounded shadow" id="piechart" style="width: 300px; height: 250px;"></div>
            </div>

        </div>



        
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            
            var test = <?php echo json_encode($donnees); ?>;
            var tableauVisualization = [];

            tableauVisualization.push(["Activite", "Nombre participant"]);
            for (let index = 0; index < test.length; index++) 
            {
                tableauVisualization.push([test[index][0], Number(test[index][1])])
                
            }


            var data = google.visualization.arrayToDataTable(tableauVisualization);


            var options = {
                title: 'Visualization of all activities',
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>
</html>

