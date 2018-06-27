<?php

// Get id of the formation to be read
$id;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  die('Erreur: id manquant.');
}

// include database and objects files
include_once "../config/database.php";
include_once "../objects/formation.php";

// Database connexion
$database = new Database();
$db = $database->getConnexion();

// Prepare object
$formation = new Formation($db);

// Set id property of the formation to be read
$formation->id = $id;

// Read the details of formation to be read
$formation->readOne();


// Set page header
$page_title = $formation->nom;
include_once 'layout_header.php';
?>

<a class="btn" href="read_formations.php" role="button">Retour à la liste</a>
<br> <br>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Date</th>
      <th>Catégorie</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td><?php echo $formation->mois; ?></td>
      <td><?php echo $formation->categorie; ?></td>
    </tr>
  </tbody>
</table>

<?php echo $formation->description ?> <br><br>


    <h2>Tarif</h2>
    <b>prix:</b> <?php echo $formation->prix; ?> &euro; <br><br>
    un accompte de 40 EUR est nécessaire pour s'inscrire. Le reste
    du montant sera versé le premier jour de formation. <br><br>

<div class="row">
  <div class="col-md-4">
    <address>
      adresse: 1 rue Francois mansart <br> 94000 créteil <br>
      (3eme étage à droite) <br>
      tel: 0602024589 <br>
      mail: blabla@gmail.com <br>
      metro: ligne 8 Créteil l'échat <br>
      bus: 172, 181.
    </address>
  </div>
  <div id="map" class="col-md-8"></div>
</div>


<!-- Script initialisant la map -->
<script type="text/javascript" src="libs/js/map.js"></script>
<!-- Connexion à l'api de Google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv2abxJPJlfD1VvFw6sGrxDWPG_GmoP7Y&callback=initMap">
</script>

<?php

// Set page footer
include_once 'layout_footer.php';
 ?>
