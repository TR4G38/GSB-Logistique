<?php
    session_start();
    if( isset($_POST['EndLogin']) || empty($_SESSION["login"]) || $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //La session a-t-elle expirée?
        //redirection
        session_destroy();
        header('Location: loginPage.php');
    } else { //Si la session n'a pas expiré:
        $_SESSION['last_activity'] = time(); //Le moment de la dernière activitée
    }

?>


<script>
let sessionTimout = <?php echo (int)$_SESSION['last_activity'] - (int)(time()-$_SESSION['expire_time']); ?>;
var cooldown = 60;


setTimeout(coolDownFunction, (sessionTimout - cooldown) * 1000);

function coolDownFunction()
{
    let retVal = confirm("Votre session expire dans " + cooldown + " secondes Cliquez sur Ok pour prolonger votre session");
    if (retVal) { // a clické sur "okay"
        fetch('dashboard.php')
        .then(function(response) {
            if (response.redirected) {
                alert("Votre session a expirée");
                window.location.replace('loginPage.php');
            } else {
                alert("Votre session a été renouvelée");
            }
            return response.text();
        })
        .then(function(text) {
            // console.log(text);
        });
    } else { // a clické sur annuler redirect to post et déconnecte
        window.location.reload();
    }
    setTimeout(coolDownFunction, (sessionTimout - cooldown) * 1000);
}

</script>

