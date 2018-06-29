<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/formation.php';
include_once '../objects/category.php';

// instanciate database and objects
$database = new Database();
$db = $database->getConnexion();

$formation = new Formation($db);
$category = new Category($db);

// query formations
$stmt = $formation->readAll();
$num = $stmt->rowCount();

// Set page headers
$page_title = "Liste des formations";
include_once "layout_header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='create_formation.php' class='btn btn-default'>Nouvelle formation</a>";
echo "</div>";

// Display the formations if there are any
if($num > 0) {
?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>titre</th>
        <th>mois</th>
        <th>categorie</th>
        <th>actions</th>
      </tr>
    <thead>

    <tbody>
        <?php
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<tr>";
                echo "<td>{$nom}</td>";
                echo "<td>{$mois}</td>";
                echo "<td>{$categorie}</td>";

                echo "<td>";
                // read product button
                echo "<a href='read_one.php?id={$id}' role='button' class='btn btn-outline-primary'>Read</a> ";

                // edit product button
                echo "<a href='update_formation.php?id={$id}' class='btn btn-outline-info'>Edit</a> ";

                // delete product button
                echo "<button type='button' delete-id='{$id}' class='btn btn-danger delete-object' data-toggle='modal' data-target='#exampleModal'>supprimer</button>";
                echo "</td>";

            echo "</tr>";
          }
        ?>
    </tbody>

  </table>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          Voulez-vous vraiment supprimer cette formation?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <form id="delete-validation" method="post" action="delete_formation.php">
            <input type="hidden" id="id-delete" name="id-delete" value="">
            <input class="btn btn-danger" type="submit" value="Supprimer">
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}

// Set page footer
include_once "layout_footer.php";
 ?>
