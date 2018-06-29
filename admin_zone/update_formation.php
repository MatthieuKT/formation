<?php
// Get ID of the product to be edited
$id;

if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  die('Erreur, ID manquant.');
}

// Include database and object files
include_once '../config/database.php';
include_once '../objects/formation.php';
include_once '../objects/category.php';

// Get database connexion
$database = new Database();
$db = $database->getConnexion();

// Prepare objects
$formation = new Formation($db);
$category = new Category($db);

// set ID property of formation to be edited
$formation->id=$id;

// Read the detail of formation to be edited
$formation->readOne();

// set page headers
$page_title = "modifier une formation";
include_once "layout_header.php";

?>

<!-- Lien "retou à la liste" -->
<a href="read_formations.php"><i class="fas fa-long-arrow-alt-left"></i> Retour à la liste</a>

<!-- Formulaire d'affichage -->
<form class="form" action="?id=<?php echo $id;?>" method="post">
  <div class="form-group">
    <label for="nom">Titre: </label>
    <input type="text" id="nom" class="form-control" name="nom" value="<?php echo "$formation->nom";?>"/>
  </div>

  <div class="form-group">
    <label for="description">description: </label>
    <textarea id="description" class="form-control" name="description"><?php echo "$formation->description";?></textarea>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="mois">mois: </label>
      <input type="text" id="mois" class="form-control" name="mois" value="<?php echo "$formation->mois";?>"/>
    </div>

    <div class="form-group col-md-2">
      <label for="prix">prix: </label>
      <input type="text" id="prix" class="form-control" name="prix" value="<?php echo "$formation->prix";?>"/>
    </div>

    <div class="form-group col-md-8">
    <label for="categorie">Catégorie: </label>
    <?php
     $stmt = $category->read();

     // Put them into a select drop down
     echo '<select class="form-control" name="categorie">';
      echo '<option>choisissez</option>';
      while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categorie = $row_category['name'];

        // current category of the formation must be selected
        if ($formation->categorie == $categorie) {
          echo '<option value="$name" selected>';
        } else {
          echo '<option value="$categorie">';
        }

        echo "$categorie</option>";
        }
      echo "</select>";

     ?>
     </div>
  </div> <!-- /form-row -->
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php

// Post code
if ($_POST) {
  //set formation property values
  $formation->nom = $_POST['nom'];
  $formation->description = $_POST['description'];
  $formation->mois = $_POST['mois'];
  $formation->prix = $_POST['prix'];
  $formation->categorie = $_POST['categorie'];

  // update the product
  if ($formation->update()) {
    echo "<div class='alert alert-success alert-dismissable'>";
        echo "Product was updated.";
        echo $formation->id;
    echo "</div>";
  }

  // if unable to update the formation, tell the user
  else{
      echo "<div class='alert alert-danger alert-dismissable'>";
          echo "Unable to update product.";
      echo "</div>";
  }
}

// set page footers
include_once "layout_footer.php";

?>
