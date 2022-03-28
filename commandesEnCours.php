<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes en cours</title>
</head>
<body>
    <div class="grid">

        <div class="colNav">
            <?php 
                require('layout.php');
            ?>
        </div>


        <div class="colContent">
            <?php
                include('modal.php'); //bouton modal
                require('comEnCoursTab.php'); //Pour l'instant le tableau de la liste des commandes est sur une autre page
            ?>
        </div>

    </div>
</body>
</html>