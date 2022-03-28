<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/myCss.css">
        <link rel="stylesheet" href="fontAwesome/css/all.css">
    </head>
    <body>
        <div class="grille">

            <div class="col1">
            </div>

            <div class="col2">
                <div class="container">
                    <form class="logForm" name="loginUser" method="post" action="loginPage.php">

                        <fieldset>
                            <legend> Formulaire de connexion : </legend>
                            <div class="iconInput">
                                <label>Nom d'utilisateur : </label><input type="text" name="username" /><i class="fas fa-user"></i>
                            </div>
                            <div class="iconInput">
                                <label>Mot de passe : </label><input type="password" name="password" /><i class="fas fa-key"></i>
                            </div>
                        
                            <div>
                                <button type="submit" class="connectButton" name="StartLogin" title="Se connecter">
                                <i class="fas fa-sign-in-alt fa-2x"></i>
                                </button>

                            </div>
                        </fieldset>

                    </form>
                <?php
                    //connexion bdd
                    require('ini.php');
                    
                    if(isset($_SESSION["login"])){  //On redirige si l'utilisateur est déjà connecté
                        header('Location: dashboard.php');
                    }
                    
                    
                    //Récupération des données utilisateur
                    if(isset($_POST['StartLogin'])){
    
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $username = stripslashes($username);
                        $password = stripslashes($password);


                        if (!empty($username) && !empty($password)){

                            $sql = "SELECT * FROM users where username=:username";

                            $reponse = $connexion->prepare($sql);
                            $reponse->bindParam(':username', $username);

                            $reponse->execute();

                            $rows = $reponse->fetchAll();
                
                            // Etape 3 : Vérifier la connexion 

                            $logged=false; //jeton pour valider ou non la session

                            foreach($rows as $row){
                                if(($row['username'] = $username) && (password_verify($password,$row['password']))){
                                    $logged=true;
                                    break;
                                }
                            }

                            if($logged){
                                $_SESSION['logged_in'] = true; //valide le logged
                                $_SESSION['last_activity'] = time(); //last activity est set ici quand logged in est défini.
                                $_SESSION['expire_time'] = 5*60; //5 min // temps d'expirations de session en secondes

                                //On créer le token de la session (ici le username)
                                $_SESSION["login"]=$username;

                                //On redirige sur la page principale de l'utilisateur
                                header('Location: dashboard.php');

                            }else{
                                echo "<div class='alert'>Identifiant(s) incorrect(s)</div>";
                            }
                        }else{
                            echo "<i>Veuillez renseigner tous les champs</i>";
                        }
                    }
                   
                ?>
                </div>
            </div>
        </div>
    </body>
</html>
