<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenu des commandes 2</title>
    <link href="css/myCss.css" rel="stylesheet" />
</head>
<body>

<?php 

include('modal2.php'); //bouton modal

try{
    $pdo = new PDO('mysql:host=localhost;dbname=gsb_prod;charset=utf8', 'root');
    }
    catch(Exception $e){
        die('Erreur:'.$e->getMessage());
    }

$id_commande = $_GET ['id_commande'];
// requête sql pour récupérer les données
  $sthandler = $pdo->prepare("SELECT id_contenu, nom_type, quantite_contenu, id_commande 
                                    FROM `contenu` LEFT JOIN type_medicament ON contenu.id_type=type_medicament.id_type
                                    WHERE id_commande=".$id_commande);
  // définir affichage tableau
  $sthandler->execute();
  $rows = $sthandler->fetchAll();

  // définir catégorie données affichés 
  $fields=array("Commande n°", "Contenu", "Quantite");
?>
<table class="tabComTable">   <!-- css table -->
  <thead>
    <tr>
      <th>
        <?php
          echo implode('</th><th>', $fields); // ajuster taille table
        ?>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
        // afficher le contenu du tableau
  $fields=array("id_commande", "nom_type", "quantite_contenu");
            foreach($rows as $row) {
             
            foreach($fields as $fieldName){
              echo '<td>'.$row[$fieldName].'</td>'; //On cible le nom du champ en excluant l'index
            }
              echo '</tr><tr>';
          }    
        ?> 
    </tr>
  </tbody>
</table>