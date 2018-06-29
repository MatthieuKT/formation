<?php
// Check if value is posted
if ($_POST['id-delete']) {

  // Include database and object file
  include_once "../config/database.php";
  include_once '../objects/formation.php';

  // Get database connexion
  $database = new Database();
  $db = $database->getConnexion();

  // Prepare formation object
  $formation = new Formation($db);

  // Set formation id to be deleted
  $formation->id = $_POST['id-delete'];

  // Delete formation
  if($formation->delete()) {
    echo "Formation supprimée";
  } else { // if unable to delete the formation
    echo "Impossible de supprimer la formation";
  }
}
 ?>
