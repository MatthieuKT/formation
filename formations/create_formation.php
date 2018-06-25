<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/formation.php';
include_once '../objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnexion();

// pass connection to objects
$formation = new Formation($db);
$category = new Category($db);

// set page headers
$page_title = "Nouvelle formation";
include_once "layout_header.php";

// contents
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-outline-secondary'>liste formations</a>";
echo "</div>";


// Post code
// if the form was submitted
if($_POST) {

  // set product property values
  $formation->nom = $_POST['nom'];
  $formation->description = $_POST['description'];
  $formation->prix = $_POST['prix'];
  $formation->lieu = $_POST['lieu'];
  $formation->mois = $_POST['mois'];
  $formation->categorie = $_POST['categorie'];

  // create the product
  if($formation->create()){
      echo "<div class='alert alert-success'>Product was created.</div>";
  }
  // if unable to create the product, tell the user
  else{
      echo "<div class='alert alert-danger'>Unable to create product.</div>";
  }
}

?>

<!-- HTML form for creating a product  -->
<form action="" method="post">

  <div class="form-group">
    <label for="nom">Nom: </label>
    <input type="text" id="nom" name="nom" class="form-control" placeholder="nom" />
  </div>

  <div class="form-group">
    <label for="description">Description:</label>
    <textarea id="description" name="description" class="form-control" rows="7"></textarea>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="prix">Prix: </label>
      <input type="number" id="prix" name="prix" class="form-control"/>
    </div>

    <div class="form-group col-md-2">
      <label for="mois">Mois: </label>
      <input type="text" id="mois" name="mois" class="form-control"/>
    </div>

    <div class="form-group col-md-8">
      <label for="categorie">categorie: </label>
      <!-- Categories drop-down  -->
      <?php
      // read the product categories from the database
      $stmt = $category->read();

      // put them in a select drop-down
      echo "<select class='form-control' id='categorie' name='categorie'>";
          echo "<option>Select category...</option>";

          while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row_category);
              echo "<option value='{$id}'>{$name}</option>";
          }

      echo "</select>";
      ?>
    </div>
  </div>

  <div class="form-group">
    <label for="lieu">Adresse: </label>
    <textarea id="lieu" name="lieu" class="form-control" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Envoyer</button>

</form>

<?php

// footer
include_once "layout_footer.php";
?>
