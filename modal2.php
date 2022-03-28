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
    <button id="myBtn">Modifier le contenu</button>

<!-- la modale -->
<div id="myModal" class="modal">

  <!-- contenu modale -->
  <div class="modal-content">
    <span onclick="close_modal()" class="close">&times;</span>
    <form name='Fajoutnews' method="post" action="modifcontent.php">


    <!-- formulaire ajout client -->
      <fieldset>
          <label>Modifier contenu :</label>
          <p>
              <label>id commande : </label><input type="text" placeholder="Tapez l'id' de la commande" name="id" />
          </p>
          <p>
              <label>contenu : </label><input type="text" placeholder="Tapez le nom du contenu'" name="nom" />
          </p>
          <p>
            <label>quantite : </label><input type="text" placeholder="Tapez la quantite'" name="quantite" />
        </p>
        <p>
              <input type="submit" name="modifier" value="Modifier le contenu" />
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