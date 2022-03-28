<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/planning.css" />
    <title>Planning</title>
    
</head>
<body>
<?php
    if(!isset($_SESSION['jour'])):
        $_SESSION['jour']=date('w');
    endif;

    if(!isset($_SESSION['etat'])):
        $_SESSION['etat']=0;
    endif;

    if($_SESSION['etat']==1):
        $_SESSION['jour']=$_SESSION['jour']+7;
    elseif($_SESSION['etat']==2):
        $_SESSION['jour']=$_SESSION['jour']-7;
    elseif($_SESSION['etat']==0):
        $_SESSION['jour']=date('w');
    endif;




    if(isset($_SESSION['etat'])):?>
        <table style="width: 100%;" border="1">
        <tbody>
        <tr>
        <th><?php          
            $sub = '';
            for($i=1;$i<=7;$i++){
                $temp = date('d-m-Y', strtotime('+'.($i-$_SESSION['jour']).' days'));
            $sub .= $temp."</th><th>"; 
            }
            echo (substr($sub,0,-4));
        ?>
        </th>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

        </tr>
        </tbody>
        </table>
    <?php   
    endif
    ?>   
    <br>
    <a href="datemoins.php">Semaine précédente</a>
    <a href="date.php">Semaine présente</a>
    <a href="dateplus.php">Semaine suivante</a>
    <br>




</body>
</html>