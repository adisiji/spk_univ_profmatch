<?php
class Data{

 // database connection and table name
 private $conn;
 private $table_namex;

 // object properties
 public $id;
 public $nm;

 public function __construct($db, $table_name){
  $this->conn = $db;
  $this->table_namex = $table_name;
 }

 // create product
 function create(){
  //write query
  $query = "INSERT INTO " .$this->table_namex. " values('',?)";

  $stmt = $this->conn->prepare($query);

  $stmt->bindParam(1, $this->nm);

  if($stmt->execute()){
   return true;
  }else{
   return false;
  }

 }

 // read products
 function readAll( $from_record_num, $records_per_page){

  $query = "SELECT * FROM " . $this->table_namex . " LIMIT
     {$from_record_num}, {$records_per_page}";

  $stmt = $this->conn->prepare( $query );
  $stmt->execute();

  return $stmt;
 }

 // used for paging products
 public function countAll(){

  $query = "SELECT id FROM " . $this->table_namex . "";

  $stmt = $this->conn->prepare( $query );
  $stmt->execute();

  $num = $stmt->rowCount();

  return $num;
 }

 // used when filling up the update product form
 function readOne(){

  $query = "SELECT
     *
    FROM
     " . $this->table_namex . "
    WHERE
     id = ?
    LIMIT
     0,1";

  $stmt = $this->conn->prepare( $query );
  $stmt->bindParam(1, $this->id);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $this->nm = $row['nama'];
 }

 // update the product
 function update(){

  $query = "UPDATE ". $this->table_namex ." SET nama = :nama WHERE id = :id ;";
  $stmt = $this->conn->prepare($query);

  $stmt->bindParam(":nama",$this->nm, PDO::PARAM_STR);
  $stmt->bindParam(":id",$this->id, PDO::PARAM_INT);

  // execute the query
  if($stmt->execute()){
   return true;
  }else{
   return false;
  }
 }

 // delete the product
 function delete(){

  $query = "DELETE FROM " . $this->table_namex . " WHERE id = ?";

  $stmt = $this->conn->prepare($query);
  $stmt->bindParam(1, $this->id);

  if($result = $stmt->execute()){
   return true;
  }else{
   return false;
  }
 }
}
?>
