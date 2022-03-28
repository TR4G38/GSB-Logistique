<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Ajout Employe</title>
</head>
<body>

<?php

if (isset($_POST['ajouter'])) {

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
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $tel = $_POST['tel'];


   // etape 3 ajouter les donnees du formulaire dans la table client

    if (!empty($id) && !empty($nom) && !empty($prenom) && !empty($ville) && !empty($cp) && !empty($tel)) {

        $reponse = $pdo->prepare("INSERT INTO clients(id_client,nom_client,prenom_client,ville_client,cp_client,telephone) VALUES (?,?,?,?,?,?)");

        $reponse->execute(array($id,$nom,$prenom,$ville,$cp,$tel));

        echo "Bien ajouté";
        
        header('Location: commandesEnCours.php');
    }
        header('Location: commandesEnCours.php');
}

?>