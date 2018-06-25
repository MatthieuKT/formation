<?php
// Set page headers
$page_title = "Nos formations";
include_once "layout_header.php";

// include database and object files
include_once 'config/database.php';
include_once 'objects/formation.php';
include_once 'objects/category.php';

// instanciate database and objects
$database = new Database();
$db = $database->getConnexion();

$formation = new Formation($db);
$category = new Category($db);

// query formations
$stmt = $formation->readAll();
$num = $stmt->rowCount();

?>
<div class="card-columns">

<?php

if($num > 0) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo'<div class="card">';
      echo'<img class="card-img-top" src="images/1.jpeg" alt="Card image cap">';
      echo'<div class="card-body">';
        echo'<h5 class="card-title">'. $nom . '</h5>';
        echo'<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>';
        echo '<a href="#" class="btn btn-primary">plus d\'infos</a>';
      echo'</div>';
      echo'<div class="card-footer">';
        echo'<small class="text-muted">' . $mois . '</small>';
      echo'</div>';
    echo'</div>';
  }
}
?>
</div>
