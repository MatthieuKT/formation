</div>
<!-- /container -->

<script type="text/javascript">
// JavaScript for deleting product

// récupère tous les boutons .delete-id de la page
var deleteElts = document.getElementsByClassName('delete-object');
// récupère le bouton d'envoi de la fenêtre modale de confirmation
var setURLBtn = document.getElementById('deleteOK');
//Pour chaque .delete-id on associe un événement qui récupère l'id généré en php
for (var i = 0, c=deleteElts.length; i<c; i++) {
    deleteElts[i].onclick = function() {
      // récupère l'id généré dynamiquement par PHP
      var id = this.getAttribute("delete-id");
      // ajoute l'id comme attribut URL
      url = "delete_formation.php?id=" + id;
      // applique le nouvel url au bouton de confirmation de la fenêtre modale
      setURLBtn.href = url;
    };
}
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- bootbox library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>


</body>
</html>
