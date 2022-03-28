<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/modal.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>

    <!-- Trigger / Ouvrir la modale -->
<button id="myBtn">Ajouter un client</button>

<!-- la modale -->
<div id="myModal" class="modal">

  <!-- contenu modale -->
  <div class="modal-content">
    <span onclick="close_modal()" class="close">&times;</span>
    <form name='Fajoutnews' method="post" action="ajoutemploye.php">


    <!-- formulaire ajout client -->
      <fieldset>
          <label>Ajout clients :</label>
          <p>
              <label>id : </label><input type="text" placeholder="Tapez l'id' du client" name="id" />
          </p>
          <p>
              <label>nom : </label><input type="text" placeholder="Tapez le nom du client'" name="nom" />
          </p>
          <p>
            <label>prénom : </label><input type="text" placeholder="Tapez le prénom du client'" name="prenom" />
        </p>
        <p>
            <label>ville : </label><input type="text" placeholder="Tapez la ville'" name="ville" />
        </p>
        <p>
            <label>cp : </label><input type="text" placeholder="Tapez le cp'" name="cp" />
        </p>
        <p>
            <label>tel : </label><input type="text" placeholder="Tapez le tel'" name="tel" />
        </p>
          <p>
              <input type="submit" name="ajouter" value="Ajouter le client" />
          </p>
      </fieldset>

  </form> 
  </div>

</div>


<script type="text/javascript">
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function close_modal() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>