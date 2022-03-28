<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="grid">

        <div class="colNav">
            <?php 
                require_once('layout.php');
            ?>
        </div>
    
        
        <div class="colContent">
            <?php
            echo "<h3>Bienvenue ".$_SESSION["login"]."</h3>";
            ?>
        </div>
        
    </div>

</body>
</html>