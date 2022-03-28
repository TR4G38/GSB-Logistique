<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="myCss.css" rel="stylesheet">
</head>
<body>
    <div class="grid">

        <div class="colNav">
            <?php 
                require('layout.php');
            ?>
        </div>


        <div class="colContent">



            <form name="loginUser" method="post" action="inscription.php">

                <fieldset>
                    <legend> Formulaire d'inscription : </legend>
                    <p>
                        <label>Pseudo : </label><input type="text" placeholder="Nom d'utilisateur" name="username" />
                    </p>
                    <p>
                        <label>Mot de passe : </label><input type="password" placeholder="Mot de passe" name="password" />
                    </p>
                    <p>
                        <label>Confirmation mdp : </label><input type="password" placeholder="Confirmez mdp" name="confirmPassword" />
                    </p>
                    <p>
                        <label>Assigner un rôle : </label><input type="number" placeholder="Insérez rôle" name="role" />
                    </p>
                    <p>
                        <input style="margin-left:25%;" type="submit" name="StartRegister" value="S'enregister" />
                    </p>
                </fieldset>

            </form>
                <a href="loginPage.php" style>Retour à la page de connexion</a>
                <?php
    
                    if(isset($_POST['StartRegister'])){
                        
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $confirmPass= $_POST['confirmPassword'];
                        $role= $_POST['role'];


                        if (!empty($username) && !empty($password) && !empty($role)){

                            if($password == $confirmPass){
                                //On sélectionne les données de la bdd pour vérifier que le username n'existe pas
                                
                                $sql = "SELECT * FROM users where username=:username";

                                $reponse = $connexion->prepare($sql);
                                $reponse->bindParam(':username', $username);

                                $reponse->execute();

                                $rows = $reponse->fetchAll();
                                if(!empty($rows)){
                                    //Si row n'est pas vide, on vérifie quel champ est utilisé
                                    foreach($rows as $row){
                                        if($row['username'] == $username){
                                            echo "Nom d'utilisateur déjà utilisé</br>";
                                        }
                                    }
                                }else{
                                    //Si rows est vide, cela indique que le username n'existe pas dans la bdd, l'utilisateur s'inscrit donc
                                    $password=password_hash($password, PASSWORD_DEFAULT);
                                    $sql = "INSERT INTO users (password, username, id_role) VALUES( :p, :us, :r)";
                                    $reponse = $connexion->prepare($sql);
                           
                                    $reponse->execute(array('p'=>$password, 'us'=>$username, 'r'=>$role));

                                    echo "Enregistrement effectué !";
                                
                                }
                                        
                            }else{
                                echo "<div style='margin-left: 35%;'>Mot de passes différents !</div>";
                            }
                        }else{
                            echo "<div style='margin-left: 35%;'>Veuillez renseigner tous les champs !</div>";
                        }
                    }


                ?>
        </div>
        
    </div>
    
</body>
</html>
