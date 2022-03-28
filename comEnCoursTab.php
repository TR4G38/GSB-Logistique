<?php 
// requête sql pour récupérer les données
  $sthandler = $connexion->prepare("SELECT id_commande, etat_commande, num_rue,nom_rue,ville_commande,cp_commande,date_livrVoulu,date_livr 
                                    FROM `commandes` 
                                    WHERE 'etat_commande' != 2");
  // définir affichage tableau
  $sthandler->execute();
  $rows = $sthandler->fetchAll();

  // définir catégorie données affichés 
  $fields=array("Commande n°", "Etat commande", "Rue n°","Nom rue","Ville de livraison","Code Postal","Date livraison souhaitée","Date livraison définie","details");
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
  $fields=array("id_commande", "etat_commande", "num_rue","nom_rue","ville_commande","cp_commande","date_livrVoulu","date_livr");
            foreach($rows as $row) {
            foreach($fields as $fieldName){
              echo '<td>'.$row[$fieldName].'</td>'; //On cible le nom du champ en excluant l'index
            }
            echo'<td><a href="contenu2.php?id_commande='. $row["id_commande"] . '">details</a></td>';
            echo '</tr><tr>';
          }    
        ?> 
    </tr>
  </tbody>
</table>
