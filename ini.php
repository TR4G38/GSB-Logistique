<?php
    //Connexion à la bdd
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=gsb_prod;charset=utf8', 'root');
    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }

?>