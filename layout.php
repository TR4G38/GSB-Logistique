<?php
    require_once('sessionMan.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="myCss.css" rel="stylesheet">
    <link rel="stylesheet" href="fontAwesome/css/all.css">
    <link rel="stylesheet" href="css/myCss.css">
    
</head>
<body>
    <?php

    // Connexion à la base de données
    require('ini.php');
    ?>
    <div class="navbar">
        <ul>
        <div><a href="dashboard.php"><li><i class="fas fa-tachometer-alt"></i><div class="nav-content">Dashboard</div></li></a></div>
        <div><a href="commandesEnCours.php"><li><i class="fas fa-truck"></i><div class="nav-content">Commandes en cours</div></li></a></div>
        <div><a href=""><li><i class="fas fa-truck-loading"></i><div class="nav-content">Commandes archivées</div></li></a></div>
        <div><a href="planningVisionGlob.php"><li><i class="far fa-calendar-alt"></i><div class="nav-content">Planning vision global</div></li></a></div>
        </ul>
        <form name="delogUser" method="post" action="layout.php">
            <button type="submit" class="disconnectButton" name="EndLogin" title="Se déconnecter">
                <i class="fas fa-sign-out-alt fa-2x"></i>
            </button>
        </form>

    </div>

</body>
</html>