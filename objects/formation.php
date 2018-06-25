<?php
class Formation{

  // Database connection and table name
  private $conn;
  private $table_name = 'formations';

  // object properties
  public $id;
  public $nom;
  public $description;
  public $prix;
  public $lieu;
  public $mois;
  public $categorie;

  public function __construct($db) {
    $this->conn = $db;
  }

  // Create formation
  function create() {

    // write query
    $query = "INSERT INTO
                " . $this->table_name. "
              SET
                nom=:nom, description=:description, prix=:prix, categorie=:categorie, lieu=:lieu, mois=:mois";

    $stmt = $this->conn->prepare($query);

    // posted values
    $this->nom=htmlspecialchars(strip_tags($this->nom));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->categorie=htmlspecialchars(strip_tags($this->categorie));
    $this->prix=htmlspecialchars(strip_tags($this->prix));
    $this->lieu=htmlspecialchars(strip_tags($this->lieu));
    $this->mois=htmlspecialchars(strip_tags($this->mois));

    // Bind values
    $stmt->bindParam(":nom", $this->nom);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":prix", $this->prix);
    $stmt->bindParam(":categorie", $this->categorie);
    $stmt->bindParam(":lieu", $this->lieu);
    $stmt->bindParam(":mois", $this->mois);

    if($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
?>
