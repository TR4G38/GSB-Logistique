<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Modifier contenu</title>
</head>
<body>

<?php

if (isset($_POST['modifier'])) {

    echo "Bien ajouté";

    // etape 1 connexion a la bdd

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=gsb_prod;charset=utf8', 'root');
        }
        catch(Exception $e){
            die('Erreur:'.$e->getMessage());
        }

        // etape 2 recuperation des donnees du formulaire

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $quantite = $_POST['quantite'];


   // etape 3 modfier les donnees dans la table contenu



   $sql = "UPDATE contenu SET nom_contenu='?', quantite_contenu='?' WHERE id_contenu='?'";

        $reponse = $pdo->prepare($sql);

        $reponse->execute(array('id' => $id,'nom' => $nom,'quantite' => $quantite));

        echo "Bien modifié";

        header('Location: contenu.php');
}

?>