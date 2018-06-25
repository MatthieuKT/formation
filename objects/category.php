<?php
class Category{

  // Database connection and table name
  private $conn;
  private $table_name = "category";

  // object properties
  public $id;
  public $name;

  public function __construct($db){
    $this->conn = $db;
  }

  // used by select drp-down list
  function read() {
    // select all data
    $query = "SELECT
                id, name
              FROM
                " . $this->table_name . "
              ORDER BY
                name";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
  }
}
?>
